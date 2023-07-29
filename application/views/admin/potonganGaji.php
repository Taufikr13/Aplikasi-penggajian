<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex alig-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <?php echo $title?>

    </h1>

    </div>

    <?php
     echo $this->session->flashdata('pesan');
    ?>

    <a href="<?php echo base_url('admin/potonganGaji/tambahData') ?>" class="btn btn-sm btn-success mb-3 mt-2"><i class="fas fa-plus"></i> Tambah Data</a>

    <table class="table table-striped table-bordered">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Jenis Potongan</th>
            <th class="text-center">Jumlah Potongan</th>
            <th class="text-center">Action</th>
        </tr>

        <?php
        $i =1;
        foreach($pot_gaji as $potong):
        ?>
        <tr>
            <td><?php echo $i++?></td>
            <td><?= $potong->potongan;?></td>
            <td>Rp.<?= number_format($potong->jml_potongan,0,',','.')?></td>
            <td>
                <center>
                        <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/potonganGaji/updateData/'.$potong->id_potongan); ?>">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a onclick="return confirm('Yakin Menghapus')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/potonganGaji/deleteData/'.$potong->id_potongan); ?>">
                            <i class="fas fa-trash"></i>
                        </a>
                </center>
            </td>

        </tr>

        <?php endforeach;?>

    </table>
</div>
</div>

