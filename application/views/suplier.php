<div id="hilang">
	<?= $this->session->flashdata('alert')?>
</div>
<div class="col-lg-12 ">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
		add suplier 
	</button>
</div>
<!-- Modal -->
<div class="modal fade bd-example-modal-md" id="exampleModal" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content ">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Suplier</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="forms-sample" action="<?=site_url('suplier/save')?>" method="post">
					<div class="form-group">
						<label for="exampleInputName1">Suplier Code</label>
						<input type="text" class="form-control" placeholder="Code" name="code" required>
					</div>
					<div class="form-group">
						<label for="exampleInputName1">Name</label>
						<input type="text" class="form-control" placeholder="Name" name="nama" required>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword4">Telp</label>
						<input type="text" class="form-control" placeholder="Telp" name="telp" required>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>
<div class="col-lg-12 grid-margin stretch-card mt-3">
	<div class="card">
		<!-- Button trigger modal -->

		<div class="card-body">
			<h4 class="card-title">suplier list</h4>

			<div class="table-responsive">
				<table class="table table-striped" id="tabelku">
					<thead>
						<tr>
							<th>no</th>
							<th>code</th>
							<th>name</th>
							<th>telp</th>
							<th>action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($suplier as $ok) {?>

						<tr>
							<td><?= $no ?></td>
							<td><?= $ok['code'] ?></td>
							<td><?= $ok['nama'] ?></td>
							<td><?= $ok['telp'] ?> </td>
							<td>
								<a onClick="return confirm ('Are you sure?')"
									href="<?= base_url('suplier/delete/'.$ok['suplier_id'])?>">
									<button type="button" class="btn btn-inverse-dark btn-icon">
										<i class="ti-trash btn-md-3"></i>
									</button>
								</a>
								<button type="button" class="btn btn-inverse-primary btn-icon" data-toggle="modal"
									data-target="#edit<?= $ok['suplier_id'] ?>"><i class="ti-pencil-alt"></i>
								</button>
								<div class="modal fade bd-example-modal-md" id="edit<?= $ok['suplier_id'] ?>" tabindex="-1"
									role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-md" role="document">
										<div class="modal-content ">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Edit user</h5>
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form class="forms-sample" action="<?=site_url('suplier/edit')?>"
													method="post">
													<input type="hidden" name="suplier_id" value="<?=$ok['suplier_id']?>">
													<div class="form-group">
														<label for="exampleInputName1">Name</label>
														<input type="text" class="form-control" placeholder="Name" value="<?=$ok ['nama']?>"
															name="nama" required>
													</div>
													<div class="form-group">
														<label for="exampleInputName1">Telp</label>
														<input type="text" class="form-control" placeholder="telp" value="<?=$ok ['telp']?>"
															name="telp">
													</div>
													<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													<button type="submit" class="btn btn-primary">Save</button>
													</div>
												</form>
											</div>

										</div>
									</div>
								</div>
							</td>
						</tr>
						<?php $no++; }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
