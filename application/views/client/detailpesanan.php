
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Detail Pesanan</h4>
                    <a href="<?php echo site_url('pesanan') ?>" class="btn btn-warning">Kembali</a>
                    <button type="button" id="tombol-tambah-menu" class="btn btn-primary" data-toggle="modal" data-target="#tambahPesananModal">Tambah Menu Pesanan</button>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pemesan</th>
                                <th>Menu</th>
                                <th>Jumlah</th>
                                <th>Total Item</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($detail_pesanan as $key => $value) { ?>
                                <tr>
                                    <td><?php echo $key + 1 ?></td>
                                    <td><?php echo $this->Pesanan_model->get_nama_pemesanbyId($value->id_pesanan); ?></td>
                                    <td><?php echo $this->Pesanan_model->get_nama_menu_by_id($value->id_menu); ?></td>
                                    <td><?php echo $value->jumlah ?></td>
                                    <td><?php echo $value->total_per_item ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editPesananModal<?php echo $value->id_detail_pesanan ?>">Edit</button>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusPesananModal<?php echo $value->id_detail_pesanan ?>">Hapus</button>
                                    </td>
                                </tr>
                                <!-- Modal Edit Pesanan -->
                                <div class="modal fade" id="editPesananModal<?php echo $value->id_detail_pesanan ?>" tabindex="-1" role="dialog" aria-labelledby="editPesananModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editPesananModalLabel">Edit Pesanan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="<?php echo site_url('pesanan/do_updateDetail/'.$value->id_detail_pesanan) ?>">
                                                    <input type="hidden" name="id_pesanan" value="<?php echo $value->id_pesanan ?>">
                                                    <input type="hidden" name="id_detail_pesanan" value="<?php echo $value->id_detail_pesanan ?>">
                                                    <div class="form-group">
                                                        <label for="nama_makanan">Pilih Makanan</label>
                                                        <select class="form-control" id="nama_makanan" name="nama_menu">
                                                            <?php foreach ($daftar_makanan as $makanan) { ?>
                                                                <option value="<?php echo $makanan->id_menu ?>" <?php echo ($makanan->id_menu == $value->id_menu) ? 'selected' : '' ?>>
                                                                    <?php echo $makanan->nama_menu ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jumlah">Jumlah</label>
                                                        <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?php echo $value->jumlah ?>">
                                                    </div>
                                                    <!-- Tombol Simpan -->
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Hapus Pesanan -->
                                <div class="modal fade" id="hapusPesananModal<?php echo $value->id_detail_pesanan ?>" tabindex="-1" role="dialog" aria-labelledby="hapusPesananModalLabel" aria-hidden="true">
                                    <!-- Isi Modal untuk Hapus Pesanan -->
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="hapusPesananModalLabel">Hapus Pesanan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah Anda yakin ingin menghapus pesanan ini?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                <form method="post" action="<?php echo site_url('pesanan/do_deleteDetail/'.$value->id_detail_pesanan) ?>">
                                                    <input type="hidden" name="id_detail_pesanan" value="<?php echo $value->id_detail_pesanan ?>">
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Tambah Menu Pesanan -->
<div class="modal fade" id="tambahPesananModal" tabindex="-1" role="dialog" aria-labelledby="tambahPesananModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPesananModalLabel">Tambah Pesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo site_url('pesanan/do_createDetail') ?>">
                <input type="hidden" name="id_pesanan" value="<?php echo $value->id_pesanan?>">
                    <div class="form-group">
                        <label for="nama_makanan">Pilih Makanan</label>
                        <select class="form-control" id="nama_makanan" name="nama_menu">
                            <?php foreach ($daftar_makanan as $makanan) { ?>
                                <option value="<?php echo $makanan->id_menu ?>">
                                    <?php echo $makanan->nama_menu ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="text" class="form-control" id="jumlah" name="jumlah">
                    </div>
                    <!-- Tombol Simpan -->
                    <button type="submit" class="btn btn-primary">Simpan</button>
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

