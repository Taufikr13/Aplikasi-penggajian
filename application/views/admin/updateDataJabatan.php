<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex alig-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <?php echo $title?>

    </h1>

    </div>

    <div class="card" style="width: 60%;">
        <div class="card-body">
            <?php foreach ($jabatan as $jab):?>
            <form action="<?php echo base_url('admin/dataJabatan/updateDataAksi') ?>" method="post">
            <div class="form-group">
                <label for="">Nama Jabatan</label>
                <input type="hidden" name="id_jabatan" class="form-control" value="<?php echo $jab->id_jabatan?>">
                <input type="text" name="nama_jabatan" class="form-control" value="<?php echo $jab->nama_jabatan?>">
                <?php echo form_error('nama_jabatan','<div class="text-small text-danger"></div>');?>
            </div>
            <div class="form-group">
                <label for="">Gaji Pokok</label>
                <input type="text" name="gaji_poko" class="form-control" value="<?php echo $jab->gaji_poko?>">
                <?php echo form_error('gaji_poko','<div class="text-small text-danger"></div>');?>
            </div>
            <div class="form-group">
                <label for="">Trasfor</label>
                <input type="text" name="transport" class="form-control" value="<?php echo $jab->transport?>">
                <?php echo form_error('transport','<div class="text-small text-danger"></div>');?>
            </div>
            <div class="form-group">
                <label for="">Uang Makan</label>
                <input type="text" name="uang_makan" class="form-control" value="<?php echo $jab->uang_makan?>">
                <?php echo form_error('uang_makan','<div class="text-small text-danger"></div>');?>
            </div>

            <button type="submit" class="btn btn-success">Submit</button>

            <a href="<?php echo base_url('admin/dataJabatan') ?>" class="btn btn-danger">Kembali</a>

            </form>
            <?php endforeach?>

        </div>
    </div>

</div>
</div>

