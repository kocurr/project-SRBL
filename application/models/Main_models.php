<?php

/**
 *
 */
class Main_models extends CI_Model
{
  function get_planes()
  {
    $query = $this->db->query('SELECT airplane_id, producer, type FROM airplane');
    return $query->result();
  }

  function delete_plane($id)
  {
    $this->db->query("delete from airplane where airplane_id='".$id."'");
  }

  function get_planesByID($id)
  {
    $query=$this->db->query("select * from airplane where airplane_id='".$id."'");
	  return $query->result();
  }

  function get_flightsByID($id)
  {
    $query=$this->db->query("select * from flight where flight_id='".$id."'");
	  return $query->result();
  }

  function update_airplanes($producer, $type, $id)
  {
    $query=$this->db->query("update airplane SET producer='$producer', type='$type' where airplane_id='".$id."'");
  }

  function update_flights($destination, $arrival_city, $departure_city, $airplane, $seats, $departure_date, $departure_time, $arrival_date, $arrival_time, $id)
  {
    $query=$this->db->query("update flight SET destination='$destination', arrival_city='$arrival_city', departure_city='$departure_city', airplane='$airplane', seats='$seats',
    departure_date='$departure_date', departure_time='$departure_time', arrival_date='$arrival_date', arrival_time='$arrival_time' where flight_id='".$id."'");
  }

  function delete_flight($id)
  {
    $this->db->query("delete from flight where flight_id='".$id."'");
  }

  function get_flights()
  {
    $post = $this->db->select('*')
                       ->get('flight');
       if ($post->num_rows() > 0) {
         $posts = $post->result();
         foreach ($posts as $key => $post) {
           $post->boughtTickets = $this->db->select("booking.booking_id, booking.Flight_number, booking.Reservation_status")
                                           ->where('booking.Flight_number', $post->flight_id)
                                           ->where('booking.Reservation_status', '2')
                                           ->get('booking')
                                           ->result();
        }
         return $posts;
       }
       return null;
    // $query = $this->db->query("select * from flight");
    // return $query->result();
  }
  //Funkcja wyświetlajaca loty o podanym id
  public function getFlightsById($flight_id)
  {
    $post = $this->db->select('flight_id, departure_city, arrival_city, departure_date, departure_time')
                     ->where('flight_id', $flight_id)
                     ->get('flight');
       if ($post->num_rows() > 0) {
         $post = $post->result()[0];
         return $post;
       }
       return null;
    // $query = $this->db->query("select * from flight");
    // return $query->result();
  }
  //Funkcja sprawdzająca rezerwacje na dany lot
  public function checkReservations($user_id, $flight_id){
        $post = $this->db->select('Booking_id')
                         ->where('Passenger_id', $user_id)
                         ->where('Flight_number', $flight_id)
                         ->get('booking');
       if($post->num_rows() > 0){
         return false;
       } else {
         return true;
       }
  }
  //Funkcja wyświetlajaca rezerwacje dokonane poprzez zaogowanego użytkownika
  public function getMyReservations($user_id){
        $post = $this->db->select('booking.*, f.flight_id, f.departure_city, f.arrival_city, f.departure_date, f.departure_time, bs.name as reservationsStatus, fc.name as flichtClass, fc.Cena as ticketPrize ')
                         ->join('flight f', 'f.flight_id=booking.Flight_number')
                         ->join('booking_status bs','bs.status_id=booking.Reservation_status')
                         ->join('flight_class fc', 'fc.class_id=booking.Class')
                         ->where('booking.Passenger_id', $user_id)
                         ->get('booking');
       if ($post->num_rows() > 0) {
         $post = $post->result();

         return $post;
       }
       return null;
  }
  public function getReservationsById($idTicket){
    $post = $this->db->select('booking.Booking_id, p.first_name, p.last_name, p.pesel, booking.Seat_number, booking.baggage, fc.name as ClassName, f.arrival_city')
                     ->join('passenger p', 'p.id=booking.Passenger_id')
                     ->join('flight_class fc', 'fc.class_id=booking.Class')
                     ->join('flight f', 'f.flight_id=booking.Flight_number')
                     ->where('Booking_id', $idTicket)
                     ->get('booking');
       if ($post->num_rows() > 0) {
         $post = $post->result()[0];
         return $post;
       }
       return null;
  }
  //Funkcja szukająca zakupione bilety
  public function searchBoughtTickets($flight_id){

  }
  function displayrecordsById($flight_id)
  {
    $query=$this->db->query("select * from flight where flight_id='".$flight_id."'");
	  return $query->result();
  }
}
?>
