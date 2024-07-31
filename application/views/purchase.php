<div id="hilang">
	<?= $this->session->flashdata('alert')?>
</div>
<div class="col-lg-12 ">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
		select suplier
	</button>
</div>
<!-- Modal -->
<div class="modal fade bd-example-modal-md" id="exampleModal" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Sales</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<div class="table-sm">
				<table class="table">
					<thead>
						<tr>
							<th>no</th>
							<th>name</th>
							<th>telepon</th>
							<th>action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($suplier as $ya) {?>

						<tr>
							<td><?= $no ?></td>
							<td><?= $ya['nama'] ?></td>
							<td><?= $ya['telp'] ?> </td>
							<td>
								<a href="<?= base_url('purchase/detail/'.$ya['suplier_id'])?>">
									<button type="button" class="btn btn-inverse-secondary">
										select
									</button>
								</a>
							</td>
						</tr>
						<?php  $no++;} ?>
					</tbody>
				</table>
			</div>
			</div>

		</div>
	</div>
</div>
<div class="col-lg-12 grid-margin stretch-card mt-3">
	<div class="card">
		<!-- Button trigger modal -->

		<div class="card-body">
			<h4 class="card-title">today's sale</h4>

			<div class="table-responsive">
				<table class="table-striped" id="tabelku">
					<thead>
						<tr>
							<th>No</th>
							<th>Code</th>
                            <th>Code Barang</th>
							<th>Nominal</th>
							<th>suplier</th>
							<th>Product</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1;$total = 0; foreach ($purchase as $ok) {?>

						<tr>
							<td><?= $no ?></td>
							<td><?= $ok['kode_pembelian'] ?></td>
                            <td><?= $ok['kode_barang'] ?></td>
							<td><?= $ok['total_harga'] ?></td>
                            <td><?= $ok['suuplier'] ?></td>
							<td><?= $ok['name'] ?></td>
							<td></td>
							<td>
								<a href="<?= base_url('sale/invoice/'.$ok['code_penjualan'])?>">
									<button type="button" class="btn btn-inverse-dark btn-icon">
										<i class="ti-eye btn-md-3"></i>
									</button>
								</a>
							</td>
						</tr>
						
						<?php $total = $total + $ok['total_harga'];
								$no++;
							} ?>
						<tr>
							<div class="dropdown-divider">
							<td colspan="2">total</td>
							<td>Rp.<?= number_format($total); ?></td>
							</div>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
