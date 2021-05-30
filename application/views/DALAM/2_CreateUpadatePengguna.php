<?php
$datapengguna = isset($datapengguna) ? $datapengguna : NULL;
$username = isset($username) ? $username : NULL;
?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<div class="row d-flex justify-content-center">
		<div class="col-8">
			<div class="card">
				<div class="card-header">
					Form Data Pengguna
				</div>
				<div class="card-body">
					<form action="<?=$datapengguna == null ? base_url('Admin/createPengguna') : base_url('Admin/prosesUpdatePengguna')?>" method="POST">
                        <?php if($datapengguna != null):?>
                            <input type="hidden" value="<?=$datapengguna != null ? $datapengguna->kd_pengguna : ''?>" name="kd_pengguna">
                        <?php endif; ?>

                        <div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" class="form-control" id="nama" aria-describedby="nama"
								placeholder="Masukan Nama Pengguna" required autocomplete="off"
                                value ="<?=$datapengguna != null ? $datapengguna->nama : ''?>" name = "nama">
						</div>

						<div class="form-group">
							<label for="nmrtelpn">Nomor Telpon</label>
							<input type="number" class="form-control" id="nmrtelpn" aria-describedby="nmrtelpn"
								placeholder="Masukan Nomor Pengguna" required autocomplete="off"
                                value ="<?=$datapengguna != null ? $datapengguna->nomor_hp : ''?>" name="nmrtelpn">
						</div>

						<div class="form-group">
							<label for="alamat">Alamat Pengguna</label>
							<input type="text" class="form-control" id="alamat" aria-describedby="alamat"
								placeholder="Masukan Alamat Pengguna" required autocomplete="off"
                                value ="<?=$datapengguna != null ? $datapengguna->alamat : ''?>" name="alamat">
						</div>

						<div class="form-group">
							<label for="username">Username Pengguna</label>
							<input type="text" class="form-control" id="username" aria-describedby="username"
								placeholder="Masukan Username Pengguna" required autocomplete="off"
                                value ="<?=$datapengguna != null ? $datapengguna->username : $username?>" readonly name="username">
						</div>

                        <?php if($datapengguna == null):?>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" aria-describedby="password"
								placeholder="Masukan Password Pengguna" required autocomplete="off" name="password" value="WEPRO123">
							<small id="emailHelp" class="form-text text-muted ">Password Default : <div
									class="text-danger">WEPRO123</div></small>
						</div>
                        <?php endif;?>

						<div class="form-group">
							<label for="exampleFormControlSelect1">Level Akses</label>
							<select class="form-control" id="exampleFormControlSelect1" required autocomplete="off" name="levelAkses">
								<option disabled <?=$datapengguna == null ? 'selected': ''?>>Pilih salah satu</option>
								<option value = "admin" <?=$datapengguna != null && $datapengguna->level_akses == 'admin' ? 'selected' : ''?>>admin</option>
								<option value = "user"  <?=$datapengguna != null && $datapengguna->level_akses == 'user' ? 'selected' : ''?>>user</option>
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
