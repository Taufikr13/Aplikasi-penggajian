<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex alig-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <?php echo $title?>

    </h1>

    </div>
    <div class="card" style="width:60%;">
        <div class="card-body">
            <form action="<?php echo base_url('admin/potonganGaji/tambahDataAksi') ?>" method="post">

                <div class="form-group">
                    <label for="">Jenis Potongan</label>
                    <input type="text" name="potongan" class="form-control">
                    <?php echo form_error('potongan')?>
                </div>
                 
                <div class="form-group">
                    <label for="">Jumlah Potongan</label>
                    <input type="text" name="jml_potongan" class="form-control">
                    <?php echo form_error('jml_potongan')?>
                </div>
                <button class="btn btn-primary" type="submit">Simpan</button>
            </form>
        </div>
    </div>

</div>
</div>

