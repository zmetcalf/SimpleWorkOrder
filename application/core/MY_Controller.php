<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

  protected $data = array(
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

  protected $controller = '';

  public function __construct() {
    parent::__construct();
    $this->load->model('users_model');
  }

  public function index($method = '', $record = '') {
    $this->session->all_userdata(); // Attempt to expire a session before the next line
    if($this->session->userdata('logged_in') == FALSE) {
      $this->load->helper('url');
      redirect('/login');
    }
    $this->generate_data($method);
    $this->load_page($method, $record);
  }

  private function generate_data($method = '')
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

    if ($this->controller == 'user') {
      $this->data['additional_css_el'] = array(
        '<link rel="stylesheet" href="' . base_url() . 'static/css/admin/user.css">'
      );
      $this->data['additional_js_el'] = array(
        '<script src="' . base_url() . 'static/js/admin/user.js"></script>'
      );
    }
    else if ($this->controller == 'work_order') {
      $this->data['additional_js_el'] = array(
        '<script src="//cdnjs.cloudflare.com/ajax/libs/mustache.js/0.7.2/mustache.min.js"></script>',
        '<script src="' . base_url() . 'static/js/admin/ajax/search.js"></script>',
        '<script src="' . base_url() . 'static/js/admin/work-order.js"></script>'
      );
    }
    else if ($this->controller == 'client') {
      $this->data['additional_css_el'] = array(
        '<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.2/leaflet.css">'
      );
      $this->data['additional_js_el'] = array(
        '<script src="//cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.2/leaflet.js"></script>',
        '<script src="' . base_url() . 'static/js/admin/ajax/update.js"></script>',
        '<script src="' . base_url() . 'static/js/admin/client.js"></script>'
      );
    }
    else if ($this->controller == 'list_wo' OR $this->controller == 'settings') {
      // No additional javascript css loaded
    }
    else if ($this->controller == 'lookup') {
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

  private function load_page($method, $record = '')
  {
    $this->load->view('templates/header', $this->data);
    $this->load->view('dashboard/main-nav', $this->data);

    if ($this->session->userdata('user_type') == 'Administrator') {
      $this->load->view('dashboard/sidebar');
    }
    else if ($this->session->userdata('user_type') == 'Volunteer') {
      $this->get_volunteer_sidebar();
    }

    if($this->controller) {
      $this->$method($record);
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
                              $this->session->userdata('user_id'));
    $this->load->view('dashboard/sidebar-volunteer', $data);
  }
}
