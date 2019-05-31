<?php
    class Main_model extends CI_Model{
        public function insert_data($data){
            $this->db->insert("people_table", $data);
        }

        public function fetch_data(){
            $query = $this->db->get("people_table");
            //select * from table
            // $query=$this->db->query("SELECT * FROM people_table ORDER BY id ASC");
            return $query;
        }

        public function delete_data($id){
            $this->db->where("id", $id);
            $this->db->delete("people_table");
            //DELETE FROM person_table WHERE id=$id

        }

        function update_single_data($user_id)
        {
            $this->db->where("id", $user_id);
            // $query = $this->db->query("SELECT * FROM people_table");
            //Select * From person_table where id = '$id'
            $query = $this->db->get("people_table")->result();
            return $query;
        } 

        function update_data($data, $id)
        {
            $this->db->where("id", $id);
            $this->db->update("people_table", $data);
        }

    }
?>