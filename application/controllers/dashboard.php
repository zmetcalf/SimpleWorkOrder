<?php

class Dashboard extends CI_Controller {

  private $data = array(
    'additional_css_el' => '',
    'additional_js_el' => '',
    'stylesheet' => 'dashboard',
    'description' => 'Login to SimpleWorkOrder',
    'author' => 'SimpleWorkOrder',
    'title' => 'Dashboard | SimpleWorkOrder',
    'menu_title' => 'SimpleWorkOrder',
    'slug' => '',
    'admin' => FALSE,
    'pending_users' => FALSE
  );

  public function __construct()
  {
    parent::__construct();
    $this->load->model('users_model');
  }

  public function index($controller = '', $method = '', $record = '')
  {
    $this->session->all_userdata(); // Attempt to expire a session before the next line
    if($this->session->userdata('logged_in') == FALSE) {
      $this->load->helper('url');
      redirect('/login');
    }
    $this->generate_data($controller, $method);
    $this->load_page($controller, $method, $record);
  }

  private function generate_data($controller = '', $method = '')
  {
    // Sidebar
    $this->data['slug'] = $method;

    // Main-menu
    if($this->session->userdata('user_type') == 'Administrator') {
      $this->data['admin'] = TRUE;
    }

    // Flags if there are pending users
    if($this->users_model->get_pending()) {
      $this->data['pending_users'] = TRUE;
    }

    if ($controller == 'user') {
      $this->data['additional_css_el'] = array(
        '<link rel="stylesheet" href="' . base_url() . 'static/css/admin/user.css">'
      );
      $this->data['additional_js_el'] = array(
        '<script src="' . base_url() . 'static/js/admin/user.js"></script>'
      );
    }
    else if ($controller == 'work_order') {
      $this->data['additional_css_el'] = array(
        '<link rel="stylesheet" href="' . base_url() . 'static/css/admin/work-order.css">'
      );
      $this->data['additional_js_el'] = array(
        '<script src="//cdnjs.cloudflare.com/ajax/libs/mustache.js/0.7.2/mustache.min.js"></script>',
        '<script src="' . base_url() . 'static/js/admin/ajax/search.js"></script>',
        '<script src="' . base_url() . 'static/js/admin/work-order.js"></script>'
      );
    }
    else if ($controller == 'client') {
      $this->data['additional_css_el'] = array(
        '<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.2/leaflet.css">'
      );
      $this->data['additional_js_el'] = array(
        '<script src="//cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.2/leaflet.js"></script>',
        '<script src="' . base_url() . 'static/js/admin/ajax/update.js"></script>',
        '<script src="' . base_url() . 'static/js/admin/client.js"></script>'
      );
    }
    else if ($controller == 'list_wo' OR $controller == 'settings') {
      // No additional javascript css loaded
    }
    else if ($controller == 'lookup') {
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

  private function load_page($controller = '', $method, $record = '')
  {
    $this->load->view('templates/header', $this->data);
    $this->load->view('dashboard/main-nav', $this->data);

    if ($this->session->userdata('user_type') == 'Administrator') {
      $this->load->view('dashboard/sidebar');
    }
    else if ($this->session->userdata('user_type') == 'Volunteer') {
      $this->get_volunteer_sidebar();
    }

    if($controller) {
      $this->load->library('../controllers/admin/'.$controller);
      $this->$controller->$method($record);
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
