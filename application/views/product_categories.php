<div id="hilang">
	<?= $this->session->flashdata('alert') ?>
</div>
<div class="col-lg-12 ">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
		add category
	</button>
</div>
<!-- Modal -->
<div class="modal fade bd-example-modal-md" id="exampleModal" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content ">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add category</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<form class="forms-sample" action="<?= site_url('categories/save') ?>" method="post">
					<div class="form-group">
						<label for="exampleInputName1">Name</label>
						<input type="text" class="form-control" placeholder="Name" name="name_category" required>
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
			<h4 class="card-title">list of category</h4>

			<div class="table-responsive">

				<table class="table table-striped" id="tabelku">
					<thead>
						<tr>
							<th>no</th>
							<th>name</th>
							<th>action</th>
							<th></th>
						</tr>
					</thead>
					<tbody>


						<tr>
							<?php $no = 1;
							foreach ($categories as $ok) { ?>
							<td><?= $no ?></td>
							<td><?= $ok['name_category'] ?></td>
							<td>
								<a onClick="return confirm ('Are you sure?')"
									href="<?= base_url('categories/delete/' . $ok['category_id']) ?>">
									<button type="button" class="btn btn-inverse-dark btn-icon">
										<i class="ti-trash btn-md-3"></i>
									</button>
								</a>
								<button type="button" class="btn btn-inverse-primary btn-icon" data-toggle="modal"
									data-target="#edit<?= $ok['category_id'] ?>"><i class="ti-pencil-alt"></i>
								</button>
								<div class="modal fade bd-example-modal-md" id="edit<?= $ok['category_id'] ?>"
									tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-md" role="document">
										<div class="modal-content ">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Edit categories</h5>
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form class="forms-sample"
													action="<?= site_url('product_categories/edit') ?>" method="post">
													<input type="hidden" name="category_id"
														value="<?= $ok['category_id'] ?>">
													<input type="hidden" name="product_id"
														value="<?= $ok['product_id'] ?>">
													<div class="form-group">
														<label for="exampleInputName1">Name</label>
														<input type="text" class="form-control" placeholder="Name"
															value="<?= $ok['name_category'] ?>" name="name_category"
															required>
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
							<td>
								<!-- <a href="<//?= base_url('categories/list/' . $ok['category_id'])?>">
									<button type="button" class="btn btn-inverse-warning btn-icon">
										<i class="ti-eye btn-md-3"></i>
									</button>
								</a> -->
							</td>
						</tr>
						<?php $no++;} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
