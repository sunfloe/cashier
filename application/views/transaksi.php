<div id="hilang">
	<?= $this->session->flashdata('alert') ?>
</div>
<div class="row">
	<div class="col-lg-4 grid-margin stretch-card">
		<div class="card card-inverse-info">
			<div class="card-body">
				<h4 class="card-title mb-1">Product</h4>
				<p class="text-primary">
					choose the product you would like to sell!
				</p>
				<form action="<?= base_url('sale/temp'); ?>" method="post">
					<div class="form-group">
						<input type="hidden" name="customer_id" value="<?=$customer_id?>">
						<div class="form-group mb-3">
							<label for="exampleInputName1" class="">note</label>
							<input type="hidden" class="form-control form-tale" name="customer_id" value="<?= $customer_id ?>">
							<input type="text" class="form-control" name="code_penjualan" value="<?= $note ?>" readonly>
						</div>
						<div class="form-group">
							<label for="exampleInputName1">customers name</label>
							<input type="text" class="form-control" name="customers_name" value="<?= $customers_name ?>" readonly>
						</div>
					</div>

					<div class="form-group">
						<input type="hidden" name="code_penjualan" value="<?= $note ?>">
						<label>product name</label>
						<select class="form-control text-secondary mb-3" name="product_id">
							<?php foreach ($product as $we) { ?>
								<option value="<?= $we['product_id'] ?>">
									<?= $we['name'] ?>-<?= $we['code_product'] ?>(<?= $we['stok'] ?>)</option>
							<?php }; ?>
						</select>

						<div class="form-group">
							<label>amount</label>
							<input type="number" class="form-control" name="jumlah" required>
						</div>
						<button type="submit" class="btn btn-primary">add to cart</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-lg-8 grid-margin">
		<div class="card card-light-blue ">
			<!-- Button trigger modal -->
			<div class="card-body">
				<h4 class="card-title">product list</h4>

				<div class="table-responsive">
					<table class="table" id="tabelku">
						<thead>
							<tr>
								<th>no</th>
								<th>code</th>
								<th>name</th>
								<th>jumlah</th>
								<th>price</th>
								<th>total</th>
								<th>action</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							$total_harga = 0;
							$cek = 0;
							foreach ($tempory as $oo) { ?>

								<tr>
									<td><?= $no ?></td>
									<td><?= $oo['code_product'] ?></td>
									<td><?= $oo['name'] ?></td>
									<td>
										<?= $oo['jumlah'] ?>
										<?php if ($oo['jumlah']>$oo['stok']){
											echo "<span class='badge badge-pill badge-secondary'>Oops! the stock is not enough :(</span>" ;
											$cek = 1;
										}
										?>
									</td>
									<td>Rp.<?= number_format($oo['price']) ?></td>
									<td>Rp.<?= number_format($oo['jumlah']*$oo['price']);?> </td>
									<td>
										<a onClick="return confirm ('Are you sure?')" href="<?= base_url('sale/delete_temp/' . $oo['temp_id']) ?>">
											<button type="button" class="btn btn-inverse-warning btn-icon">
												<i class="ti-trash btn-md-3"></i>
											</button>
										</a>
									</td>
								</tr>
							<?php $total_harga = $total_harga + $oo['jumlah'] * $oo['price'];
								$no++;
							} ?>
							<tr>
								<td colspan="5">total</td>
								<td>Rp.<?= number_format($total_harga); ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="card-body card-mt-2">
				<form action="<?=base_url('sale/pay2') ?>" method="post">
					<input type="hidden" name="customer_id" value="<?= $customer_id ?>">
					
						<button type="submit" class="btn btn-primary">pay</button>
				</form>
			</div>
		</div>

	</div>
</div>
</div>