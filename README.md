
Scheduler untuk Windows:
Langkah 1: Buka Task Scheduler

Buka Task Scheduler melalui pencarian atau melalui "Control Panel > System and Security > Administrative Tools > Task Scheduler".
Langkah 2: Buat Tugas Baru

Klik kanan pada "Task Scheduler Library" dan pilih "Create Basic Task".
Berikan nama dan deskripsi untuk tugas yang akan Anda buat.
Langkah 3: Tentukan Waktu dan Frekuensi

Pilih "Daily", "Weekly", atau "Monthly" sesuai kebutuhan Anda.
Atur waktu dan frekuensi eksekusi tugas yang Anda inginkan.
Langkah 4: Pilih Program untuk Dijalankan

Pilih "Start a Program".
Isi lokasi file aplikasi Anda yang ingin dijalankan secara terjadwal.
Langkah 5: Konfigurasi Tambahan (Opsional)

Anda juga bisa menambahkan argumen atau parameter jika diperlukan.
Langkah 6: Konfirmasi dan Selesai

Tinjau konfigurasi Anda dan klik "Finish" untuk menyelesaikan proses membuat tugas terjadwal.
Scheduler untuk Linux/macOS:
Langkah 1: Crontab Configuration

Gunakan terminal dan buka crontab dengan perintah crontab -e.
Untuk setiap baris di crontab, masukkan perintah dan jadwal eksekusinya dalam format cron.
Contoh: 0 1 * * * /path/to/your_script.sh (akan menjalankan script Anda setiap hari pukul 01:00).
Langkah 2: Simpan dan Keluar

Setelah menambahkan jadwal, tekan Ctrl + X (diikuti dengan Y untuk konfirmasi) untuk keluar dari editor dan menyimpan perubahan.