<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Makanan</h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahMakananModal">Tambah Makanan</button>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Menu</th>
                                    <th>Harga</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($makanan as $key => $value) { ?>
                                    <tr>
                                        <td><?php echo $key+1 ?></td>
                                        <td><?php echo $value->nama_menu ?></td>
                                        <td><?php echo $value->harga?></td>
                                        <td><?php echo $value->deskripsi ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editMakananModal<?php echo $value->id_menu ?>">Edit</button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusMakananModal<?php echo $value->id_menu ?>">Hapus</button>
                                        </td>
                                    </tr>
                                    <!-- Modal Edit Makanan -->
                                    <div class="modal fade" id="editMakananModal<?php echo $value->id_menu ?>" tabindex="-1" role="dialog" aria-labelledby="editMakananModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editMakananModalLabel">Edit Makanan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="<?php echo site_url('makanan/do_update/'.$value->id_menu) ?>">
                                                    <input type="hidden" name="id_menu" value="<?php echo $value->id_menu ?>">
                                                    <input type="hidden" name="id_katering" value="<?php echo $value->id_katering ?>">
                                                        <div class="form-group">
                                                            <label for="nama_makanan">Nama Makanan</label>
                                                            <input type="text" class="form-control" id="nama_makanan" name="nama_menu" value="<?php echo $value->nama_menu ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="harga">Harga</label>
                                                            <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $value->harga ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="harga">Deskripsi</label>
                                                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?php echo $value->deskripsi ?>">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal Hapus Makanan -->
                                    <div class="modal fade" id="hapusMakananModal<?php echo $value->id_menu ?>" tabindex="-1" role="dialog" aria-labelledby="hapusMakananModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="hapusMakananModalLabel">Hapus Makanan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin ingin menghapus makanan ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                <form method="post" action="<?php echo site_url('makanan/do_delete') ?>">
                                                    <input type="hidden" name="id_menu" value="<?php echo $value->id_menu ?>">
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Makanan -->
    <div class="modal fade" id="tambahMakananModal" tabindex="-1" role="dialog" aria-labelledby="tambahMakananModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahMakananModalLabel">Tambah Makanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo site_url('makanan/do_create') ?>">
                        <div class="form-group">
                            <label for="nama_makanan">Menu Makanan</label>
                            <input type="text" class="form-control" id="nama_menu" name="nama_menu">
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga">
                        </div>
                        <div class="form-group">
                            <label for="harga">Deskripsi</label>
                            <input type="text" class="form-control" id="harga" name="deskripsi">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
