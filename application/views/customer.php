<div id="hilang">
	<?= $this->session->flashdata('alert')?>
</div>
<div class="col-lg-12 ">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
		add customer
	</button>
</div>
<div class="modal fade bd-example-modal-md" id="exampleModal" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content ">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="forms-sample" action="<?=site_url('customer/save')?>" method="post">
					<div class="form-group">
						<label for="exampleInputName1">Name</label>
						<input type="text" class="form-control" placeholder="Name" name="name" required>
					</div>
					<div class="form-group">
						<label for="exampleInputName1">alamat</label>
						<input type="text" class="form-control" placeholder="alamat" name="alamat" required>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword4">telepon</label>
						<input type="text" class="form-control" placeholder="telepon" name="telp" required>
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
			<h4 class="card-title">customer list</h4>

			<div class="table-responsive">
				<table class="table table-striped" id="tabelku">
					<thead>
						<tr>
							<th>no</th>
							<th>name</th>
							<th>alamat</th>
							<th>telepon</th>
							<th>action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($customer as $ya) {?>

						<tr>
							<td><?= $no ?></td>
							<td><?= $ya['name'] ?></td>
							<td><?= $ya['alamat'] ?></td>
							<td><?= $ya['telp'] ?> </td>
							<td>
								<a onClick="return confirm ('Are you sure?')"
									href="<?= base_url('customer/delete/'.$ya['customer_id'])?>">
									<button type="button" class="btn btn-inverse-dark btn-icon">
										<i class="ti-trash btn-md-3"></i>
									</button>
								</a>
								<button type="button" class="btn btn-inverse-primary btn-icon" data-toggle="modal"
									data-target="#edit<?= $ya['customer_id'] ?>"><i class="ti-pencil-alt"></i>
								</button>
								<div class="modal fade bd-example-modal-md" id="edit<?= $ya['customer_id'] ?>"
									tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-md" role="document">
										<div class="modal-content ">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Edit Customer</h5>
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form class="forms-sample" action="<?=site_url('customer/edit')?>"
													method="post">
													<input type="hidden" name="customer_id"
														value="<?=$ya['customer_id']?>">
													<div class="form-group">
														<label for="exampleInputName1">Name</label>
														<input type="text" class="form-control" placeholder="Name"
															value="<?=$ya['name']?>" name="name">
													</div>
													<div class="form-group">
														<label for="exampleInputName1">Alamat</label>
														<input type="text" class="form-control" placeholder="alamat"
															value="<?=$ya['alamat']?>" name="alamat">
													</div>
													<div class="form-group">
														<label for="exampleInputName1">Telepon</label>
														<input type="text" class="form-control" value="<?=$ya['telp']?>"
															name="telp">
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary"
															data-dismiss="modal">Close</button>
														<button type="submit" class="btn btn-primary">Save</button>
													</div>
												</form>
											</div>

										</div>
									</div>
								</div>
							</td>
						</tr>
						<?php  $no++;} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>