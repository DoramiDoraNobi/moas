<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Pesanan</h4>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahPesananModal">Tambah Pesanan</button>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pemesan</th>
                                <th>Alamat</th>
                                <th>Tanggal Pesanan</th>
                                <th>No Hp Pemesan</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pesanan as $key => $value) { ?>
                                <tr>
                                    <td><?php echo $key + 1 ?></td>
                                    <td><?php echo $value->nama_pemesan ?></td>
                                    <td><?php echo $value->alamat ?></td>
                                    <td><?php echo $value->tanggal_pesanan ?></td>
                                    <td><?php echo $value->nohp_pemesan ?></td>
                                    <td>Rp. <?php echo $value->total ?></td>
                                    <td><?php echo $value->status ?></td>
                                    <td>
                                        <a href="<?php echo site_url('pesanan/detailpesanan/'.$value->id_pesanan) ?>" class="btn btn-primary">Detail</a>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editPesananModal<?php echo $value->id_pesanan ?>">Edit</button>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusPesananModal<?php echo $value->id_pesanan ?>">Hapus</button>
                                    </td>
                                </tr>
                                <!-- Modal Edit Pesanan -->
                                <div class="modal fade" id="editPesananModal<?php echo $value->id_pesanan ?>" tabindex="-1" role="dialog" aria-labelledby="editPesananModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editPesananModalLabel">Edit Pesanan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="<?php echo site_url('pesanan/do_update/'.$value->id_pesanan) ?>">
                                                    <input type="hidden" name="id_pesanan" value="<?php echo $value->id_pesanan ?>">
                                                    <input type="hidden" name="id_katering" value="<?php echo $value->id_katering ?>">
                                                <div class="form-group">
                                                        <label for="nama_pemesan">Nama Pemesan</label>
                                                        <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" value="<?php echo $value->nama_pemesan ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="alamat">Alamat</label>
                                                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $value->alamat ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="alamat">No Hp Pemesan</label>
                                                        <input type="text" class="form-control" id="nohp_pemesan" name="nohp_pemesan" value="<?php echo $value->nohp_pemesan ?>">
                                                    </div>
                                                    <div class="form-group">
                                                    <label for="status">Status</label>
                                                        <select class="form-control" id="status" name="status">
                                                            <option value="Selesai" <?php echo ($value->status == 'Selesai') ? 'selected' : '' ?>>Selesai</option>
                                                            <option value="Proses" <?php echo ($value->status == 'Proses') ? 'selected' : '' ?>>Proses</option>
                                                        </select>
                                                    </div>
                                                    <!-- Tombol Simpan -->
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Hapus Pesanan -->
                                <div class="modal fade" id="hapusPesananModal<?php echo $value->id_pesanan ?>" tabindex="-1" role="dialog" aria-labelledby="hapusPesananModalLabel" aria-hidden="true">
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
                                                <form method="post" action="<?php echo site_url('pesanan/do_delete/'.$value->id_pesanan) ?>">
                                                    <input type="hidden" name="id_menu" value="<?php echo $value->id_pesanan ?>">
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

<!-- Modal Tambah Pesanan -->
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
                <form method="post" action="<?php echo site_url('pesanan/do_create') ?>">
                    <div class="form-group">
                        <label for="nama_pemesan">Nama Pemesan</label>
                        <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_pesanan">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal_pesanan" name="tanggal_pesanan">
                    </div>
                    <div class="form-group">
                        <label for="nohp_pemesan">No Hp Pemesan</label>
                        <input type="text" class="form-control" id="nohp_pemesan" name="nohp_pemesan">
                    </div>
                    <!-- Tombol Simpan -->
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>


