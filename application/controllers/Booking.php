<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {

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
 		 $this->load->model(array('User_model', 'Main_models', 'Booking_model'));
		 $this->load->library('blade');
 		 $this->user_id = $this->session->userdata('user_id');
 	}

	public function index()
	{
    $this->blade->render('my_reservations');
	}
  public function Reservation($flight_id){
    if ($this->user_id) {
      $this->data['flight'] = $this->Main_models->getFlightsById($flight_id);
      $this->blade->render('confirm_reservation',$this->data);
    }
  }
  public function doReservation(){
    if ($this->user_id) {
      $user_id = $this->user_id;
      $flight_id = $_POST["flight_id"];
      if(isset($_POST["baggage"])){
        $reservationData = array(
                    'Passenger_id' => $user_id,
                    'Flight_number' => $flight_id,
                    'Seat_number' => rand(1, 200),
                    'Baggage' => "Tak",
                    'Class' => $_POST["class"],
                    'Reservation_status' => '1'
                  );
      }else {
        $reservationData = array(
                    'Passenger_id' => $user_id,
                    'Flight_number' => $flight_id,
                    'Seat_number' => rand(1, 200),
                    'Baggage' => "Nie",
                    'Class' => $_POST["class"],
                    'Reservation_status' => '1'
                  );
      }

      if($this->Main_models->checkReservations($user_id, $flight_id)){
        $this->Booking_model->insertReservation($reservationData);
      }else {
        $this->data['error'] = "Masz już rezerwacje na ten lot!";
      }
      $this->data['myReservations'] = $this->Main_models->getMyReservations($user_id);
      $this->blade->render('account_view',$this->data);
    }
  }
    //Funkcja kupowania biletu
    public function buyTicket($idTicket)
    {
      if ($this->user_id) {
        $updateData = array(
          'Reservation_status' => 2
        );
        $this->Booking_model->updateReservations($idTicket, $updateData);
      }
        $this->data['myReservations'] = $this->Main_models->getMyReservations($this->user_id);
        $this->blade->render('account_view',$this->data);
    }
}
