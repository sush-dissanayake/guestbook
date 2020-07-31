<?php
class Message extends CI_Model{
    
    function __construct() {
        // Set table name
        $this->load->database();
        $this->table = 'messages';
    }

    function saveMessage($name,$email,$message)
	{
        $data = [
            'name' => $name,
            'email' => $email,
            'message' => $message,
        ];
        
        if ($this->db->insert($this->table, $data)) {
            return true;
        }
        return false;
	}
    
    public function getMessages()
    {

        $this->db->select('id, name, email, message');
        $this->db->from($this->table);
        $this->db->where('status', 'ACCEPTED');
        $query = $this->db->get();
        $result = $query->result_array();
        
        return $result;
    }

    public function getMessage($id)
    {

        $this->db->select('name, email, message');
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row();
        
        return $result;
    }

    public function updateMessages() {;

        $this->db->set('status', 'ACCEPTED');
        $this->db->where('status', 'NEW');
        $this->db->where("message NOT LIKE '% baddd %' ");
        $this->db->update($this->table);

        $this->db->set('status', 'REJECTED');
        $this->db->where('status', 'NEW');
        $this->db->where("message LIKE '% baddd %' ");
        $this->db->update($this->table);
    }
}