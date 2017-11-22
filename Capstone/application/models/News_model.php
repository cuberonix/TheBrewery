<?php
class News_model extends CI_Model {


        public function __construct()
        {
                $this->load->database();
        }

        public function get_last_five_entries()
        {
                $query = $this->db->get('entries', 5);
                return $query->result();
        }

        public function recent_entry()
        {
            $this->db->select('*');
            $this->db->from('news');
            $this->db->order_by('date_created', 'DESC');
            $this->db->limit('1');

            $query = $this->db->get();

            return $query->result();
        }

        public function singleNews($id)
    {
        $this->db->select('*');
        $this->db->where('news_id', $id);
        $this->db->from('news');
        $query = $this->db->get();
        return $query->row();
    }

        public function insert_entry()
        {
                $data = array(
                'news_title' => $this->input->post('news_title'),
                'news_body' => $this->input->post('news_body'),
                );

        $this->db->insert('news', $data);
        $id = $this->db->insert_id();
        return $id;
        }

        public function update_entry()
        {
                $this->title    = $_POST['title'];
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->update('entries', $this, array('id' => $_POST['id']));
        }


        public function all_news()
        {
           $this->db->select('*');
           $this->db->from('news');
           $query = $this->db->get();

           return $query->result();
        }

        public function editEntry($id)
        {
            $this->db->select('*');
            $this->db->where('news_id', $id);
            $this->db->from('news');
            $query = $this->db->get();
            return $query->row();

            $data = array(
                'news_title' => $this->input->post('news_title'),
                'news_body' => $this->input->post('news_body'),
                );

            $this->db->select('*');
            $this->db->where('news_id', $id);
            $this->db->update('news', $data);
            return $id;
        }

        public function updateEntry($id)
    {
        $data = array(
                'news_title' => $this->input->post('news_title'),
                'news_body' => $this->input->post('news_body'),
                );

        $this->db->select('*');
        $this->db->where('news_id', $id);
        $this->db->update('news', $data);
        return $id;
    }

        public function deleteNews($id)
        {
        
            $data = array(
                'news_title' => $this->input->post('news_title'),
                'news_body' => $this->input->post('news_body'),
                );

            $this->db->select('*');
            $this->db->where('news_id', $id);
            $this->db->delete('news', $data);
            return $id;
        }

        public function comments()
        {
            $this->db->select('*');
            $this->db->where('entry_id');
            $this->db->from('newscomments');
            $query = $this->db->get();
            return $query->row();
        }

}