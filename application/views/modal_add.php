<div class="modal" id="modal_add" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="welcome/kategori_simpan" id="tambah_cepat_kategori">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="nama" class="form-control" placeholder="Nama Kategori">
                        <span id="nama" class="text-danger"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btn_store" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Proses...">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>