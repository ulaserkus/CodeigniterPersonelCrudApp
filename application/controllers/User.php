<?php

class User extends CI_Controller
{
    public function index()
    {
        if (get_user()) {
            redirect(base_url("personel"));
           
        }else{

            $this->session->unset_userdata("alert");
            $this->login_form();
        }
    }

    public function login_form()
    {
        $this->load->view('login_form');
    }

    public function login()
    {
        $email = $this->input->post("email");
        $password = $this->input->post("password");

        if (!$email || !$password) {
            $alert = array(
                "title" => "Başarısız",
                "message" => "Giriş Başarısız",
                "type" => "alert-danger"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("user/login_form"));
        } else {
            $this->load->model("user_model");
            $data = array(
                "email" => $email,
                "sifre" => md5($password)
            );

            $user = $this->user_model->get($data);

            if ($user) {
                $userArr = array(
                    "username" => $user->kullanici_adi,
                    "email" => $user->email
                );
                $this->session->set_userdata("user", $userArr);
                $alert = array(
                    "title" => "Başarılı",
                    "message" => "Giriş Başarılı",
                    "type" => "alert-success"
                );
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("personel"));
            } else {
                $alert = array(
                    "title" => "Başarısız",
                    "message" => "Şifre veya email hatalı",
                    "type" => "alert-danger"
                );

                redirect(base_url("user/login_form"));
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata("user");
        redirect(base_url());
    }
}
