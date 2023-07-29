<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex alig-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <?php echo $title?>

    </h1>

    </div>
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            Input Absensi Pegawai
        </div>
        <div class="card-body">
        <form class="form-inline">
            <div class="form-group mb-2 ">
               <label for="">Bulan : </label>
               <select name="bulan" id="" class="form-control ml-2">
                    <option value=""> -- Pilih Bulan -- </option>
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
            </div>
            <div class="form-group mb-2 ml-5">
               <label for="">Tahun : </label>
               <select name="tahun" id="" class="form-control ml-2">
                    <option value=""> -- Pilih Tahun -- </option>

                    <?php 
                    $tahun = date('Y');
                    for($i=2020;$i<$tahun+5;$i++){?>
                    <option value="<?php echo $i;?>"><?php echo $i;?></option>

                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i>  Generate</button>
        </form>
        </div>
    </div>
    <?php
    if((isset($_GET['bulan']) && $_GET['bulan']!='')&& (isset($_GET['tahun'])&& $_GET['tahun']!='')){
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];
        $bulantahun =$bulan.$tahun;

    }else{
        $bulan = date('m');
        $tahun = date('Y');
        $bulantahun =$bulan.$tahun;
    }
    ?>
    <div class="alert alert-info">Menampilkan data Kehadiran Pegawai Bulan: <span class="font-weight-bold"><?php echo $bulan?></span>, Tahun: <span class="font-weight-bold"><?php echo $tahun?></div>
    <form action="" method="post">
    <button class="btn btn-success mb-3" type="submit" name="submit" value="submit">Simpan</button>
    <table class="table table-striped table-bordered">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">NIK</th>
            <th class="text-center">Nama Pegawai</th>
            <th class="text-center">Jenis Kelamin</th>
            <th class="text-center">Jabatan</th>
            <th class="text-center" width="8%">Hdir</th>
            <th class="text-center" width="8%">Sakit</th>
            <th class="text-center" width="8%">Alpha</th>
            
        </tr>

        <?php 
        $i++;
        foreach($inputabsensi as $absen ):?>

        <tr>
            <input type="hidden" name="bulan[]" class="form-control" value="<?php echo $bulantahun?>">
            <input type="hidden" name="nik[]" class="form-control" value="<?php echo $absen->nik;?>">
            <input type="hidden" name="nama_pegawai[]" class="form-control" value="<?php echo $absen->nama_pegawai;?>">
            <input type="hidden" name="jenis_kelamin[]" class="form-control" value="<?php echo $absen->jenis_kelamin;?>">
            <input type="hidden" name="nama_jabatan[]" class="form-control" value="<?php echo $absen->nama_jabatan;?>">
            
            <td><?php echo $i++;?></td>
            <td><?= $absen->nik;?></td>
            <td><?= $absen->nama_pegawai;?></td>
            <td><?= $absen->nama_jabatan;?></td>
            <td><?= $absen->jenis_kelamin;?></td>
            <td><input type="number" name="jumlah_hadir[]" class="form-control" value="0"></td>
            <td><input type="number" name="sakit[]" class="form-control" value="0"></td>
            <td><input type="number" name="alpha[]" class="form-control" value="0"></td>
        </tr>
        <?php endforeach;?>
        
    </table> 
    </form>
</div>

</div>

