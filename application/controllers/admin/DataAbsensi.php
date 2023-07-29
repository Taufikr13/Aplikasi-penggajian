<?php

class DataAbsensi extends CI_Controller{
    public function index(){
        $data['title'] = "Data Absensi Pegawai";
   
        if((isset($_GET['bulan']) && $_GET['bulan']!='')&& (isset($_GET['tahun'])&& $_GET['tahun']!='')){
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun =$bulan.$tahun;
    
        }else{
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun =$bulan.$tahun;
        }
       
        $data['absensi'] = $this->db->query("SELECT tb_kehadiran.*, tb_pegawai.nama_pegawai, tb_pegawai.jenis_kelamin, tb_pegawai.jabatan
        FROM tb_kehadiran INNER JOIN tb_pegawai ON tb_kehadiran.nik=tb_pegawai.nik INNER JOIN tb_jabatan ON tb_pegawai.jabatan = tb_jabatan.nama_jabatan WHERE tb_kehadiran.bulan= '$bulantahun'
        ORDER BY tb_pegawai.nama_pegawai ASC")->result();
         
        $this->load->view('temp_admin/header',$data);
        $this->load->view('temp_admin/sidebar');
        $this->load->view('admin/dataAbsensi',$data);
        $this->load->view('temp_admin/footer');

    }


    public function inputAbsensi(){
        if($this->input->post('submit', TRUE == 'submit')){
            $post = $this->input->post();
            foreach($post['bulan'] as $key => $value){
                if($post['bulan'][$key]!=''||$post['nik'][$key]!=''){
                    $simpan[] = array(
                        'bulan' => $post['bulan'][$key],
                        'nik' => $post['nik'][$key],
                        'nama_pegawai' => $post['nama_pegawai'][$key],
                        'jenis_kelamin' => $post['jenis_kelamin'][$key],
                        'nama_jabatan' => $post['nama_jabatan'][$key],
                        'jumlah_hadir' => $post['jumlah_hadir'][$key],
                        'sakit' => $post['sakit'][$key],
                        'alpha' => $post['alpha'][$key],
                    );
                }
            }
            $this->penggajianModel->insert_batch('tb_kehadiran',$simpan);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil ditambahkan</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

          redirect('admin/dataAbsensi');
        }


        $data['title'] = "Form Input Absensi";
        if((isset($_GET['bulan']) && $_GET['bulan']!='')&& (isset($_GET['tahun'])&& $_GET['tahun']!='')){
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun =$bulan.$tahun;
    
        }else{
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun =$bulan.$tahun;
        }
        $data['inputabsensi'] = $this->db->query("SELECT tb_pegawai.*, tb_jabatan.nama_jabatan FROM tb_pegawai INNER JOIN tb_jabatan ON
        tb_pegawai.jabatan = tb_jabatan.nama_jabatan WHERE NOT EXISTS (SELECT * FROM tb_kehadiran WHERE bulan = '$bulantahun'
        AND tb_pegawai.nik=tb_kehadiran.nik) ORDER BY tb_pegawai.nama_pegawai ASC")->result();
        $this->load->view('temp_admin/header',$data);
        $this->load->view('temp_admin/sidebar');
        $this->load->view('admin/inputAbsensi',$data);
        $this->load->view('temp_admin/footer');

    }


}


?>