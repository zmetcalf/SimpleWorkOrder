<?php

class Dashboard extends CI_Controller {

  public function __construct()
  {
    parent::__construct();

    $this->data['additional_css_el'] = '';
    $this->data['additional_js_el'] = '';
    $this->data['stylesheet'] = 'dashboard';
    $this->data['description'] = 'Login to SimpleWorkOrder';
    $this->data['author'] = 'SimpleWorkOrder';
    $this->data['title'] = 'Dashboard | SimpleWorkOrder';
    $this->data['menu_title'] = 'SimpleWorkOrder';
    $this->data['slug'] = '';
  }

  public function index($page = 'map', $record = '')
  {
    $this->session->all_userdata(); // Attempt to expire a session before the next line
    if($this->session->userdata('logged_in') == FALSE) {
      $this->load->helper('url');
      redirect('/login');
    }
    $this->generate_data($page);
    $this->load_page($page, $record);
  }

  public function generate_data($page)
  {
    $this->data['slug'] = $page;

    if($page == 'create-user' or $page == 'modify-user') {
      $this->data['additional_css_el'] = array(
        '<link rel="stylesheet" href="' . base_url() . 'static/css/admin/create-user.css">'
      );
      $this->data['additional_js_el'] = array(
        '<script src="' . base_url() . 'static/js/admin/create-user.js"></script>'
      );
    }
    else if($page == 'create-wo') {
      $this->data['additional_css_el'] = array(
        '<link rel="stylesheet" href="' . base_url() . 'static/css/admin/create-wo.css">'
      );
      $this->data['additional_js_el'] = array(
        '<script src="//cdnjs.cloudflare.com/ajax/libs/mustache.js/0.7.2/mustache.min.js"></script>',
        '<script src="' . base_url() . 'static/js/admin/ajax/search.js"></script>',
        '<script src="' . base_url() . 'static/js/admin/create-wo.js"></script>'
      );
    }
    else if($page == 'create-client') {

    }
    else if($page == 'view-wo') {

    }
    else if($page == 'view-user') {

    }
    else if($page == 'view-client') {

    }
    else if($page == 'assigned-wo') {

    }
    else if($page == 'list-unassigned-wo') {

    }
    else if($page == 'list-stale-unassigned-wo') {

    }
    else if($page == 'list-assigned-wo') {

    }
    else if($page == 'list-stale-assigned-wo') {

    }
    else if($page == 'settings') {

    }
    else if($page == 'lookup') {
      $this->data['additional_css_el'] = array(
        '<link rel="stylesheet" href="' . base_url() . 'static/css/admin/lookup.css">'
      );
      $this->data['additional_js_el'] = array(
        '<script src="//cdnjs.cloudflare.com/ajax/libs/mustache.js/0.7.2/mustache.min.js"></script>',
        '<script src="' . base_url() . 'static/js/admin/ajax/search.js"></script>',
        '<script src="' . base_url() . 'static/js/admin/lookup.js"></script>'
      );
    }
    else {
      $this->data['slug'] = 'dashboard';
      $this->data['additional_css_el'] = array(
        '<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.2/leaflet.css">',
        '<link rel="stylesheet" href="' . base_url() . 'static/css/map.css">'
      );
      $this->data['additional_js_el'] = array(
        '<script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>',
        '<script src="//cdnjs.cloudflare.com/ajax/libs/backbone.js/1.1.0/backbone-min.js"></script>',
        '<script src="//cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.2/leaflet.js"></script>',
        '<script src="//cdnjs.cloudflare.com/ajax/libs/mustache.js/0.7.2/mustache.min.js"></script>',
        '<script src="' . base_url() . 'static/js/map.js"></script>'
      );
    }
  }

  public function load_page($page, $record)
  {
    $this->load->view('templates/header', $this->data);
    $this->load->view('dashboard/main-nav', $this->data);

    if($this->session->userdata('user_type') == 'Administrator') {
      $this->load->view('dashboard/sidebar');
    }
    else if($this->session->userdata('user_type') == 'Volunteer') {
      $this->get_volunteer_sidebar();
    }

    if($page =='create-user') {
      $this->load->library('../controllers/admin/create_user');
      $this->create_user->create_user();
    }
    else if($page =='modify-user') {
      $this->load->library('../controllers/admin/create_user');
      $this->create_user->modify_user($record);
    }
    else if($page == 'create-wo') {
      $this->load->library('../controllers/admin/create_wo');
      $this->create_wo->create_wo();
      $this->load->view('dashboard/admin/subforms/find_client');
    }
    else if($page == 'create-client') {
      $this->load->library('../controllers/admin/create_client');
      $this->create_client->create_client();
    }
    else if($page == 'view-wo') {
      $this->load->library('../controllers/admin/view_wo');
      $this->view_wo->view_wo($record);
    }
    else if($page == 'view-user') {
      $this->load->library('../controllers/admin/view_user');
      $this->view_user->view_user($record);
    }
    else if($page == 'view-client') {
      $this->load->library('../controllers/admin/view_client');
      $this->view_client->view_client($record);
    }
    else if($page == 'assigned-wo') {
      $this->load->library('../controllers/user/assigned_wo');
      $this->assigned_wo->assigned_wo();
    }
    else if($page == 'list-unassigned-wo') {
      $this->load->library('../controllers/admin/list_wo');
      $this->list_wo->list_unassigned_wo();
    }
    else if($page == 'list-stale-unassigned-wo') {
      $this->load->library('../controllers/admin/list_wo');
      $this->list_wo->list_stale_unassigned_wo();
    }
    else if($page == 'list-assigned-wo') {
      $this->load->library('../controllers/admin/list_wo');
      $this->list_wo->list_assigned_wo();
    }
    else if($page == 'list-stale-assigned-wo') {
      $this->load->library('../controllers/admin/list_wo');
      $this->list_wo->list_stale_assigned_wo();
    }
    else if($page == 'settings') {
      $this->load->library('../controllers/admin/settings');
      $this->settings->settings();
    }
    else if($page == 'lookup') {
      $this->load->library('../controllers/admin/lookup');
      $this->lookup->lookup();
    }
    else {
      $this->load->view('dashboard/map');
    }
    $this->load->view('dashboard/footer');
    $this->load->view('templates/footer', $this->data);
  }

  private function get_volunteer_sidebar() {
    $this->load->model(array('users_model', 'work_order_model'));
    $data['sidebar_result'] = $this->work_order_model->get_wo_assigned(
                              $this->users_model->get_UID(
                              $this->session->userdata('username')));
    $this->load->view('dashboard/sidebar-volunteer', $data);
  }
}
