<!-- Form pencarian -->
<div class="container mt-4">
<form method="post" action="<?php echo site_url('pendapatan'); ?>" class="form-inline">
    <div class="form-group mr-2">
        <label for="bulan">Bulan:</label>
        <select class="form-control ml-2" id="bulan" name="bulan">
            <option value="01">Januari</option>
            <option value="02">Februari</option>
            <option value="03">Maret</option>
            <option value="04">April</option>
            <option value="05">Mei</option>
            <option value="06">Juni</option>
            <option value="07">Juli</option>
            <option value="08">Agustus</option>
            <option value="09">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
        </select>
    </div>
    <div class="form-group mr-2">
        <label for="tahun">Tahun:</label>
        <input type="text" id="tahun" name="tahun" class="form-control ml-2">
    </div>
    <button type="submit" class="btn btn-primary">Cari</button>
</form>
</div>

<!-- Tampilkan hasil pencarian -->
<?php if(isset($pendapatan) && !empty($pendapatan)) { ?>
    <div class="container mt-4">
        <h2>Data Pendapatan</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Tanggal Pesanan</th>
                    <th>Total Pendapatan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pendapatan as $pend) { ?>
                    <tr>
                        <td><?php echo $pend->tanggal_pesanan; ?></td>
                        <td><?php echo $pend->total_pendapatan; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php } ?>

<?php if(isset($pesanan) && !empty($pesanan)) { ?>
    <div class="container mt-4">
        <h2>Data Pesanan</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Pesanan</th>
                    <th>Nama Pemesan</th>
                    <th>Total</th>
                    <!-- Tambahkan kolom lain jika diperlukan -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pesanan as $pes) { ?>
                    <tr>
                        <td><?php echo $pes->id_pesanan; ?></td>
                        <td><?php echo $pes->nama_pemesan; ?></td>
                        <td><?php echo $pes->total; ?></td>
                        <!-- Tambahkan data lain jika diperlukan -->
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php } ?>
