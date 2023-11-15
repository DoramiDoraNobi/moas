<?php $this->load->view('layout/header2'); ?>
        <h2>Selamat Datang</h2>
        <h3><?php echo $this->session->userdata('nama_katering'); ?></h3>
        <p>Selamat datang di halaman dashboard MOAS. Silakan pilih salah satu menu untuk memulai.</p>
<?php $this->load->view('layout/footer'); ?>