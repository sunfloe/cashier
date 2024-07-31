<div class="row">


<div class="col-md-6 grid-margin stretch-card">
		<div class="card card-inverse-primary">
			<div class="card-body">
				<div class="chartjs-size-monitor">
					<div class="chartjs-size-monitor-expand">
						<div class=""></div>
					</div>
					<div class="chartjs-size-monitor-shrink">
						<div class=""></div>
					</div>
				</div>
				<p class="card-title">Sales Summary</p>
				<p class="font-weight-500">by month</p>

				<canvas id="myChart" width="400" height="400"></canvas>

				<script>
					// Sample data for a bar chart
					var data = {
						labels: ['<?= $lima ?>', '<?= $empat ?>', '<?= $tiga ?>', '<?= $dua ?>', '<?= $satu ?>', '<?= $now ?>'],
						datasets: [{
							label: 'Monthly Sales',
							data: [<?= $month5 ?>, <?= $month4 ?>, <?= $month3 ?>, <?= $month2 ?>, <?= $month1 ?>, <?= $month ?>],
							backgroundColor: 'rgba(249, 255, 187, 0.5)',

							borderWidth: 1
						}]
					};

					// Configuration options
					var options = {
						scales: {
							y: {
								beginAtZero: true
							}
						}
					};

					// Get the canvas element
					var ctx = document.getElementById('myChart').getContext('2d');

					// Create a bar chart
					var myChart = new Chart(ctx, {
						type: 'bar',
						data: data,
						options: options
					});
				</script>
			</div>
		</div>
	</div>
	<div class="col-md-12 grid-margin">
		<div class="row">
			<div class="col-12 col-xl-8 mb-4 mb-xl-0">
				<h3 class="font-weight-bold">Sales Summary</h3>

			</div>

		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6 grid-margin stretch-card">
		<div class="card tale-bg">
			<div class="card-people mt-auto">
				<img src="<?= base_url('assets/skydash/'); ?>images/dashboard/dashboard.png" alt="people">
				<!-- <div class="weather-info">
					<div class="d-flex">
						
						<div class="ml-3">
							<h4 class="location font-weight-normal">HALOO</h4>
							
						</div>
					</div>
				</div> -->
			</div>
		</div>
	</div>
	<div class="col-lg-6 grid-margin transparent col-mt-6">
		<div class="row">
			<div class="col-md-6 mb-4 stretch-card transparent">
				<div class="card card-tale">
					<div class="card-body">
						<p class=" mb-3">Today’s Sale</p>
						<p class="fs-30 mb-2">Rp.<?= number_format($today) ?></p>

					</div>
				</div>
			</div>
			<div class="col-md-6 mb-4 stretch-card transparent">
				<div class="card card-dark-blue">
					<div class="card-body">
						<p class="mb-3">This month's sale</p>
						<p class="fs-30 mb-2">Rp.<?= number_format($month) ?></p>

					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
				<div class="card card-light-blue">
					<div class="card-body">
						<p class="mb-4">Today’s Transactions</p>
						<p class="fs-30 mb-2"><?= $transaksi; ?></p>
					</div>
				</div>
			</div>
			<div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
				<div class="card card-light-danger">
					<div class="card-body">
						<p class="mb-4">Product</p>
						<p class="fs-30 mb-2"><?= $produk ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	
	


</div>
