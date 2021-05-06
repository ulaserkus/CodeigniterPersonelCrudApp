<?php

class Personel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!get_user()) {
            redirect(base_url("user/login_form"));
        }
    }

    public function index()
    {
        //listing
        $this->load->model("personel_model");
        $result = $this->personel_model->list_all();

        $viewData = array(
            "result" => $result
        );

        $this->load->view("personel_list", $viewData);
    }

    public function insert_form()
    {
        //adding form view
        $this->load->view("personel_add");
    }

    public function insert()
    {
        //inserting
        $this->load->model("personel_model");
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library("upload", $config);

        if ($this->upload->do_upload("img")) {
            $img = $this->upload->data("file_name");
            $data = array(
                "fullname" => $this->input->post("fullname"),
                "email" => $this->input->post("email"),
                "phone" => $this->input->post("phone"),
                "address" => $this->input->post("address"),
                "department" => $this->input->post("department"),
                "img" => $img

            );

            $insert = $this->personel_model->insert($data);

            if ($insert) {
                $alert = array(
                    "title" => "Başarılı",
                    "message" => "Ekleme işlemi başarılı",
                    "type" => "alert-success"
                );
            } else {
                $alert = array(
                    "title" => "Başarısız",
                    "message" => "Ekleme işlemi başarısız",
                    "type" => "alert-danger"
                );
            }
        } else {
            $alert = array(
                "title" => "Başarısız",
                "message" => $this->upload->display_errors(),
                "type" => "alert-danger"
            );
        }
        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("personel"));
    }

    public function delete($id)
    {
        //deleting
        $this->load->model("personel_model");
        $where = array(
            "id" => $id
        );
        $delete = $this->personel_model->delete($where);

        if ($delete) {
            $alert = array(
                "title" => "Başarılı",
                "message" => "Silme başarılı",
                "type" => "alert-success"
            );
        } else {
            $alert = array(
                "title" => "Başarısız",
                "message" => "Silme başarısız",
                "type" => "alert-danger"
            );
        }
        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("personel"));
    }

    public function update_form($id)
    {
        $this->load->model("personel_model");
        $where = array(
            "id" => $id
        );
        $row = $this->personel_model->get($where);
        $viewData = array(
            "row" => $row
        );
        $this->load->view("personel_update", $viewData);
    }

    public function update($id)
    {
        //updating
        $this->load->model("personel_model");
        $img = $_FILES["img"]["name"];

        if ($img) {
            $config['upload_path'] = 'uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("img")) {
                $img = $this->upload->data("file_name");
                $data = array(

                    "fullname" => $this->input->post("fullname"),
                    "email" => $this->input->post("email"),
                    "phone" => $this->input->post("phone"),
                    "address" => $this->input->post("address"),
                    "department" => $this->input->post("department"),
                    "img" => $img

                );
            }
        } else {

            $data = array(

                "fullname" => $this->input->post("fullname"),
                "email" => $this->input->post("email"),
                "phone" => $this->input->post("phone"),
                "address" => $this->input->post("address"),
                "department" => $this->input->post("department")

            );
        }

        $where = array(
            "id" => $id
        );

        $update = $this->personel_model->update($where, $data);

        if ($update) {
            $alert = array(
                "title" => "Başarılı",
                "message" => "Güncelleme Başarılı",
                "type" => "alert-success"
            );
        } else {
            $alert = array(
                "title" => "Başarısız",
                "message" => "Güncelleme başarısız",
                "type" => "alert-danger"
            );
        }
        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("personel"));
    }
    public function order($field, $order_by)
    {
        //ordering
        $this->load->model("personel_model");
        $result = $this->personel_model->order($field, $order_by);

        $viewData = array(
            "result" => $result
        );

        $this->load->view("personel_list", $viewData);
    }
}
