<!DOCTYPE html>
<html lang="en">

<head>

	<!-- <meta http-equiv="refresh" content="5"> -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Aplikasi Pemesanan Menu, Aplikasi Soto Mie Bogor Boga Rasa, Aplikasi Berbasis Website">
    <meta name="author" content="Faruq, Muhammad Faruq, Faruq Bekasi, Muhammad Faruq Noor Afiyf, STMIK Jayakarta">

    <title>Soto Mie Bogor Boga Rasa | <?= $title; ?></title>

	<link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

	<!-- Custom styles for this page -->
    <link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

	<style>
		.page-loader {
			display: flex;
			justify-content: center;
			align-items: center;
			position: fixed;
			top: 0;
			left: 0;
			width: 100vw;
			height: 100vh;
			background-color: darkgray;
			opacity: 50%;
			z-index: 999;
		}

		.lds-spinner {
		color: official;
		display: inline-block;
		position: relative;
		width: 80px;
		height: 80px;
		}
		.lds-spinner div {
		transform-origin: 40px 40px;
		animation: lds-spinner 1.2s linear infinite;
		}
		.lds-spinner div:after {
		content: " ";
		display: block;
		position: absolute;
		top: 3px;
		left: 37px;
		width: 6px;
		height: 18px;
		border-radius: 20%;
		background: #fff;
		}
		.lds-spinner div:nth-child(1) {
		transform: rotate(0deg);
		animation-delay: -1.1s;
		}
		.lds-spinner div:nth-child(2) {
		transform: rotate(30deg);
		animation-delay: -1s;
		}
		.lds-spinner div:nth-child(3) {
		transform: rotate(60deg);
		animation-delay: -0.9s;
		}
		.lds-spinner div:nth-child(4) {
		transform: rotate(90deg);
		animation-delay: -0.8s;
		}
		.lds-spinner div:nth-child(5) {
		transform: rotate(120deg);
		animation-delay: -0.7s;
		}
		.lds-spinner div:nth-child(6) {
		transform: rotate(150deg);
		animation-delay: -0.6s;
		}
		.lds-spinner div:nth-child(7) {
		transform: rotate(180deg);
		animation-delay: -0.5s;
		}
		.lds-spinner div:nth-child(8) {
		transform: rotate(210deg);
		animation-delay: -0.4s;
		}
		.lds-spinner div:nth-child(9) {
		transform: rotate(240deg);
		animation-delay: -0.3s;
		}
		.lds-spinner div:nth-child(10) {
		transform: rotate(270deg);
		animation-delay: -0.2s;
		}
		.lds-spinner div:nth-child(11) {
		transform: rotate(300deg);
		animation-delay: -0.1s;
		}
		.lds-spinner div:nth-child(12) {
		transform: rotate(330deg);
		animation-delay: 0s;
		}
		@keyframes lds-spinner {
		0% {
			opacity: 1;
		}
		100% {
			opacity: 0;
		}
		}
	</style>

</head>

<body id="page-top" onload="loading();">

	<div class="page-loader">
		<div class="lds-spinner">
			<div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
		</div>
	</div>

    <!-- Page Wrapper -->
    <div id="wrapper">
