
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dataPegawai extends CI_Controller{
    public function index(){
        $data['title'] = "Data Pegawai";
        $data['pegawai'] = $this->penggajianModel->get_data('tb_pegawai')->result();
        $this->load->view('temp_admin/header',$data);
        $this->load->view('temp_admin/sidebar');
        $this->load->view('admin/dataPegawai',$data);
        $this->load->view('temp_admin/footer');
    }
    public function tambahData(){
        $data['title'] = "Tambah Pegawai";
        $data['jabatan'] = $this->penggajianModel->get_data('tb_jabatan')->result();
        $this->load->view('temp_admin/header',$data);
        $this->load->view('temp_admin/sidebar');
        $this->load->view('admin/tambahDataPegawai',$data);
        $this->load->view('temp_admin/footer');

    }

    public function tambahDataAksi(){
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->tambahData();
        }else{
            $nik = $this->input->post('nik');
            $nama_pegawai = $this->input->post('nama_pegawai');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $jabatan = $this->input->post('jabatan');
            $tanggal_masuk = $this->input->post('tanggal_masuk');
            $status = $this->input->post('status');
            $hak_akses = $this->input->post('hak_akses');
            $foto = $_FILES['foto']['name'];
            if($foto=''){

            }else{
                $config['upload_path'] = './assets/photo';
                $config['allowed_types'] = 'jpg|jpeg|png|tiff';
                $config['file_name'] = 'foto' . time();
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('foto')){
                    echo "Foto Gagal Diupload";
                }else{
                    $foto = $this->upload->data('file_name');
                }
            }
            
            $data = array(
                'nik' => $nik,
                'nama_pegawai' => $nama_pegawai,
                'jenis_kelamin' => $jenis_kelamin,
                'jabatan' => $jabatan,
                'tanggal_masuk' => $tanggal_masuk,
                'status' => $status,
                'hak_akses' => $hak_akses,
                'foto' => $foto,

            );
            $this->penggajianModel->insert_data($data,'tb_pegawai');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil ditambahkan</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

          redirect('admin/dataPegawai');

        }

    }

    public function updateData($id){
        $where = array('id_pegawai' => $id);
        $data['title'] = 'Update Data Pegawai';
        $data['jabatan'] = $this->penggajianModel->get_data('tb_jabatan')->result();
        $data['pegawai'] = $this->db->query("SELECT * FROM tb_pegawai WHERE id_pegawai = '$id'")->result();
        $this->load->view('temp_admin/header',$data);
        $this->load->view('temp_admin/sidebar');
        $this->load->view('admin/updateDataPegawai',$data);
        $this->load->view('temp_admin/footer');

        
    }


    public function updateDataAksi(){
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->updateData();
        }else{
            $id = $this->input->post('id_pegawai');
            $nik = $this->input->post('nik');
            $nama_pegawai = $this->input->post('nama_pegawai');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $jabatan = $this->input->post('jabatan');
            $tanggal_masuk = $this->input->post('tanggal_masuk');
            $status = $this->input->post('status');
            $hak_akses = $this->input->post('hak_akses');
            $foto = $_FILES['userfile']['name'];

            if($foto){
                $config['upload_path'] = './assets/photo';
                $config['allowed_types'] = 'jpg|jpeg|png|tiff';
                $config['file_name'] = 'foto' . time();
                
                $this->load->library('upload',$config);

                if($this->upload->do_upload('userfile')){
                   $userfile = $this->upload->data('file_name');
                   $this->db->set('foto',$userfile);
                }else{
                    echo 'gagal di rubah';
                }
            }
            
            $data = array(
                'nik' => $nik,
                'nama_pegawai' => $nama_pegawai,
                'jenis_kelamin' => $jenis_kelamin,
                'jabatan' => $jabatan,
                'tanggal_masuk' => $tanggal_masuk,
                'status' => $status,
                'hak_akses' => $hak_akses,
                
                

            );

            $where = array('id_pegawai' => $id);

            $this->penggajianModel->update_data('tb_pegawai',$data,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil diupdate</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

          redirect('admin/dataPegawai');

        }

    }

    public function _rules(){
        $this->form_validation->set_rules('nik','nik','required');
        $this->form_validation->set_rules('nama_pegawai','nama pegawai','required');
        $this->form_validation->set_rules('jenis_kelamin','Jenis kelamin','required');
        $this->form_validation->set_rules('jabatan','jabatan','required');
        $this->form_validation->set_rules('tanggal_masuk','tanggal masuk','required');
        $this->form_validation->set_rules('status','status','required');
        $this->form_validation->set_rules('hak_akses','hak_akses','required');
       

    }
    public function deleteData($id){
        $where = array('id_pegawai'=>$id);
        $this->penggajianModel->delete_data($where,'tb_pegawai');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil dihapus</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

        redirect('admin/dataPegawai');



    }


    public function Import(){
        $data['title'] = "Tambah Pegawai";
        $data['jabatan'] = $this->penggajianModel->get_data('tb_jabatan')->result();
        $this->load->view('temp_admin/header',$data);
        $this->load->view('temp_admin/sidebar');
        $this->load->view('admin/importPegawai',$data);
        $this->load->view('temp_admin/footer');

    }



   

}





?>