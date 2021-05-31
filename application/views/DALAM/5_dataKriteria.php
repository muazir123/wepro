<?php
$dataKriteria = isset($dataKriteria) ? $dataKriteria : NULL;

?>

<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-primary text-white">
					Form Data Kriteria
				</div>
				<div class="card-body">
					<h5 class="card-title">Masukan Data Kriteria yang akan dijadikan variabel</h5>
					<form
						action="<?=$dataKriteria == null ? base_url('Admin/prosesCreateKriteria') : base_url('Admin/prosesUpdateKriteria')?>"
						method="POST">

						<?php if($dataKriteria != null):?>
						<input type="hidden" value="<?=$dataKriteria != null ? $dataKriteria->kd_kriteria : ''?>"
							name="kd_kriteria">
						<?php endif; ?>

						<div class="form-group">
							<label for="kriteria">Kriteria</label>
							<input type="text" class="form-control" id="kriteria" aria-describedby="kriteria"
								placeholder="Masukan Nama Kriteria" required autocomplete="off"
								value="<?=$dataKriteria != null ? $dataKriteria->kriteria : ''?>" name="kriteria">
						</div>

						<div class="form-group">
							<label for="jenis">Jenis Kriteria</label>
							<select class="form-control" id="jenis" required autocomplete="off" name="jenis">
								<option disabled <?=$dataKriteria == null ? 'selected': ''?>>Pilih salah satu</option>
								<option value="benefit"
									<?=$dataKriteria != null && $dataKriteria->jenis == 'benefit' ? 'selected' : ''?>>
									benefit</option>
								<option value="cost"
									<?=$dataKriteria != null && $dataKriteria->jenis == 'cost' ? 'selected' : ''?>>cost
								</option>
							</select>
						</div>

						<div class="form-group">
							<label for="bobot">Bobot Kriteria</label>
							<input type="number" min="1" max="5" class="form-control" id="bobot"
								aria-describedby="bobot" placeholder="Masukan Bobot Kriteria (1 s/d 5)" required
								autocomplete="off" value="<?=$dataKriteria != null ? $dataKriteria->bobot : ''?>"
								name="bobot">
						</div>

						<input type="reset" class="btn btn-danger"></input>
						<input type="submit" class="btn btn-primary" value="Simpan Data"></input>

				</div>
			</div>
		</div>
	</div>

	<div class="row mt-5">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-primary text-white">
					Data Kriteria
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>No</th>
									<th>Kode Kriteria</th>
									<th>Kriteria</th>
									<th>Jenis Kriteria</th>
									<th>Bobot</th>
									<th>Opsi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; foreach($data as $dt):?>
									<tr>
										<td><?=$no++?></td>
										<td><?=$kd_kriteria = $dt->kd_kriteria?></td>
										<td><?=$dt->kriteria?></td>
										<td><?=$dt->jenis?></td>
										<td><?=$dt->bobot?></td>
										<td>
										<div class="btn-group" role="group"
											aria-label="Button group with nested dropdown">
											<div class="btn-group" role="group">
												<button id="btnGroupDrop1" type="button"
													class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
													aria-haspopup="true" aria-expanded="false">
													opsi
												</button>
												<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
													<button class="dropdown-item"
														onclick="update('<?=$kd_kriteria?>', '<?=base_url('Admin/dataKriteria')?>')">Update</button>
													<button class="dropdown-item text-danger"
														onclick="hapus( '<?=base_url('Admin/hapusData')?>','kd_kriteria','<?=$kd_kriteria?>','tb_kriteria','dataKriteria')">Hapus</button>
												</div>
											</div>
										</div>
										</td>
									</tr>
								<?php endforeach?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
