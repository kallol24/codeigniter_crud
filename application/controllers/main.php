<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index(){
        $this->load->model("Main_model");
        $data["fetch_data"] = $this->Main_model->fetch_data();
        // $this->load->view("Main_view");
        $this->load->view("Main_view", $data);
    }
    
    public function form_validation(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules("firstname", "First Name", 'required|alpha');
        $this->form_validation->set_rules("lastname", "Last Name", 'required|alpha');

        if($this->form_validation->run()){
            $this->load->model("Main_model");
            $data = array(
                "first_name" => $this->input->post("firstname"),
                "last_name" => $this->input->post("lastname")
            );
            if($this->input->post("update"))
            {
                $this->Main_model->update_data($data, $this->input->post("hidden_id"));
                redirect(base_url() . "main/updated");
            }
            if($this->input->post("insert")){
                $this->Main_model->insert_data($data);
                redirect(base_url() . "main/inserted");
            }
            
        }
        else{
            $this->index();
        }
        }

    public function inserted(){
        $this->index();
        }
    
    public function delete_data(){
        $id = $this->uri->segment(3);
        $this->load->model("Main_model");
        $this->Main_model->delete_data($id);
        redirect(base_url() . "main/deleted");
    }

    public function deleted(){
        $this->index();
    }

    public function update_data(){
        $user_id = $this->uri->segment(3);
        $this->load->model("Main_model");
        $data["user_data"] = $this->Main_model->update_single_data($user_id);
        $data["fetch_data"] = $this->Main_model->fetch_data();
        $this->load->view("Main_view", $data);
    }
    public function updated(){
        $this->index();
    }

}
