<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testing extends CI_Controller {

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
 		 $this->load->model(array('User_model', 'Search_model', 'Tests_model'));
		 $this->load->library('blade');
     $this->load->library('unit_test');
 		 $this->user_id = $this->session->userdata('user_id');
 	}

	public function index()
	{
		$this->data['Test_header'] = "Testy jednostkowe odnośnie poprawności biletu";
    $r1 = array(
      'Booking_id' => 1,
      'Passenger_id' => 2,
      'Flight_number' => 3,
      'Seat_number' => 85,
      'Baggage' => 'yes',
      'Class' => 'pierwsza',
      'Reservation_status' => 'paid',
      'Ticket_prize' => '300',
      );
    $r2 = array(
      'Booking_id' => 1,
      'Passenger_id' => 2,
      'Flight_number' => 3,
      'Seat_number' => 85,
      'Baggage' => 'yes',
      'Class' => 'ekonomiczna',
      'Reservation_status' => 'paid',
      'Ticket_prize' => '100',
      );
    $r3 = array(
      'Booking_id' => 1,
      'Passenger_id' => 2,
      'Flight_number' => 3,
      'Seat_number' => 85,
      'Baggage' => 'yes',
      'Class' => 'biznes',
      'Reservation_status' => 'paid',
      'Ticket_prize' => '200',
      );
		$f1 = array(
			'departure_city' => 'Jasionka',
			'arrival_city' => 'Rzeszów',
			'departure_date' => '2020-01-10'
		);
		$test_name = 'Sprawdza czy numer rezerwacji, lotu, miejsce i id pasażera są liczbą';
		$test_name1 = 'Sprawdza czy informacje o bagażu, klasie i statusie rezerwacji są zapisane w stringu';
		$test_name2 = 'Sprawdza poprawną cene biletów w odpowiedniej klasie';
		$test_name3 = 'Sprawdza czy miasto wylotu nie jest takie samo jak miasto odlotu';
		$test_name4 = 'Sprawdza czy lot nie jest przedawniony ';
		$r1_expected_result = 300;
		$r2_expected_result = 100;
		$r3_expected_result = 200;
		$notes = 'Numer rezerwacji, lotu, miejsce i id pasażera musza być liczbami.';
		$notes1 = 'Adekwatna cena biletów i wybranej przez pasażera klasie lotu';
		$notes2 = 'Sprawdza czy lot nie uległ przedawnieniu, co za tym idzie czy bilet jest ważny';
			if($f1['departure_city'] == $f1['arrival_city'] OR $f1['arrival_city'] == $f1['departure_city']) {
				$f1_city = false;
			}
			else{
				$f1_city = true;
			}
		$date = date('Y-m-d');
			if($f1['departure_date'] < $date){
				$f1_dep_date = false;
			}else{
				$f1_dep_date = true;
			}
		$str = '<table  border="1" cellpadding="7" cellspacing="0" >
			{rows}
        <tr>
          <td>{item}</td>
          <td>{result}</td>
        </tr>
			{/rows}
			</table>';
		$this->unit->set_template($str);
		$this->unit->run($r1['Booking_id'], 'is_int', $test_name, $notes);
		$this->unit->run($r1['Passenger_id'], 'is_int', $test_name, $notes);
		$this->unit->run($r1['Flight_number'], 'is_int', $test_name, $notes);
		$this->unit->run($r1['Seat_number'], 'is_int', $test_name, $notes);
		$this->unit->run($r1['Baggage'], 'is_string', $test_name1);
		$this->unit->run($r1['Class'], 'is_string', $test_name1);
		$this->unit->run($r1['Reservation_status'], 'is_string', $test_name1);
		$this->unit->run($r1['Ticket_prize'], $r1_expected_result, $test_name2, $notes1);
		$this->unit->run($r2['Ticket_prize'], $r2_expected_result, $test_name2, $notes1);
		$this->unit->run($r3['Ticket_prize'], $r3_expected_result, $test_name2, $notes1);
		$this->unit->run($f1_city, true, $test_name3, $notes2);
		$this->unit->run($f1_dep_date, true, $test_name4, $notes2);

 		$this->data['test_report'] = $this->unit->report();
		$this->blade->render('tests_view',$this->data);
	}
	public function test1(){
		$this->data['Test_header'] = "Testy integracyjne odnośnie poprawności biletu";
		$str = '<table  border="1" cellpadding="7" cellspacing="0" >
			{rows}
        <tr>
          <td>{item}</td>
          <td>{result}</td>
        </tr>
			{/rows}
			</table>';
		$this->unit->set_template($str);
		$r1 = $this->Tests_model->get_Booking();
		$r1_expected_result = $this->Tests_model->get_Class();
		//---------------Testy------------

		$test_name = 'Sprawdza poprawną cene biletów w odpowiedniej klasie';
		$notes = 'Adekwatna cena biletów i wybranej przez pasażera klasie lotu.';

		$this->unit->run($r1[0]->cena, $r1_expected_result[1]->cena, $test_name, $notes);
		$this->unit->run($r1[1]->cena, $r1_expected_result[1]->cena, $test_name, $notes);
		$this->unit->run($r1[2]->cena, $r1_expected_result[1]->cena, $test_name, $notes);
		$this->unit->run($r1[3]->cena, $r1_expected_result[2]->cena, $test_name, $notes);
		$this->unit->run($r1[4]->cena, $r1_expected_result[1]->cena, $test_name, $notes);
		$this->unit->run($r1[5]->cena, $r1_expected_result[2]->cena, $test_name, $notes);
		$this->data['test_report'] = $this->unit->report();
		$this->data['r1'] = $r1;
		$this->data['r2'] = $r1_expected_result;
		$this->blade->render('tests_view',$this->data);
	}
}
