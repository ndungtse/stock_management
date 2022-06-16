<?php
    // include_once("dbconn.php");

    class CRUD {
        public $table;
        public $fields;
        public $values;
        public $where;
        public $order;
        public $limit;
        public $offset;
        public $mysql;
        public $query;
        public $selection;
        public $result;
        public $join;
        public $row;
        public $error;
        public $success="request processed successfully!";
        public $count;
        public $last_id;

        public function __construct($table) {
            $this->table = $table;
            $this->mysql = new mysqli("localhost", "root", "chazard10.3", "supermarket");
            $this->mysql->set_charset("utf8");
        }

        public function create() {
            $this->query = "INSERT INTO ".$this->table." (".$this->fields.") VALUES (".$this->values.")";
            $this->result = $this->mysql->query($this->query) or die($this->mysql->error);
            $this->last_id = $this->mysql->insert_id;
            // $this->success = "Record created successfully";

            return $this->success;
        }

        public function read() {
            $this->query = "SELECT * FROM ".$this->table." ".$this->where." ".$this->order."".$this->join." ".$this->limit." ".$this->offset;
            $this->result = $this->mysql->query($this->query) or die($this->mysql->error);
            $this->count = $this->result->num_rows;

            return $this->result;
        }

        public function readCustom() {
            $this->query = "SELECT ".$this->selection." FROM ".$this->table." ".$this->order."".$this->join." ".$this->where." ".$this->limit." ".$this->offset;
            $this->result = $this->mysql->query($this->query) or die($this->mysql->error);
            $this->count = $this->result->num_rows;

            return $this->result;
        }

        public function update() {
            $this->query = "UPDATE ".$this->table." SET ".$this->fields." ".$this->where;
            $this->result = $this->mysql->query($this->query) or die($this->mysql->error);
            $this->success = "Record updated successfully";

            return $this->success;
        }

        public function delete() {
            $this->query = "DELETE FROM ".$this->table." ".$this->where;
            $this->result = $this->mysql->query($this->query) or die($this->mysql->error);
            $this->success = "Record deleted successfully";

            return $this->success;
        }

        public function count() {
            $this->query = "SELECT COUNT(*) FROM ".$this->table." ".$this->where;
            $this->result = $this->mysql->query($this->query) or die($this->mysql->error);
            $this->row = $this->result->fetch_row();
            $this->count = $this->row[0];

            return $this->count;
        }

        public function last_id() {
            $this->query = "SELECT LAST_INSERT_ID()";
            $this->result = $this->mysql->query($this->query) or die($this->mysql->error);
            $this->row = $this->result->fetch_row();
            $this->last_id = $this->row[0];

            return $this->last_id;
        }

        public function error() {
            return $this->error;
        }

        public function success() {
            return $this->success;
        }

        public function __destruct() {
            $this->mysql->close();
        }
        
    }
?>