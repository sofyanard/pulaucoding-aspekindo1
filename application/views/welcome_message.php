<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Welcome to CodeIgniter!</h1>

	<div id="body">
		<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

		<p>If you would like to edit this page you'll find it located at:</p>
		<code>application/views/welcome_message.php</code>

		<p>The corresponding controller for this page is found at:</p>
		<code>application/controllers/Welcome.php</code>

		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>


		<hr/>
		<h5>List Controller / Method</h5>
		<p>(base-url) { / welcome / index } --> Welcome page</p>
		<p>(base-url) / anggota { / index } --> List anggota, dengan pencarian dan fungsi create, update, delete</p>
		<p>
			(base-url) / anggota / view { ?(query string) } --> List anggota, dengan pencarian tanpa fungsi create, update, delete (view only)
			<br/>&nbsp;&nbsp;&nbsp;&nbsp;query string : nrbu=(NRBU); npwp=(NPWP); propinsi=(kode propinsi); kota=(kode kota/kabupaten); nama=(nama); alamat=(alamat); tipebu=(kode tipe BU); grade=(kode grade);
		</p>
		<p>
			(base-url) / anggota / display { ?(query string) } --> List anggota, tanpa pencarian
			<br/>&nbsp;&nbsp;&nbsp;&nbsp;query string : nrbu=(NRBU); npwp=(NPWP); propinsi=(kode propinsi); kota=(kode kota/kabupaten); nama=(nama); alamat=(alamat); tipebu=(kode tipe BU); grade=(kode grade); subbidang=(kode sub bidang); from=(back url)
		</p>
		<p>
			(base-url) / anggota / displayjson { ?(query string) } --> List anggota, tanpa view, response to JSON
			<br/>&nbsp;&nbsp;&nbsp;&nbsp;query string : nrbu=(NRBU); npwp=(NPWP); propinsi=(kode propinsi); kota=(kode kota/kabupaten); nama=(nama); alamat=(alamat); tipebu=(kode tipe BU); grade=(kode grade); subbidang=(kode sub bidang); from=(back url)
		</p>
		<p>(base-url) / anggota / detail / (id) --> Detail anggota, dengan fungsi update</p>
		<p>(base-url) / anggota / detailview / (id) --> Detail anggota, tanpa fungsi update (view only)</p>
		<p>(base-url) / anggota / create --> Create new anggota</p>
		<p>(base-url) / anggota / delete / (id) --> Delete anggota</p>
		<p>(base-url) / anggota / getPropinsiJson --> List propinsi, response to JSON</p>
		<p>(base-url) / anggota / getKotaByPropinsiJson / (kode propinsi) --> List kota/kabupaten berdasarkan propinsi, response to JSON</p>
		<p>(base-url) / summary { / index } --> List summary</p>
		<p>(base-url) / summary / summary1 --> Summary jumlah anggota berdasarkan propinsi</p>
		<p>(base-url) / summary / summary2 { / (kode propinsi) } --> Summary jumlah anggota berdasarkan kota/kabupaten</p>
		<p>(base-url) / summary / summary3 { / (kode propinsi) / (kode kota/kabupaten) } --> Summary jumlah anggota berdasarkan tipe badan usaha</p>
		<p>(base-url) / summary / summary4 { / (kode propinsi) / (kode kota/kabupaten) } --> Summary jumlah anggota berdasarkan grade</p>
		<p>(base-url) / summary / summary5 { / (kode propinsi) / (kode kota/kabupaten) } --> Summary jumlah anggota berdasarkan sub bidang</p>
		<p>( ... ) --> parameter</p>
		<p>{ ... } --> optional</p>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>