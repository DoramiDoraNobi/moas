<?php $this->load->view('layout/header2'); ?>
    <h2>Selamat Datang</h2>
    <h3><?php echo $this->session->userdata('nama_katering'); ?></h3>
    <p>Selamat datang di halaman dashboard MOAS. Silakan pilih salah satu menu untuk memulai.</p>

    <!-- Form untuk memasukkan bulan dan tahun -->
    <form method="post" action="<?php echo site_url('auth/dashboard'); ?>">
       <div class="form-group">
        <label for="bulan">Bulan:</label>
        <select id="bulan" name="bulan" class="form-control">
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
            <option value="12">Desember</option>
        </select>
                
       </div>
        <div class="form-group">
                <label for="tahun">Tahun:</label>
                <input type="text" class="form-control" id="tahun" name="tahun">
        </div>
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>
<br>
<br>
    <!-- Tambahkan card untuk total pendapatan -->
    <div class="card">
        <div class="card-header">
            Total Pendapatan
        </div>
        <div class="card-body">
            <h5 class="card-title">Rp.<?php echo $total_pendapatan; ?></h5>
        </div>
    </div>

    <!-- Tambahkan card untuk total pendapatan bulan -->
    <div class="card">
        <div class="card-header">
            Total Pendapatan Bulan
        </div>
        <div class="card-body">
            <h5 class="card-title">Rp.<?php echo $total_pendapatan_bulan; ?></h5>
        </div>
    </div>

<?php $this->load->view('layout/footer'); ?>
