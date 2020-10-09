<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Search_model extends CI_Model
{
  public function __construct()
  {
      parent::__construct();
  }
  //Funkcja wyszukująca loty po
  public function searchDatabaseFlightsFrom($phrase1){
      $post = $this->db->select('*')
                       ->like('departure_city',$phrase1, 'none')
                       ->get('flight');
       if($post->num_rows() > 0){
         $posts = $post->result();
         foreach ($posts as $key => $post) {
           $post->boughtTickets = $this->db->select("booking.booking_id, booking.Flight_number, booking.Reservation_status")
                                           ->where('booking.Flight_number', $post->flight_id)
                                           ->where('booking.Reservation_status', '2')
                                           ->get('booking')
                                           ->result();
        }
         return $posts;
       }else {
         return null;
       }
     }
  public function searchDatabaseFlightsto($phrase1){
      $post = $this->db->select('*')
                       ->like('arrival_city',$phrase1, 'none')
                       ->get('flight');
       if($post->num_rows() > 0){
         $posts = $post->result();
         foreach ($posts as $key => $post) {
           $post->boughtTickets = $this->db->select("booking.booking_id, booking.Flight_number, booking.Reservation_status")
                                           ->where('booking.Flight_number', $post->flight_id)
                                           ->where('booking.Reservation_status', '2')
                                           ->get('booking')
                                           ->result();
        }
         return $posts;
       }else {
         return null;
       }
     }
  public function searchDatabaseFlights($phrase1, $phrase){
      $post = $this->db->select('*')
                       ->like('departure_city',$phrase1, 'none')
                       ->like('arrival_city',$phrase, 'none')
                       ->get('flight');
       if($post->num_rows() > 0){
         $posts = $post->result();
         foreach ($posts as $key => $post) {
           $post->boughtTickets = $this->db->select("booking.booking_id, booking.Flight_number, booking.Reservation_status")
                                           ->where('booking.Flight_number', $post->flight_id)
                                           ->where('booking.Reservation_status', '2')
                                           ->get('booking')
                                           ->result();
        }
         return $posts;
       }else {
         return null;
       }
     }
}
