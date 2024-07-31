<div id="hilang">
	<?= $this->session->flashdata('alert')?>
</div>
<div class="col-lg-12 ">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
		add user 
	</button>
</div>
<!-- Modal -->
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
				<form class="forms-sample" action="<?=site_url('user/save')?>" method="post">
					<div class="form-group">
						<label for="exampleInputName1">Name</label>
						<input type="text" class="form-control" placeholder="Name" name="name" required>
					</div>
					<div class="form-group">
						<label for="exampleInputName1">Username</label>
						<input type="text" class="form-control" placeholder="Name" name="username" required>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword4">Password</label>
						<input type="password" class="form-control" placeholder="Password" name="password" required>
					</div>
					<div class="form-group">
						<label for="exampleSelectGender">Level</label>
						<select class="form-control" name="level">
							<option value="admin">admin</option>
							<option value="kasir">kasir </option>
						</select>
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
			<h4 class="card-title">user list</h4>
			<div class="table-responsive">
				<table class="table table-striped" id="tabelku">
					<thead>
						<tr>
							<th>no</th>
							<th>name</th>
							<th>username</th>
							<th>level</th>
							<th>action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($user as $ok) {?>
						<tr>
							<td><?= $no ?></td>
							<td><?= $ok['name'] ?></td>
							<td><?= $ok['username'] ?></td>
							<td><?= $ok['level'] ?> </td>
							<td>
								<a onClick="return confirm ('Are you sure?')"
									href="<?= base_url('user/delete/'.$ok['user_id'])?>">
									<button type="button" class="btn btn-inverse-dark btn-icon">
										<i class="ti-trash btn-md-3"></i>
									</button>
								</a>
								<button type="button" class="btn btn-inverse-primary btn-icon" data-toggle="modal"
									data-target="#edit<?= $ok['user_id'] ?>"><i class="ti-pencil-alt"></i>
								</button>
								<div class="modal fade bd-example-modal-md" id="edit<?= $ok['user_id'] ?>" tabindex="-1"
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
												<form class="forms-sample" action="<?=site_url('user/edit')?>"
													method="post">
													<input type="hidden" name="user_id" value="<?=$ok['user_id']?>">
													<div class="form-group">
														<label for="exampleInputName1">Name</label>
														<input type="text" class="form-control" placeholder="Name" value="<?=$ok ['name']?>"
															name="name" required>
													</div>
													<div class="form-group">
														<label for="exampleInputName1">Username</label>
														<input type="text" class="form-control" placeholder="<?=$ok ['username']?>"
															name="username" readonly>
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
								<a onClick="return confirm ('Are you sure you want to reset the password?')"
									href="<?= base_url('user/reset/'.$ok['user_id'])?>">
									<button type="button" class="btn btn-inverse-warning btn-icon">
										<i class="ti-loop"></i>
									</button>
								</a>
							</td>
						</tr>
						<?php $no++; }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
