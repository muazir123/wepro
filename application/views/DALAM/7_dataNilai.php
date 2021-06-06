<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-primary text-white">
					Data Nilai
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Kd Cln Karyawan</th>
									<th>Nama</th>
									<th>JK</th>
									<th>Nomor Hp</th>
									<?php foreach ($kriteria as $dt) :?> <th><?=$dt->kriteria?></th>
									<?php endforeach; ?>
									<th>Opsi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($dataKaryawan as $dk):?>
								<tr>
									<td><?=$kd_karyawan = $dk->kd_calon_karyawan?></td>
									<td><?=$dk->nama?></td>
									<td><?=$dk->jenis_kelamin?></td>
									<td><?=$dk->nomor_hp?></td>
									<?php foreach ($datanilai as $nl) :?>
                                        <?php if($nl->kd_karyawan == $dk->kd_calon_karyawan): ?>
                                        <td><?=$nl->nilai?></td>
									<?php endif; ?>
									<?php endforeach; ?>
									<td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-primary" onclick="update('<?=$kd_karyawan?>', '<?=base_url('Admin/updateDataNilai')?>')">Edit</button>
                                            <button type="button" class="btn btn-danger" onclick="hapus( '<?=base_url('Admin/hapusData')?>','kd_karyawan','<?=$kd_karyawan?>','tb_nilai','dataNilai')">Hapus</button>
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
