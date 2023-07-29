<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex alig-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <?php echo $title?>

    </h1>

    </div>
    <?php echo $this->session->flashdata('pesan');?>
    <a class="mb-2 mt-2 btn btn-sm btn-success" href="<?php echo base_url('admin/dataPegawai/tambahData')?>"> <i class="fas fa-plus"> Tambah Data</i></a>
    <a class="mb-2 mt-2 btn btn-sm btn-primary" href="<?php echo base_url('admin/dataPegawai/import')?>"> <i class="fas fa-upload"> Import</i></a>
    <table class="table table-striped table-bordered" id="dataTable">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">NIK</th>
            <th class="text-center">Nama Pegawai</th>
            <th class="text-center">Jenis Kelamin</th>
            <th class="text-center">Jabatan</th>
            <th class="text-center">Tanggal Masuk</th>
            <th class="text-center">Status</th>
            <th class="text-center">Foto</th>
            <th class="text-center">Hak Akses</th>
            <th class="text-center">Action</th>
        </tr>

    </thead>
    <tbody>
    <?php
        $i = 1;
        foreach($pegawai as $peg):
        ?>

        <tr>
            <td><?php echo $i++?></td>
            <td><?php echo $peg->nik?></td>
            <td><?php echo $peg->nama_pegawai?></td>
            <td><?php echo $peg->jenis_kelamin?></td>
            <td><?php echo $peg->jabatan?></td>
            <td><?php echo $peg->tanggal_masuk?></td>
            <td><?php echo $peg->status?></td>
            <td><img src="<?php echo base_url().'assets/photo/'. $peg->foto ?>" alt="" width="50px"></td>
          
                <?php if($peg->hak_akses=='1'){?>
                    <td>Admin</td>
                <?php }else{?>
                    <td>Pegawai</td>
                <?php }?>
            
            <td>
                <center>
                    <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/dataPegawai/updateData/'.$peg->id_pegawai); ?>">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a onclick="return confirm('Yakin Menghapus')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/dataPegawai/deleteData/'.$peg->id_pegawai); ?>">
                        <i class="fas fa-trash"></i>
                    </a>
                </center>
            </td>
        </tr>

    <?php endforeach?>
    </tbody>    

        



    </table>
</div>
</div>

