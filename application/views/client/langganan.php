<?php $this->load->view('layout/header2'); ?>
    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Ayo Berlangganan MOAS</h2>
                    <p>Dapatkan manfaat dari berlangganan aplikasi kami. Anda akan mendapatkan layanan yang luar biasa dan pengalaman yang menyenangkan.</p>
                    <p>Manfaat berlangganan:</p>
                    <ul>
                        <li>Data Menu bisa mencapai 30</li>
                        <li>Data Pesanan bisa mencapai 100 pesanan</li>
                        <li>User lebih diutamakan</li>
                    </ul>

                    <!-- Form untuk mengunggah bukti pembayaran -->
                    <form method="post" action="<?php echo site_url('auth/submit_pembayaran'); ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="bukti_pembayaran">Unggah Bukti Pembayaran (Foto)</label>
                            <input type="file" class="form-control-file" id="bukti_pembayaran" name="bukti_pembayaran">
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim Bukti Pembayaran</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <h2>Tidak Berlangganan</h2>
                    <p>Anda dapat menggunakan aplikasi kami dengan batasan tertentu.</p>
                    <p>Batasan:</p>
                    <ul>
                        <li>Terbatasnya jumlah data menu yang dapat disimpan</li>
                        <li>Batas jumlah pesanan yang bisa dikelola</li>
                        <li>Prioritas lebih rendah dalam pengelolaan</li>
                    </ul>
                    <p>Anda mungkin akan menemui kendala ketika:</p>
                    <ul>
                        <li>Mengelola banyak data menu dan pesanan</li>
                        <li>Mengharapkan layanan yang lebih prioritas</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php $this->load->view('layout/footer'); ?>
