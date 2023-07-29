<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex alig-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <?php echo $title?>

    </h1>

    </div>

    <div class="card" style="width: 60%;">
        <div class="card-body">
            <form action="<?php echo base_url('admin/dataJabatan/tambahDataAksi') ?>" method="post">
            <div class="form-group">
                <label for="">Nama Jabatan</label>
                <input type="text" name="nama_jabatan" class="form-control">
                <?php echo form_error('nama_jabatan','<div class="text-small text-danger"></div>');?>
            </div>
            <div class="form-group">
                <label for="">Gaji Pokok</label>
                <input type="text" name="gaji_poko" class="form-control">
                <?php echo form_error('gaji_poko','<div class="text-small text-danger"></div>');?>
            </div>
            <div class="form-group">
                <label for="">Trasfor</label>
                <input type="text" name="transport" class="form-control">
                <?php echo form_error('transport','<div class="text-small text-danger"></div>');?>
            </div>
            <div class="form-group">
                <label for="">Uang Makan</label>
                <input type="text" name="uang_makan" class="form-control">
                <?php echo form_error('uang_makan','<div class="text-small text-danger"></div>');?>
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
            <a href="<?php echo base_url('admin/dataJabatan') ?>" class="btn btn-danger">Kembali</a>

            </form>

        </div>
    </div>

</div>
</div>

