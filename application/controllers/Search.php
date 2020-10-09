<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

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
 		 $this->load->model(array('User_model', 'Search_model'));
		 $this->load->library('blade');
 		 $this->user_id = $this->session->userdata('user_id');
 	}

	public function index()
	{

	}
  //Funkcja wyszukująca Loty
  public function searchFlights(){
    $arrival_city = $_POST['arrival_city'];
    $departure_city = $_POST['departure_city'];
    $this->data['arrival_city'] = $arrival_city;
    $this->data['departure_city'] = $departure_city;

		if(!empty($departure_city) && !empty($arrival_city)){
			$this->data['flights'] = $this->Search_model->searchDatabaseFlights($departure_city,$arrival_city);
		}elseif(!empty($departure_city)){
			$this->data['flights'] = $this->Search_model->searchDatabaseFlightsFrom($departure_city);
		}elseif(!empty($arrival_city)) {
			$this->data['flights'] = $this->Search_model->searchDatabaseFlightsTo($arrival_city);
		}

		// if(!empty($departure_city)){
		// 	$this->data['flights'] = $this->Search_model->searchDatabaseFlightsFrom($departure_city);
		// }elseif(!empty($arrival_city)){
		// 	$this->data['flights'] = $this->Search_model->searchDatabaseFlightsTo($arrival_city);
		// }
    $this->blade->render('flights',$this->data);
  }
}
