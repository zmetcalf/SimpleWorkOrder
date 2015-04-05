<?php

class User extends MY_Controller {

  protected $controller = 'user';

  public function __construct()
  {
    parent::__construct();
    $this->load->model('users_model');
    $this->load->helper('form');
    $this->load->library('form_validation');

    if (!($this->session->userdata('user_type') == 'Administrator')) {
      redirect('/dashboard');
    }
  }

  public function create_user()
  {
    $this->set_rules();
    $this->form_validation->set_rules('user_name', 'Username',
      'trim|required|min_length[5]|max_length[20]|is_unique[users.user_name]|xss_clean');
    $this->form_validation->set_rules('email', 'Email',
      'trim|required|xss_clean|is_unique[users.email]|valid_email');

    if ($this->form_validation->run() == FALSE)
    {
      if ($this->input->post()) {
        $this->data = $this->input->post();
      }
      else {
        $this->generate_clean_data();
      }
      $this->data['page_header'] = 'Create User';
      $this->data['submit_button'] = 'Create User';
      $this->load->view('dashboard/admin/change_user', $this->data);
    }
    else
    {
      $UID = $this->users_model->set_user();
      $password = $this->users_model->reset_password($UID);
      $this->email_password($this->input->post('email'), $password);
      $this->session->set_userdata('password', $password);
      redirect('dashboard/user/view_user/' . $UID);
    }
  }

  public function modify_user($record) {
    $this->set_rules();
    // TODO Create method that checks this for modify user
    $this->form_validation->set_rules('user_name', 'Username',
      'trim|required|min_length[5]|max_length[20]|xss_clean');
    $this->form_validation->set_rules('email', 'Email',
      'trim|required|xss_clean|valid_email');

    $this->data = $this->users_model->get_user($record);
    if ($this->input->post()) {
      $this->data = $this->input->post();
    }
    $this->data['page_header'] = 'Modify User';
    $this->data['submit_button'] = 'Modify User';
    $this->data['record'] = $record;

    if ($this->form_validation->run() == FALSE)
    {
      $this->load->view('dashboard/admin/change_user', $this->data);
    }
    else
    {
      $this->users_model->update_user($record);
      redirect('dashboard/user/view_user/' . $record);
    }
  }

  public function view_user($record) {
    if ($this->session->userdata('user_type') == 'Administrator') {
      $data['admin'] = TRUE;
    }
    else {
      $data['admin'] = FALSE;
    }
    $data['result'] = $this->users_model->get_user($record);
    $data['record'] = $record;
    $data['password'] = $this->session->userdata('password');
    $this->session->unset_userdata('password');
    $this->load->view('dashboard/admin/view_user', $data);

    // TODO Find better way to handle listing work orders
    // $this->load->library('../controllers/admin/list_wo');
    // $this->list_wo->assigned_to_user($record);
  }

  public function view_pending() {
    $data['page_title'] = "Pending Users";
    $data['result'] = $this->users_model->get_pending();
    $this->load->view('dashboard/admin/view_user_list', $data);
  }

  public function reset_password($UID) {
    $password = $this->users_model->reset_password($UID);
    $this->email_password($this->users_model->get_email($UID), $password);
    $this->session->set_userdata('password', $password);
    redirect('dashboard/user/view_user/' . $UID);
  }

  public function activate_user($UID) {
    $this->users_model->activate_user($UID);
    $password = $this->users_model->reset_password($UID);
    $this->email_activate($UID, $password);
    $this->session->set_userdata('password', $password);
    redirect('dashboard/user/view_user/' . $UID);
  }

  public function inactivate_user($UID) {
    $this->users_model->inactivate_user($UID);
    $this->users_model->reset_password($UID);
    redirect('dashboard/user/view_user/' . $UID);
  }

  private function set_rules() {
    $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
    $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean');
    $this->form_validation->set_rules('user_type', 'User Type', 'trim|required|xss_clean');

    $this->form_validation->set_rules('specialty', 'Specialty', 'trim|xss_clean');
    $this->form_validation->set_rules('street_address', 'Street Address', 'trim|xss_clean');
    $this->form_validation->set_rules('city', 'City', 'trim|xss_clean');
    $this->form_validation->set_rules('state', 'State', 'trim|xss_clean');
    $this->form_validation->set_rules('zip_code', 'Zip Code', 'trim|xss_clean');
    $this->form_validation->set_rules('primary_phone', 'Primary Phone', 'trim|xss_clean');
    $this->form_validation->set_rules('secondary_phone', 'Secondary Phone', 'trim|xss_clean');
  }

  private function generate_clean_data() {
    $this->data = array(
      'UID' => '',
      'first_name' => '',
      'last_name' => '',
      'user_name' => '',
      'user_type' => '',
      'password' => '',
      'email' => '',
      'street_address' => '',
      'city' => '',
      'state' => '',
      'zip_code' => '',
      'primary_phone' => '',
      'secondary_phone' => '',
      'specialty' => '',
      'active' => 'Active',
      'opt_in' => 1,
    );
  }

  private function email_password($email, $password) {
    $this->config->load('email');
    $this->load->library('email');
    $this->email->from($this->config->item('smtp_email_address'), 'Admin');
    $this->email->to($email);
    $this->email->subject('SimpleWorkOrder New Password');
    $this->email->message('Your password is: ' . $password);
    $this->email->send();
  }

  private function email_activate($UID, $password) {
    $data = $this->users_model->get_user($UID);
    $data['password'] = $password;

    $this->config->load('email');
    $this->load->library('email');
    $this->email->from($this->config->item('smtp_email_address'), 'Admin');
    $this->email->to($data['email']);
    $this->email->subject('Your volunteer account is active!');

    $message = $this->load->view('email/activate_user',
                                 $data, TRUE);

    $this->email->message($message);
    $this->email->send();
  }
}
