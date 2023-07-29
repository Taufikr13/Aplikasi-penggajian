<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex alig-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <?php echo $title?>

    </h1>

    </div>
    <div class="card" style="width: 60%;">
        <div class="card-body">
            <form action="<?php echo base_url('admin/dataPegawai/tambahDataAksi')?>"  method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control"name="nik">
                    <?php echo form_error('nik','<div class="text-small text-danger"></div>');?>
                </div>
                <div class="form-group">
                    <label for="">Nama Pegawai</label>
                    <input type="text" class="form-control" name="nama_pegawai">
                    <?php echo form_error('nama_pegawai','<div class="text-small text-danger"></div>');?>
                </div>
                <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="" class="form-control">
                        <option value=""> -- Pilih Jenis Kelamin -- </option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                        
                    </select>
                    <?php echo form_error('jenis_kelamin','<div class="text-small text-danger"></div>');?>
                </div>
                <div class="form-group">
                    <label for="">Jabatan</label>
                    <select name="jabatan" id="" class="form-control">
                        <option value=""> -- Pilih Nama Jabatan -- </option>
                        <?php 
                        foreach($jabatan as $jab):
                        ?>
                        <option value="<?php echo $jab->nama_jabatan?>"><?php echo $jab->nama_jabatan?></option>

                        <?php endforeach?>
                    </select>
                    <?php echo form_error('jabatan','<div class="text-small text-danger"></div>');?>
                </div>
                <div class="form-group">
                    <label for="">Tanggal Masuk</label>
                    <input type="date" class="form-control"name="tanggal_masuk">
                    <?php echo form_error('tanggal_masuk','<div class="text-small text-danger"></div>');?>
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <select name="status" id="" class="form-control">
                        <option value=""> -- Pilih Status -- </option>
                        <option value="Pegawai Tetap">Pegawai Tetap</option>
                        <option value="Pegawai Tidak Tetap">Pegawai Tidak Tetap</option>
                    </select>
                    <?php echo form_error('status','<div class="text-small text-danger"></div>');?>
                </div>
             
                <div class="form-group">
                    <label for="">Foto</label>
                    <input type="file" class="form-control" name="foto">
                    <?php echo form_error('foto','<div class="text-small text-danger"></div>');?>
                </div>
                <div class="form-group">
                    <label for="">Hak Akses</label>
                    <select name="hak_akses" id="" class="form-control">
                        <option value=""> -- Pilih Hak -- </option>
                        <option value="1">Admin</option>
                        <option value="2">Pegawai</option>
                    </select>
                    <?php echo form_error('hak_akses','<div class="text-small text-danger"></div>');?>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>


            </form>
        </div>

    </div>

</div>
</div>

