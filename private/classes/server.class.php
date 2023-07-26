<?php


class Server extends DatabaseObject {

    // start of active record pattern

    static protected $table_name = "servers";
    static public $db_columns = ['id', 'server_name', 'expiry_date', 'server_operator', 'note', 'price', 'client_name'];


      public $id;
      public $server_name;
      public $expiry_date;
      public $server_operator;
      public $note;
      public $price;
      public $client_name;

      public function __construct($args=[]) {
        $this->server_name = $args['server_name'] ?? '';
        $this->expiry_date = $args['expiry_date'] ?? '';
        $this->server_operator = $args['server_operator'] ?? '';
        $this->note = $args['note'] ?? '';
        $this->price = $args['price'] ?? '';
        $this->client_name = $args['client_name'] ?? '';
      }




      protected function validate() {
        $this->errors = [];

        if(is_blank($this->server_name)) {
          $this->errors[] = "Pole Nazwa Serwera nie może być puste.";
        } elseif (!has_length($this->server_name, array('min' => 2, 'max' => 255))) {
          $this->errors[] = "Pole Nazwa Serwera musi mieć od 2 do 255 znaków.";
        }

        if(is_blank($this->expiry_date)) {
          $this->errors[] = "Pole data wygaśnięcia nie może być puste.";
        } elseif (!has_length($this->expiry_date, array('min' => 2, 'max' => 255))) {
          $this->errors[] = "Pole data wygaśnięcia musi mieć od 2 do 255 znaków.";
        }



        return $this->errors;
      }    

  

}