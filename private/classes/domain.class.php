<?php


class Domain extends DatabaseObject {

    // start of active record pattern

    static protected $table_name = "domains";
    static public $db_columns = ['id', 'domain_name', 'expiry_date', 'domain_operator', 'note', 'price', 'client_name'];


      public $id;
      public $domain_name;
      public $expiry_date;
      public $domain_operator;
      public $note;
      public $price;
      public $client_name;

      public function __construct($args=[]) {
        $this->domain_name = $args['domain_name'] ?? '';
        $this->expiry_date = $args['expiry_date'] ?? '';
        $this->domain_operator = $args['domain_operator'] ?? '';
        $this->note = $args['note'] ?? '';
        $this->price = $args['price'] ?? '';
        $this->client_name = $args['client_name'] ?? '';
      }




      protected function validate() {
        $this->errors = [];

        if(is_blank($this->domain_name)) {
          $this->errors[] = "Pole Nazwa Domeny nie może być puste.";
        } elseif (!has_length($this->domain_name, array('min' => 2, 'max' => 255))) {
          $this->errors[] = "Pole Nazwa Domeny musi mieć od 2 do 255 znaków.";
        }

        if(is_blank($this->expiry_date)) {
          $this->errors[] = "Pole data wygaśnięcia nie może być puste.";
        } elseif (!has_length($this->expiry_date, array('min' => 2, 'max' => 255))) {
          $this->errors[] = "Pole data wygaśnięcia musi mieć od 2 do 255 znaków.";
        }



        return $this->errors;
      }    

  

}