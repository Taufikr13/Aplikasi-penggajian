<?php
class DataJabatan extends CI_Controller{
    public function index(){
        $data['title'] = "Data Jabatan";
        $data['jabatan'] = $this->penggajianModel->get_data('tb_jabatan')->result();
        $this->load->view('temp_admin/header',$data);
        $this->load->view('temp_admin/sidebar');
        $this->load->view('admin/dataJabatan',$data);
        $this->load->view('temp_admin/footer');

    }

    public function tambahData(){
        $data['title'] = "Tambah Data Jabatan";
        $this->load->view('temp_admin/header',$data);
        $this->load->view('temp_admin/sidebar');
        $this->load->view('admin/tambahDataJabatan',$data);
        $this->load->view('temp_admin/footer');

    }
    public function tambahDataAksi(){
        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->tambahData();
        }else{
            $nama_jabatan = $this->input->post('nama_jabatan');
            $gaji_poko = $this->input->post('gaji_poko');
            $transport = $this->input->post('transport');
            $uang_makan = $this->input->post('uang_makan');

            $data = array(
                'nama_jabatan' => $nama_jabatan,
                'gaji_poko' => $gaji_poko,
                'transport' => $transport,
                'uang_makan' => $uang_makan,
            );
            $this->penggajianModel->insert_data($data,'tb_jabatan');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil ditambahkan</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

          redirect('admin/dataJabatan');
        }
    }

    public function updateData($id){
        $where = array('id_jabatan'=>$id);
        $data['jabatan'] = $this->db->query("SELECT * FROM tb_jabatan WHERE id_jabatan='$id'")->result();
        $data['title'] = "Update Data Jabatan";
        $this->load->view('temp_admin/header',$data);
        $this->load->view('temp_admin/sidebar');
        $this->load->view('admin/updateDataJabatan',$data);
        $this->load->view('temp_admin/footer');

    }
    public function updateDataAksi(){
        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->updateData();
        }else{
            $id = $this->input->post('id_jabatan');
            $nama_jabatan = $this->input->post('nama_jabatan');
            $gaji_poko = $this->input->post('gaji_poko');
            $transport = $this->input->post('transport');
            $uang_makan = $this->input->post('uang_makan');

            $data = array(
                'nama_jabatan' => $nama_jabatan,
                'gaji_poko' => $gaji_poko,
                'transport' => $transport,
                'uang_makan' => $uang_makan,
            );

            $where = array('id_jabatan' => $id);



            $this->penggajianModel->update_data('tb_jabatan',$data,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil diupdate</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

          redirect('admin/dataJabatan');
        }
    }
   

    public function _rules(){
        $this->form_validation->set_rules('nama_jabatan','nama jabatan','required');
        $this->form_validation->set_rules('gaji_poko','gaji poko','required');
        $this->form_validation->set_rules('transport','Transport','required');
        $this->form_validation->set_rules('uang_makan','uang makan','required');
    }


    public function deleteData($id){
        $where = array('id_jabatan'=>$id);
        $this->penggajianModel->delete_data($where,'tb_jabatan');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil dihapus</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

        redirect('admin/dataJabatan');



    }
}


?>