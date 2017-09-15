<?php
class News_model extends CI_Model {

	    public $title;
        public $content;
        public $date;

        public function __construct()
        {
                $this->load->database();
        }

        public function get_last_five_entries()
        {
                $query = $this->db->get('entries', 5);
                return $query->result();
        }

        public function insert_entry()
        {
                $this->title    = $_POST['title']; 
                $this->date     = time();
                $this->content  = $_POST['content'];

                $this->db->insert('entries', $this);
        }

        public function update_entry()
        {
                $this->title    = $_POST['title'];
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->update('entries', $this, array('id' => $_POST['id']));
        }

}