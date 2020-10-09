<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

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
 		 $this->load->model(array('User_model', 'Main_models'));
		 $this->load->library('blade');
 		 $this->user_id = $this->session->userdata('user_id');
 	}

	public function index()
	{
		$this->blade->render('main_view');

	}

	public function logged()
	{
		if ($this->user_id) {
			$this->load->view('main_logged_view');
		}else{
		$this->load->view('main_view');
		}
	}

	public function admin()
	{
		if ($this->user_id) {
			$this->load->view('admin_view');
		}else{
		$this->load->view('main_view');
		}
	}
	public function flights()
	{
		$this->data['flights'] = $this->Main_models->get_flights();
		$this->blade->render('flights_logged_view', $this->data);
	}
	public function myReservations($user_id){
		$this->data['myReservations'] = $this->Main_models->getMyReservations($user_id);
	}
	public function flights_admin()
	{
		if ($this->user_id) {
			$result['flights'] = $this->Main_models->get_flights();

			$this->load->view('flights_admin_view', $result);
		}else{
		$this->load->view('main_view');
		}
	}

	public function delete_flight()
	{
		$id=$this->input->get('id');
  	$this->Main_models->delete_flight($id);
  	redirect("main/flights_admin");
	}

	public function update_flight()
	{
		$id = $this->input->get('id');
		$result['flights'] = $this->Main_models->get_flightsByID($id);
		$this->load->view('update_flight_view',$result);

					if($this->input->post('update'))
					{
						$d=$this->input->post('destination');
						$ac=$this->input->post('arrival_city');
						$dc=$this->input->post('departure_city');
						$s=$this->input->post('seats');
						$a=$this->input->post('airplane');
						$dd=$this->input->post('departure_date');
						$ad=$this->input->post('arrival_date');
						$dt=$this->input->post('departure_time');
						$at=$this->input->post('arrival_time');
						$this->Main_models->update_flights($d,$ac,$dc,$a,$s,$dd,$dt,$ad,$at,$id);
						redirect("main/flights_admin");
					}

					if($this->input->post('discard'))
					{
						redirect("main/flights_admin");
					}

	}

	public function airplanes_admin()
	{
		if ($this->user_id) {
			$result['airplanes'] = $this->Main_models->get_planes();
			$this->load->view('airplanes_admin_view', $result);
		}else{
		$this->load->view('main_view');
		}
	}

	public function delete_airplane()
  {
    $id=$this->input->get('id');
  	$this->Main_models->delete_plane($id);
  	redirect("main/airplanes_admin");
  }

	public function update_airplane()
	{
		$id = $this->input->get('id');
		$result['airplanes'] = $this->Main_models->get_planesByID($id);
		$this->load->view('update_airplane_view',$result);

					if($this->input->post('update'))
					{
						$p=$this->input->post('producer');
						$t=$this->input->post('type');
						$this->Main_models->update_airplanes($p,$t,$id);
						redirect("main/airplanes_admin");
					}

					if($this->input->post('discard'))
					{
						redirect("main/airplanes_admin");
					}

	}

	public function reserwflight()
	{
		$flight_id = $this->input->get('id');
		$result['flights']=$this->Main_models->displayrecordsById($flight_id);
		$this->load->view('reservation_view',$result);
	}
}
