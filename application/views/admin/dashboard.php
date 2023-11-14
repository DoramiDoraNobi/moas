<?php $this->load->view('layout/header'); ?>
        <h2>Selamat Datang, <?php echo $this->session->userdata('nama_admin'); ?>!</h2>
        <p>Selamat datang di halaman dashboard MOAS. Silakan pilih salah satu menu untuk memulai.</p>
<?php $this->load->view('layout/footer'); ?>