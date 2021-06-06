
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Form Data dataNilai
                </div>
                <div class="card-body">
                    <form action="<?=base_url('Admin/prosesCreateNilai')?>" method="POST">
                    
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Calon Karyawan</label>
                        <select class="form-control" id="exampleFormControlSelect1" required autocomplete="off" name="kd_calon_karyawan">
							<option disabled selected>Pilih salah satu</option>
                            <?php foreach($dataKaryawan as $dt):?>
                                <option value = "<?=$dt->kd_calon_karyawan?>"><?=$dt->kd_calon_karyawan?> - <?=$dt->nama?></option>
                            <?php endforeach; ?>
						</select>
					</div>

                    <?php foreach($kriteria as $dt): ?>
                        <div class="form-group">
							<label for="<?=$dt->kd_kriteria?>"><?=$dt->kriteria?></label>
							<input type="number" class="form-control" id="<?=$dt->kd_kriteria?>" aria-describedby="<?=$dt->kd_kriteria?>"
								placeholder="Masukan Nilai <?=$dt->kriteria?>" required autocomplete="off" name="<?=$dt->kd_kriteria?>">
						</div>
                    <?php endforeach?>

                    <input type="reset" class="btn btn-danger"></input>
					<input type="submit" class="btn btn-primary" value="Simpan Data"></input>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
