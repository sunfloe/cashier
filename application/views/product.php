<div id="hilang">
	<?= $this->session->flashdata('alert')?>
</div>
<div class="col-lg-12 ">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
		add product
	</button>
</div>
<div class="modal fade bd-example-modal-md" id="exampleModal" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content ">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="forms-sample" action="<?=site_url('product/save')?>" method="post">
					<div class="form-group">
						<label for="exampleInputName1">code</label>
						<input type="text" class="form-control" placeholder="code product" name="code_product" required>
					</div>
					<div class="form-group">
						<label for="exampleInputName1">Name</label>
						<input type="text" class="form-control" placeholder="Name" name="name" required>
					</div>
					<!-- <div class="form-group">
						<label for="exampleSelectGender">Category</label>
						<select class="form-control" name="category_id">
						<?php foreach ($categories as $ok) {?>
							<option value="<?= $ok['category_id'] ?>"><?= $ok['name_category'] ?></option>
						<?php }; ?>	
						</select>

					</div> -->
					<div class="form-group">
						<label for="exampleInputPassword4">price</label>
						<input type="number" class="form-control" placeholder="price" name="price" required>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword4">stok</label>
						<input type="number" class="form-control" placeholder="stok barang" name="stok" required>
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
			<h4 class="card-title">product list</h4>
			<div class="table-responsive">
				<table class="table table-striped" id="tabelku">
					<thead>
						<tr>
							<th>no</th>
							<th>code product</th>
							<th>name</th>
							<!-- <th>category</th> -->
							<th>price</th>
							<th>stok</th>
							<th>action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($product as $p) {?>

						<tr>
							<td><?= $no ?></td>
							<td><?= $p['code_product'] ?></td>
							<td><?= $p['name'] ?></td>
							<!-- <td><?// $categories['name_category'] ?></td> -->
							<td>Rp. <?= number_format($p['price']) ?> </td>
							<td><?= $p['stok'] ?> </td>

							<td>
								<a onClick="return confirm ('Are you sure?')"
									href="<?= base_url('product/delete/'.$p['product_id'])?>">
									<button type="button" class="btn btn-inverse-dark btn-icon">
										<i class="ti-trash btn-md-3"></i>
									</button>
								</a>
								<button type="button" class="btn btn-inverse-primary btn-icon" data-toggle="modal"
									data-target="#edit<?= $p['product_id'] ?>"><i class="ti-pencil-alt"></i>
								</button>
								<div class="modal fade bd-example-modal-md" id="edit<?= $p['product_id'] ?>"
									tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-md" role="document">
										<div class="modal-content ">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form class="forms-sample" action="<?=site_url('product/edit')?>"
													method="post">
													<input type="hidden" name="product_id"
														value="<?=$p['product_id']?>">
													<div class="form-group">
														<label for="exampleInputName1">Code Product</label>
														<input type="text" class="form-control" placeholder="Name"
															value="<?=$p['code_product']?>" name="code_product"
															required>
													</div>
													<div class="form-group">
														<label for="exampleInputName1">Name</label>
														<input type="text" class="form-control" placeholder="Name"
															value="<?=$p['name']?>" name="name" required>
													</div>
													<div class="form-group">
														<label for="exampleInputName1">price</label>
														<input type="number" class="form-control"
															value="<?=$p['price']?>" name="price" required>
													</div>
													<div class="form-group">
														<label for="exampleInputName1">stok</label>
														<input type="number" class="form-control"
															value="<?=$p['stok']?>" name="stok" required>
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
						<?php $no++; }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
