<!DOCTYPE html>
<html lang="en">

<head>

    <!-- <meta http-equiv="refresh" content="5"> -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sharing Knowledge, Data Training, Management Training">
    <meta name="author" content="Muhammad Faruq, Faruq, Sharing Knowledge">

    <title><?= $title; ?></title>

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

    <!-- CSS DataTables Export -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/data_tables/css/jquery.dataTables.min">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/data_tables/css/buttons.dataTables.min">
	<link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    
    <!-- CSS DataTables Export Online -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">

</head>

<body id="page-top">

    <!-- tabel dari database -->
	<div class="container">
		<div class="row mt-5">
			<div class="col-lg-12">
				<h2 class="text-center"><?= $title; ?></h2>
				<table id="example" class="table table-hover table-bordered text-nowrap">
					<thead>
						<tr>
							<th width="5%">NO</th>
							<th>NAME</th>
							<th>INVOICE</th>
							<th>PRODUCT</th>
							<th>QTY</th>
							<th>PRICE</th>
							<th>TOTAL PRICE</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; ?>
						<?php foreach( $order_details as $order_detail ) : ?>
						<tr>
							<td>
								<?= $no++; ?>
							</td>
							<td>
								<?= $order_detail['name']; ?>
							</td>
							<td>
								<?= $order_detail['invoice']; ?>
							</td>
							<td>
								<?= $order_detail['product']; ?>
							</td>
							<td>
								<?= $order_detail['qty']; ?>
							</td>
							<td class="text-right">
								<?= number_format($order_detail['price']); ?>
							</td>
							<td class="text-right">
								<?= number_format($order_detail['price'] * $order_detail['qty'] ); ?>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="6" class="text-center">
								Sub Total
							</td>
							<td class="text-right">
								<?= number_format($orders['total_price']); ?>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>

    <!-- JS DataTables Export -->
    <script src="<?= base_url(); ?>assets/data_tables/js/jquery-3.5.1.js"></script>
    <script src="<?= base_url(); ?>assets/data_tables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>assets/data_tables/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url(); ?>assets/data_tables/js/jszip/3.1.3/jszip.min.js"></script>
    <script src="<?= base_url(); ?>assets/data_tables/js/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="<?= base_url(); ?>assets/data_tables/js/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="<?= base_url(); ?>assets/data_tables/js/buttons.html5.min.js"></script>
    <script src="<?= base_url(); ?>assets/data_tables/js/buttons.print.min.js"></script>

	<!-- Page level plugins -->
    <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- JS DataTables Export Online -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>

    <script>
        // table
        $(document).ready(function() {
            $('#example').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'csv', 'pdf'
                ]
            } );
        } );

        var $       = require( 'jquery' );
        var dt      = require( 'datatables.net' )();
        var buttons = require( 'datatables.net-buttons' )();
    </script>

</body>

</html>
