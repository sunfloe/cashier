<div id="hilang">
	<?= $this->session->flashdata('alert') ?>
</div>
<div class="row">
	<div class="col-lg-12 grid-margin stretch-card">
		<div class="card card-inverse-info">
			<div class="card-body">
				<h4 class="card-title mb-1">Hitung Suara</h4>
				<p class="text-primary">
					isi form dibawah ini untuk menambah data suara ya!
				</p>
				<form action="<?= base_url('kembaran_sirekap/add'); ?>" method="post">
					<div class="form-group">
						<label for="exampleInputName1">nama tps</label>
						<input type="number" class="form-control  mb-1" name="nama_tps_4">
					</div>
					<div class="form-group">
						<label for="exampleInputName1">total</label>
						<input type="number" class="form-control mb-1" name="total_4">
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-9 col-form-label mb-1">Suara Sah</label>
								<div class="col-sm-9">
									<input type="number" class="form-control" name="total_sah_4">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-9 col-form-label mb-1">Suara tidak sah</label>
								<div class="col-sm-9">
									<input type="number" class="form-control" name="total_tidaksah_4">
								</div>
							</div>
						</div>
					</div>

					<p class="text-primary mt-4">
						suara dari tiap paslon
					</p>

					<div class="row">
						<div class="col-md-4">
							<div class="form-group row">
								<label class="col-sm-9 col-form-label  mb-1">no 1</label>
								<div class="col-sm-9">
									<input type="number" class="form-control" name="paslon1_4">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group row">
								<label class="col-sm-9 col-form-label mb-1">no 2</label>
								<div class="col-sm-9">
									<input type="number" class="form-control" name="paslon2_4">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group row">
								<label class="col-sm-9 col-form-label mb-1">no 3</label>
								<div class="col-sm-9">
									<input type="number" class="form-control" name="paslon3_4">
								</div>
							</div>
						</div>
					</div>

					<button type="submit" class="btn btn-warning">mulai hitung suara</button>
				</form>
			</div>
		</div>
	</div>
</div>