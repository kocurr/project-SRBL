<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
   public function __construct()
   {
      parent::__construct();
      $this->load->model(array('User_model','Main_models'));
      $this->load->library('blade');
      $this->user_id = $this->session->userdata('user_id');
   }

   public function index()
	 {
	    $this->blade->render('login_view');
	 }

   public function post_login()
   {
     $this->form_validation->set_rules('email', 'Email', 'required');
     $this->form_validation->set_rules('password', 'Password', 'required');

     $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
     $this->form_validation->set_message('required', 'Enter %s');

     if ($this->form_validation->run() === FALSE)
     {
       $this->blade->render('login_view');
     }
     else
     {
       $data = array(
          'email' => $this->input->post('email'),
          'password' => md5($this->input->post('password'))
       );

       $check = $this->User_model->auth_check($data);

         if ($check != false)
         {

           $user = array(
             'user_id' => $check->id,
             'email' => $check->email,
             'login' => $check->login,
             'first_name' => $check->first_name,
             'last_name' => $check->last_name,
             'phone_number' => $check->phone_number,
             'pesel' => $check->pesel,
             'age' => $check->age,
             'address' => $check->address,
             'is_admin' => $check->is_admin
           );

           $this->session->set_userdata($user);

           if ($check->is_admin == 1) {
             redirect( base_url('main/admin') );
           }
           else
           {
             redirect(base_url('main') );
           }
         }
     }
   }

   public function register()
   {
      $this->blade->render('register_view');
   }

   public function post_register()
   {
     $this->form_validation->set_rules('login', 'Login', 'required');
     $this->form_validation->set_rules('password', 'Password', 'required');
     $this->form_validation->set_rules('first_name', 'First_name', 'required');
     $this->form_validation->set_rules('last_name', 'Last_name', 'required');
     $this->form_validation->set_rules('pesel', 'Pesel', 'required');
     $this->form_validation->set_rules('age', 'Age', 'required');
     $this->form_validation->set_rules('address', 'Address', 'required');
     $this->form_validation->set_rules('phone_number', 'Phone_number', 'required');
     $this->form_validation->set_rules('email', 'Email', 'required');
     $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
     $this->form_validation->set_message('required', 'Enter %s');

     if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('register_view');
        }
        else
        {
            $data = array(
               'login' => $this->input->post('login'),
               'first_name' => $this->input->post('first_name'),
               'last_name' => $this->input->post('last_name'),
               'pesel' => $this->input->post('pesel'),
               'age' => $this->input->post('age'),
               'address' => $this->input->post('address'),
               'phone_number' => $this->input->post('phone_number'),
               'email' => $this->input->post('email'),
               'password' => md5($this->input->post('password'))
             );
            $check = $this->User_model->insert_user($data);
            if($check != false){
                $user = array(
                 'user_id' => $check,
                 'email' => $this->input->post('email'),
                 'login' => $this->input->post('login'),
                 'first_name' => $this->input->post('first_name'),
                 'last_name' => $this->input->post('last_name'),
                 'phone_number' => $this->input->post('phone_number'),
                 'pesel' => $this->input->post('pesel'),
                 'age' => $this->input->post('age'),
                 'address' => $this->input->post('address')
                );
             }
             $this->session->set_userdata($user);
             redirect(base_url('user/profile') );
            }
   }

   public function profile()
   {
     $this->data['myReservations'] = $this->Main_models->getMyReservations($this->user_id);
     $this->blade->render('account_view',$this->data);
   }

   public function profile_admin()
   {
     $this->load->view('account_admin_view');
   }

   public function add_admin()
   {
     $data['planes'] = $this->User_model->getPlanes();
     $this->load->view('add_admin_view', $data);
   }

   public function post_add_flight()
   {
     $this->form_validation->set_rules('destination', 'Destination', 'required');
     $this->form_validation->set_rules('arrival_city', 'Arrival_city', 'required');
     $this->form_validation->set_rules('departure_city', 'Departure_city', 'required');
     $this->form_validation->set_rules('airplane', 'Airplane', 'required');
     $this->form_validation->set_rules('seats', 'Seats', 'required');
     $this->form_validation->set_rules('departure_date', 'Age', 'required');
     $this->form_validation->set_rules('departure_time', 'Departure_time', 'required');
     $this->form_validation->set_rules('arrival_date', 'Arrival_date', 'required');
     $this->form_validation->set_rules('arrival_time', 'Arrival_time', 'required');
     $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
     $this->form_validation->set_message('required', 'Enter %s');

     if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('add_admin_view');
        }
        else
        {
            $data = array(
               'destination' => $this->input->post('destination'),
               'arrival_city' => $this->input->post('arrival_city'),
               'departure_city' => $this->input->post('departure_city'),
               'airplane' => $this->input->post('airplane'),
               'seats' => $this->input->post('seats'),
               'departure_date' => $this->input->post('departure_date'),
               'departure_time' => $this->input->post('departure_time'),
               'arrival_date' => $this->input->post('arrival_date'),
               'arrival_time' => $this->input->post('arrival_time')
             );
            $check = $this->User_model->insert_flight($data);
            if($check != false){
                $flight = array(
                 'flight_id' => $check,
                 'destination' => $this->input->post('destination'),
                );
             }
             redirect(base_url('main/admin') );
            }
   }

   public function post_add_plane()
   {
     $this->form_validation->set_rules('producer', 'Producer', 'required');
     $this->form_validation->set_rules('type', 'Type', 'required');
     $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
     $this->form_validation->set_message('required', 'Enter %s');

     if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('add_admin_view');
        }
        else
        {
            $data = array(
               'producer' => $this->input->post('producer'),
               'type' => $this->input->post('type'),
             );
            $check = $this->User_model->insert_plane($data);
            if($check != false){
                $plane = array(
                 'airplane_id' => $check,
                 'producer' => $this->input->post('producer'),
                 'type' => $this->input->post('type'),
                );
             }
             redirect(base_url('main/admin') );
            }
   }

   public function logout()
   {
     $this->session->sess_destroy();
     redirect(base_url('main'));
   }
}
