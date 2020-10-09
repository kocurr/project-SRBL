<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Tests_model extends CI_Model
{
  public function __construct()
  {
      parent::__construct();
  }
  public function get_Booking()
  {
    $post = $this->db->select('booking.booking_id, booking.Flight_number, booking.Seat_number, booking.Baggage, bs.name as status, p.first_name, fc.name as klasa, fc.cena')
                     ->join('booking_status bs', 'bs.Status_id=booking.Reservation_status')
                     ->join('passenger p', 'p.id=booking.Passenger_id')
                     ->join('flight f', 'f.flight_id=booking.Flight_number')
                     ->join('flight_class fc', 'fc.class_id=booking.class')
                     ->get('booking');
     if($post->num_rows() > 0){
       $post = $post->result();
       return $post;
     }else {
       return null;
     }
   }
   public function get_Class(){
     $post = $this->db->select('name, cena')
                      ->get('flight_class');
    if($post->num_rows() > 0){
      $post = $post->result();
      return $post;
    }else {
      return null;
    }
   }

  }
