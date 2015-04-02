<?php

class Pages extends CI_Controller {

  private $data = array (
    'stylesheet' => 'cover',
    'additional_css_el' => '',
    'additional_js_el' => '',
    'title' => 'Home',
    'description' => 'Welcome to SimpleWorkOrder',
    'author' => 'SimpleWorkOrder'
  );

  public function __construct() {
    parent::__construct();
  }

  public function view($pages = 'home') {
    $this->data['title'] = ucfirst($pages) . ' | SimpleWorkOrder';
    $this->data['slug'] = $pages;

    $this->load->view('templates/header', $this->data);
    $this->load->view('pages/templates/home_header', $this->data);
    if ($pages == 'signup') {
      $this->signup();
    }
    else {
      $this->load->view('pages/' . $pages, $this->data);
    }
    $this->load->view('pages/templates/home_footer');
    $this->load->view('templates/footer', $this->data);
  }

  private function signup() {
    $this->load->model('users_model');
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
    $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean');
    $this->form_validation->set_rules('user_name', 'Username',
      'trim|required|min_length[5]|max_length[20]|is_unique[users.user_name]|xss_clean');
    $this->form_validation->set_rules('email', 'Email',
      'trim|required|xss_clean|is_unique[users.email]|valid_email');
    $this->form_validation->set_rules('primary_phone', 'Primary Phone', 'trim|required|xss_clean');

    $this->form_validation->set_rules('specialty', 'Specialty', 'trim|xss_clean');
    $this->form_validation->set_rules('h-o-ney-pot', 'h-o-ney-pot', 'max_length[0]|xss_clean');

    if ($this->form_validation->run() == FALSE)
    {
      $this->data['success'] = FALSE;
      $this->load->view('pages/signup', $this->data);
    }
    else
    {
      $this->users_model->set_user_signup();
      $this->email_welcome($this->input->post('email'));
      redirect('page/signup/?success=True');
    }
  }

  private function email_welcome($email) {
    $this->config->load('email');
    $this->load->library('email');
    $this->email->from($this->config->item('smtp_email_address'), 'Admin');
    $this->email->to($email);
    $this->email->subject('Thank you for signing up!');

    $message = $this->load->view('email/signup', '',TRUE);

    $this->email->message($message);
    $this->email->send();
  }
}
