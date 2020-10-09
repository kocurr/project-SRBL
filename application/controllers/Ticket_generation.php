<?php
   class Ticket_generation extends CI_Controller{
   function __construct()
   { parent::__construct();
     $this->load->library('Pdf');
     $this->load->library('blade');
     $this->load->model(array('User_model', 'Main_models'));
   }
   function index() {

   // create new PDF document

    $this->data['flight'] = $this->Main_models->getReservationsById(13);
	  $this->blade->render('test',$this->data);
      //============================================================+
      // END OF FILE
      //============================================================+
    }
    public function generateTicket($idTicket){
      $this->data['flight'] = $this->Main_models->getReservationsById($idTicket);
      $Booking_id = 'SRBL000'.$this->data['flight']->Booking_id;
      $First_name = $this->data['flight']->first_name;
      $Last_name = $this->data['flight']->last_name;
      $Pesel = $this->data['flight']->pesel ;
      $Seat_number = $this->data['flight']->Seat_number;
      $Bagage = $this->data['flight']->baggage;
      $Class = $this->data['flight']->ClassName;
      $Arrival_city = $this->data['flight']->arrival_city;



      $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
      // set document information
      $pdf->SetCreator(PDF_CREATOR);
      $pdf->SetTitle('Ticket number '.$Booking_id.' for '.$First_name.' '.$Last_name);
      $pdf->SetKeywords('SRBL, PDF, ticket');
      // set default header data
      $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Bilet na lot do: '.$Arrival_city, PDF_HEADER_STRING, array(0,0,0), array(255,120,1));
      $pdf->setFooterData(array(0,64,0), array(0,64,128));

      // set header and footer fonts
      $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
      $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

      // set default monospaced font
      $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

      // set margins
      $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
      $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
      $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

      // set auto page breaks
      $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

      // set image scale factor
      $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


      // ---------------------------------------------------------

      // set default font subsetting mode
      $pdf->setFontSubsetting(true);

      // Add a page
      // This method has several options, check the source code documentation for more information.
      $pdf->AddPage();

      // Set some content to print
      $html =
      <<<EOF
        <!-- EXAMPLE OF CSS STYLE -->
          <style>
          table{
            border: 1px solid black;
            marign-top: 10%;
            padding: 10px 0;
          }
          h1{
            text-align: center;
          }
          th,td{
            border: 1px solid #dee2e6;
            text-align: center;
          }
          td{
            background-color:  #d6d8db;
          }
          .header{
            color: white;
            font-weight: bold;
            font-size: 110%;
            background-color: #212529;
          }
          </style><br><br><br><br><br><br>
          <h1>Numer biletu: $Booking_id</h1><br>
          <div class="table">
          <br><br><br><br>
            <table>
              <tr class="header">
                <th>Imie</th>
                <th>Nazwisko</th>
                <th>PESEL</th>
                <th>Miejsce</th>
                <th>Klasa</th>
                <th>Dodatkowy bagaz</th>
              </tr>
              <tr>
                  <td>$First_name</td>
                  <td>$Last_name</td>
                  <td>$Pesel</td>
                  <td>$Seat_number</td>
                  <td>$Class</td>
                  <td>$Bagage</td>
              </tr>
            </table>
          </div>
      EOF;

      // <span class="font-size: 190%;">Imie i nazwisko: </span> <span style="color:green; font-weight: bold; font-size: 160%;">$First_name $Last_name</span><br><br>
      // <span class="font-size: 190%;">PESEL:  </span> <span style="color:green; font-weight: bold; font-size: 160%;">$Pesel</span>
      // <p>This text is printed using the <i>writeHTMLCell()</i> method but you can also use: <i>Multicell(), writeHTML(), Write(), Cell() and Text()</i>.</p></div>;


      // output the HTML content
      $pdf->writeHTML($html, true, false, true, false, '');


      // ---------------------------------------------------------

      // Close and output PDF document
      // This method has several options, check the source code documentation for more information.
      $pdf->Output('example_001.pdf', 'I');
    }
   }
   ?>
