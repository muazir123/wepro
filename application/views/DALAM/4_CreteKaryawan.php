<?php
$dataKaryawan = isset($dataKaryawan) ? $dataKaryawan : NULL;
?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<div class="row d-flex justify-content-center">
		<div class="col-8">
			<div class="card">
				<div class="card-header">
					Form Data Karwayan
				</div>
				<div class="card-body">
					<form action="<?=$dataKaryawan == null ? base_url('Admin/prosesCreateKaryawan') : base_url('Admin/prosesUpdateKaryawan')?>" method="POST">
                        <?php if($dataKaryawan != null):?>
                            <input type="hidden" value="<?=$dataKaryawan != null ? $dataKaryawan->kd_calon_karyawan : ''?>" name="kd_karyawan">
                        <?php endif; ?>

                        <div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" class="form-control" id="nama" aria-describedby="nama"
								placeholder="Masukan Nama Karyawan" required autocomplete="off"
                                value ="<?=$dataKaryawan != null ? $dataKaryawan->nama : ''?>" name = "nama">
						</div>

                        <div class="form-group">
							<label for="nmrtelpn">Nomor Telpon</label>
							<input type="number" class="form-control" id="nmrtelpn" aria-describedby="nmrtelpn"
								placeholder="Masukan Nomor Hp Karyawan" required autocomplete="off"
                                value ="<?=$dataKaryawan != null ? $dataKaryawan->nomor_hp : ''?>" name="nmrtelpn">
						</div>

                        <div class="form-group">
							<label for="alamat">Alamat Karyawan</label>
							<input type="text" class="form-control" id="alamat" aria-describedby="alamat"
								placeholder="Masukan Alamat Pengguna" required autocomplete="off"
                                value ="<?=$dataKaryawan != null ? $dataKaryawan->alamat : ''?>" name="alamat">
						</div>

                        <div class="form-group">
							<label for="exampleFormControlSelect1">Jenis Kelamin</label>
							<select class="form-control" id="exampleFormControlSelect1" required autocomplete="off" name="jenisKelamin">
								<option disabled <?=$dataKaryawan == null ? 'selected': ''?>>Pilih salah satu</option>
								<option value = "Laki - Laki" <?=$dataKaryawan != null && $dataKaryawan->jenis_kelamin == 'Laki - Laki' ? 'selected' : ''?>>Laki - Laki</option>
								<option value = "Perempuan"  <?=$dataKaryawan != null && $dataKaryawan->jenis_kelamin == 'Perempuan' ? 'selected' : ''?>>Perempuan</option>
							</select>
						</div>

						<input type="reset" class="btn btn-danger"></input>
						<input type="submit" class="btn btn-primary" value="Simpan Data"></input>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->
