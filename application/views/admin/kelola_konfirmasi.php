<?php $this->load->view('layout/header'); ?>
<div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Kelola Konfirmasi Pembayaran</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID Pembayaran</th>
                                <th>Bukti Pembayaran</th>
                                <th>Status Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Tampilkan data konfirmasi pembayaran -->
                            <?php foreach ($konfirmasi as $row) { ?>
                                <tr>
                                    <td><?php echo $row->id_konfirmasi; ?></td>
                                    <td><img src="<?php echo base_url('assets/konfirmasi/' . $row->bukti); ?>" alt="Bukti Pembayaran" style="max-width: 100%; height: auto;"></td>
                                    <td><?php echo $row->status_bayar; ?></td>
                                    <td>
                                        <?php if ($row->status_bayar == 'Belum') { ?>
                                            <!-- Jika status pembayaran belum, tampilkan tombol setuju -->
                                            <a href="<?php echo site_url('pembayaran/setuju/'.$row->id_konfirmasi); ?>" class="btn btn-success" >Setuju</a>
                                        <?php } else { ?>
                                            <!-- Jika status pembayaran sudah, tampilkan pesan -->
                                            <span class="badge badge-primary">Sudah disetujui</span>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $this->load->view('layout/footer'); ?>