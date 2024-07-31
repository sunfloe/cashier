<div class="card-body">
	<h4 class="card-title">list of category</h4>

	<div class="table-responsive">
		<table class="table table-striped" id="tabelku">
			<thead>
				<tr>
					<th>no</th>
					<th>name</th>

					<th></th>
				</tr>
			</thead>
			<tbody>


				<tr>
                <?php $no = 1; foreach ($list as $ya) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $ya['name']?></td>
                    </tr>
                <?php } ?>
				</tr>
             

			</tbody>
		</table>
	</div>
</div>
