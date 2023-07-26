<?php


class DatabaseObject {


    static protected $db;
    static protected $table_name = "";
    static protected $db_columns = [];
    public $errors = [];


    static public function db_init($db) {
        self::$db = $db;
    }

    static public function find_by_sql($sql) {
        $result =  self::$db->query($sql);
        if(!$result) {
          exit("Wystąpił błąd w zapytaniu do bazy danych.");
        }


            $object_array = [];

            while($record = $result->fetch_assoc()) {
                $object_array[] = self::instantiate($record);
            }
            $result->free();

            return $object_array;

    }

        static public function instantiate($record) {
            $object = new static;

            foreach($record as $property=>$value) {
                if(property_exists($object, $property)) {
                    $object->$property = $value;
                }
            }
            return $object;
        }


        static public function find_all() {
            $sql = "SELECT * FROM " . static::$table_name;
            $sql .=" ORDER BY ID ASC";

            return static::find_by_sql($sql);
        }

        static public function find_by_id($id) {
            $sql = "SELECT * FROM " . static::$table_name;
            $sql .=" WHERE id=" . self::$db->escape_string($id) . "";
            $obj_array = self::find_by_sql($sql);
            if (!empty($obj_array)) {
                return array_shift($obj_array);
            } else {
                return false;
            }
        }

        protected function validate() {
            $this->errors = [];

            // Add custom validations

            return $this->errors;
        }        

        public function create() {
            $this->validate();
            if(!empty($this->errors)) { return false; }
            $attributes = $this->sanitized_attributes();

            $sql = "INSERT into " . static::$table_name . " ("; 
            $sql .= join(' ,', array_keys($attributes));
            $sql .=" ) VALUES ('";
            $sql .= join("', '", array_values($attributes));
            $sql .="')";

            $result = self::$db->query($sql);

            if($result) {
                $this->id = self::$db->insert_id;
            } else {
                echo self::$db->error;
            }
            return $result;

        }
        
        

        public function update() {
            $this->validate();
            $attributes = $this->sanitized_attributes();

            $attribute_pairs = [];

            foreach($attributes as $key=>$value) {
                $attribute_pairs[] = "{$key}='{$value}'";
            }

            $sql = "UPDATE " . static::$table_name . " SET "; 
            $sql .= join(' ,', $attribute_pairs); 
            $sql .= " WHERE id='" . self::$db->escape_string($this->id) . "' "; 
            $sql .= "LIMIT 1";
            echo $sql;
            $result = self::$db->query($sql);
            if ($result) {
                return $result;
            } else {
                echo self::$db->error;
            }
        }


        public function save() {
            // A new record will not have an ID yet
            if(isset($this->id)) {
              return $this->update();
            } else {
              return $this->create();
            }
        }



        public function merge_attributes($args=[]) {
            foreach($args as $key=>$value) {
                if (property_exists($this, $key)) {
                    $this->$key = $value;
                }
            }
            return $args;
        }


        public function delete() {
            $sql = "DELETE FROM " . static::$table_name;
            $sql .= " WHERE id='" . self::$db->escape_string($this->id) . "' ";
            $sql .= "LIMIT 1;";
            $result = self::$db->query($sql);
            return $result;
        }




        // Properties which have database columns, excluding ID
        public function attributes() {
            $attributes = [];
            foreach(static::$db_columns as $column) {
            if($column == 'id') { continue; }
            $attributes[$column] = $this->$column;
            }
            return $attributes;
        }

        protected function sanitized_attributes() {
            $sanitized = [];
            foreach($this->attributes() as $key => $value) {
            $sanitized[$key] = self::$db->escape_string($value);
            }
            return $sanitized;
        }




        // end of active record pattern      


}