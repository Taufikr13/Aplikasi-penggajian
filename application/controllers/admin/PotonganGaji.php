<?php
class PotonganGaji extends CI_Controller{
    public function index(){
        $data['title'] = 'Setting Potongan Gaji';
        $data['pot_gaji'] = $this->penggajianModel->get_data('potongan_gaji')->result();
        $this->load->view('temp_admin/header',$data);
        $this->load->view('temp_admin/sidebar');
        $this->load->view('admin/potonganGaji',$data);
        $this->load->view('temp_admin/footer');

    }

    public function tambahData(){
        $data['title'] = 'Tambah Potongan Gaji';
        $this->load->view('temp_admin/header',$data);
        $this->load->view('temp_admin/sidebar');
        $this->load->view('admin/tambahPotongan',$data);
        $this->load->view('temp_admin/footer');

    }


    public function tambahDataAksi(){
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->tambahData();
        }else{
            $potongan = $this->input->post('potongan');
            $jml_potongan = $this->input->post('jml_potongan');

            $data = array(
                'potongan' => $potongan,
                'jml_potongan' => $jml_potongan
            );
            $this->penggajianModel->insert_data($data,'potongan_gaji');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil ditambahkan</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          redirect('admin/potonganGaji');
        }
    }


    public function updateData($id){
        $where = array ('id_potongan' => $id);
        $data['potongan'] = $this->db->query("SELECT * FROM potongan_gaji WHERE id_potongan = '$id'")->result();
        $data['title'] = 'Update Data Potongan Gaji';
        $this->load->view('temp_admin/header',$data);
        $this->load->view('temp_admin/sidebar');
        $this->load->view('admin/updatePotongan',$data);
        $this->load->view('temp_admin/footer');

    }


    public function updateDataAksi(){
        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->updateData();
        }else{
            $id = $this->input->post('id_potongan');
            $potongan = $this->input->post('potongan');
            $jml_potongan = $this->input->post('jml_potongan');


            $data = array(
                'potongan' => $potongan,
                'jml_potongan' => $jml_potongan
            );

            $where = array('id_potongan' => $id);

            $this->penggajianModel->update_data('potongan_gaji',$data,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil diupdate</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

          redirect('admin/potonganGaji');
        }
    }



    public function _rules(){
        $this->form_validation->set_rules('potongan', 'Jenis Porongan','required');
        $this->form_validation->set_rules('jml_potongan', 'Jumlah Potongan','required');
    }


    public function deleteData($id){
            $where = array('id_potongan'=>$id);
            $this->penggajianModel->delete_data($where,'potongan_gaji');
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data Berhasil dihapus</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
    
            redirect('admin/potonganGaji');
    }
}

?>