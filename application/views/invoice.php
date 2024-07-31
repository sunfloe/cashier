<div class="card grid-margin stretch-card">
	<div class="card card-tale">
		<div class="card-body">
			<section class="invoice">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="card-title mt-3">
							<i class="ti ti-package"></i> Sunfloe <small class="pull-right">store</small>
						</h1>
					</div>
				</div>
				<div class="row invoice-info">
					<div class="col-sm-4 invoice-col">
						<div class="text-primary"><strong>From:</strong></div>
						<address>
							<strong>Sunfloe Store</strong><br>
							Jl. Yos sudarso,Kra <br>
							Phone : 0812XXXXXX
							Email : @gmail.com
						</address>
					</div>
					<div class="col-sm-4 invoice-col">
						<div class="text-primary"><strong>To:</strong></div>
						<address>
							<strong><?= $sale->name?></strong> <br>
							contact person : <?= $sale->telp?><br>
							alamat : <?= $sale->alamat?>
						</address>
					</div>
					<div class="col-sm-4 invoice-col">
						<div class="text-primary">
							<b>No Nota <b></br>
						</div>
						
						<b>#<?=$note?></b>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
<div class="card grid-margin strech-card mt-1">
	<div class="card card-light-blue">
		<div class="card-body">
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
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
							$total = 0;
							foreach ($detail as $oo) { ?>

						<tr>
							<td><?= $no ?></td>
							<td><?= $oo['code_product'] ?></td>
							<td><?= $oo['name'] ?></td>
							<td><?= $oo['jumlah'] ?></td>
							<td>Rp.<?= number_format($oo['price']) ?></td>
							<td>Rp.<?= number_format($oo['jumlah'] * $oo['price']) ?> </td>
						</tr>
						<?php $total = $total + $oo['jumlah'] * $oo['price'];
								$no++;
							} ?>
						<tr>
							<td colspan="5">total</td>
							<td>Rp.<?= number_format($total); ?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<a href="<?= base_url('sale/print/'.$note)?>" class="btn btn-warning" target="_blank">cetak pdf</a>
		</div>
	</div>
</div>
