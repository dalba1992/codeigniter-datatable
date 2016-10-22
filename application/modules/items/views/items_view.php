<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Ajax CRUD with Bootstrap modals and Datatables</title>
		<link href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/plugins/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
	</head>
	<body>

	<div class="container">
		<h1>List Items</h1>

		<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Supplier Code</th>
					<th>SKU</th>
					<th>Item Name</th>
					<th>Price</th>
					<th>Sold Price</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
			</tbody>

			<tfoot>
				<tr>
					<th>Supplier Code</th>
					<th>SKU</th>
					<th>Item Name</th>
					<th>Price</th>
					<th>Sold Price</th>
					<th>Actions</th>
				</tr>
			</tfoot>
		</table>
	</div>

	<script src="<?php echo base_url('assets/plugins/jquery/jquery-2.1.4.min.js')?>"></script>
	<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js')?>"></script>
	<script src="<?php echo base_url('assets/plugins/datatables/js/jquery.dataTables.min.js')?>"></script>
	<script src="<?php echo base_url('assets/plugins/datatables/js/dataTables.bootstrap.js')?>"></script>

	<script type="text/javascript">

		$(document).ready(function() {
			table = $('#table').DataTable({

				"processing": true,
				"serverSide": true,

				"ajax": {
						"url": "<?php echo site_url('items/ajax_list_items')?>",
						"type": "POST"
				},

				"order": [[ 0, "desc" ]],

				"columnDefs": [
				{
					"targets": [ 0 ],
					"visible": false,
					"orderable": false,
				},
				],

			});
		});

		</script>
	</body>
</html>
