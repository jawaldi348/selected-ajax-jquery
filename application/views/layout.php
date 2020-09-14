<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<title>Hello, world!</title>
</head>

<body>
	<div class="container mt-5">
		<div class="card">
			<div class="card-header">Tambah Data</div>
			<div class="card-body">
				<form>
					<div class="form-group">
						<label>Kategori</label>
						<div class="input-group mb-3">
							<select name="id_kategori" id="id_kategori" class="form-control">
								<option value="">-- Pilih --</option>
								<?php foreach ($kategori as $k) { ?>
									<option value="<?= $k['id_kategori'] ?>"><?= $k['nama_kategori'] ?></option>
								<?php } ?>
							</select>
							<div class="input-group-append">
								<button class="btn btn-outline-secondary" type="button" onclick="modal_add()"><i class="fa fa-plus-square"></i> Tambah Kategori</button>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
	<div id="tampil_modal"></div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<script>
		function modal_add() {
			$.ajax({
				url: "<?= site_url('welcome/modal_add') ?>",
				type: "get",
				success: function(resp) {
					$("#tampil_modal").html(resp);
					$("#modal_add").modal('show');
				}
			});
		}
		$(document).on('submit', '#tambah_cepat_kategori', function(e) {
			e.preventDefault();
			var formData = new FormData($("#tambah_cepat_kategori")[0]);
			$.ajax({
				url: $("#tambah_cepat_kategori").attr('action'),
				dataType: 'json',
				type: 'POST',
				data: formData,
				contentType: false,
				processData: false,
				beforeSend: function() {
					$('#btn_store').button('loading');
					setTimeout(function() {
						$('#btn_store').button('reset');
					}, 500);
				},
				success: function(resp) {
					if (resp.status == true) {
						var newOption = new Option(resp.data.nama_kategori, resp.data.id_kategori, true, true);
						$('#id_kategori')
							.append(newOption)
							.trigger('change');
						$('#modal_add').modal('hide');
					} else {
						if (resp.name_error != '') {
							$('#nama').html(resp.nama);
						} else {
							$('#nama').html('');
						}
					}
				}
			});
		});
	</script>
</body>

</html>