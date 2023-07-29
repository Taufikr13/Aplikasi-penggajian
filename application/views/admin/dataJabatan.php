<div class="container-fluid">
    <div class="d-sm-flex alig-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <?php echo $title; ?>

    </h1>

    </div>
    <a class="btn btn-sm btn-success mb-3" href="<?php echo base_url('admin/dataJabatan/tambahData/'); ?>">
                        <i class="fas fa-plus"> Tambah Data</i></a>
    <?php echo $this->session->flashdata('pesan');?>
    <table class="table table-bordered table-striped mt-2" id="dataTable">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Jabatan</th>
                <th class="text-center">Gaji Poko</th>
                <th class="text-center">Trasfort</th>
                <th class="text-center">Uang Makan</th>
                <th class="text-center">Total</th>
                <th class="text-center">Action</th>

            </tr>
        </thead>
        <tbody>
        <?php
        $i =1;
        foreach($jabatan as $jab):
        ?>
        <tr>
            <td><?php echo $i++;?></td>
            <td><?php echo $jab->nama_jabatan;?></td>
            <td>Rp. <?php echo number_format($jab->gaji_poko,0,',','.')?></td>
            <td>Rp. <?php echo number_format($jab->transport,0,',','.')?></td>
            <td>Rp. <?php echo number_format($jab->uang_makan,0,',','.')?></td>
            <td>Rp. <?php echo number_format($jab->gaji_poko+$jab->transport+$jab->uang_makan,0,',','.')?></td>
            <td>
                <center>
                    <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/dataJabatan/updateData/'.$jab->id_jabatan); ?>">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a onclick="return confirm('Yakin Menghapus')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/dataJabatan/deleteData/'.$jab->id_jabatan); ?>">
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

