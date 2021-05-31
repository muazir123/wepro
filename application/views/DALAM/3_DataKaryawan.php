<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					Data Karyawan
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Kd Karyawan</th>
									<th>Nama</th>
									<th>Nomor Hp</th>
									<th>Jenis Kelamin</th>
									<th>Alamat</th>
									<th>Opsi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data as $dt):?>
                                    <tr>
                                        <td><?=$kd_karyawan = $dt->kd_calon_karyawan?></td>
                                        <td><?=$dt->nama?></td>
                                        <td><?=$dt->nomor_hp?></td>
                                        <td><?=$dt->jenis_kelamin?></td>
                                        <td><?=$dt->alamat?></td>
                                        <td>
										<div class="btn-group" role="group"
											aria-label="Button group with nested dropdown">
											<div class="btn-group" role="group">
												<button id="btnGroupDrop1" type="button"
													class="btn btn-primarys dropdown-toggle" data-toggle="dropdown"
													aria-haspopup="true" aria-expanded="false">
													opsi
												</button>
												<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
													<button class="dropdown-item"
														onclick="update('<?=$kd_karyawan?>', '<?=base_url('Admin/updateDataKarwayan')?>')">Update</button>
													<button class="dropdown-item text-danger"
														onclick="hapus( '<?=base_url('Admin/hapusData')?>','kd_calon_karyawan','<?=$kd_karyawan?>','tb_calon_karyawan','dataKaryawan')">Hapus</button>
												</div>
											</div>
										</div>
										</td>
                                    </tr>
								<?php endforeach;?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
