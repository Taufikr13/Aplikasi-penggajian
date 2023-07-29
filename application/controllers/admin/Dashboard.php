<?php

class Dashboard extends CI_Controller{
    public function index(){
        $data['title'] ="Dashboard";
        $pegawai = $this->db->query("SELECT * FROM tb_pegawai");
        $admin = $this->db->query("SELECT * FROM tb_pegawai WHERE jabatan ='ADMIN'");
        $jabatan = $this->db->query("SELECT * FROM tb_jabatan");
        $kehadiran = $this->db->query("SELECT * FROM tb_kehadiran");
        $data['pegawai'] = $pegawai->num_rows();
        $data['admin'] = $admin->num_rows();
        $data['jabatan'] = $jabatan->num_rows();
        $data['kehadiran'] = $kehadiran->num_rows();
        $this->load->view('temp_admin/header',$data);
        $this->load->view('temp_admin/sidebar');
        $this->load->view('admin/dashboard',$data);
        $this->load->view('temp_admin/footer');
    }
}

?>