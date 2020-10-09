<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Booking_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    //Funkcja wpisująca do bazy dane o rezerwacji
    public function insertReservation($reservationData){
      $this->db->insert('booking',$reservationData);
      return $this->db->insert_id();
    }
    //Funkcja potwierdzajaca zakup bieltu
    public function updateReservations($idReservation, $reservationData){
      $this->db->where('Booking_id',$idReservation);
      $this->db->update('booking',$reservationData);
      return true;
    }
}
