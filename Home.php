<?php

class Home {
    public function index() {
        require_once 'app/models/Game_model.php';
        $model = new Game_model();

        // 1. Pengaturan Pagination
        $jumlahDataPerHalaman = 6;
        $totalData = $model->getTotalData();
        $data['jumlahHalaman'] = ceil($totalData / $jumlahDataPerHalaman);
        
        // Tentukan halaman aktif
        $data['halamanAktif'] = (isset($_GET['p'])) ? (int)$_GET['p'] : 1;
        $awalData = ($jumlahDataPerHalaman * $data['halamanAktif']) - $jumlahDataPerHalaman;

        $data['judul'] = 'Daftar Game';
        // 2. Ambil data dengan LIMIT
        $data['game'] = $model->getGameByLimit($awalData, $jumlahDataPerHalaman);

        require_once 'app/views/templates/header.php';
        require_once 'app/views/home/index.php';
        require_once 'app/views/templates/footer.php';
    }

    public function tambah() {
        require_once 'app/models/Game_model.php';
        $model = new Game_model();
        
        if( $model->tambahDataGame($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: http://localhost/project_uas_game/Home');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: http://localhost/project_uas_game/Home');
            exit;
        }
    }

    public function hapus($id) {
        require_once 'app/models/Game_model.php';
        $model = new Game_model();
        
        // Cek apakah data berhasil dihapus
        if( $model->hapusDataGame($id) > 0 ) {
            // BARIS INI YANG PENTING: Menitipkan pesan berhasil
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: http://localhost/project_uas_game/');
            exit;
        } else {
            // Menitipkan pesan gagal jika tidak ada baris yang terhapus
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: http://localhost/project_uas_game/');
            exit;
        }
    }

    public function cari() {
        require_once 'app/models/Game_model.php';
        $model = new Game_model();

        $data['judul'] = 'Daftar Game';
        $data['game'] = $model->cariDataGame(); // Fungsi cari biasanya tidak pakai pagination agar semua hasil muncul
        
        // Matikan pagination saat pencarian agar tidak bingung
        $data['jumlahHalaman'] = 0; 

        require_once 'app/views/templates/header.php';
        require_once 'app/views/home/index.php';
        require_once 'app/views/templates/footer.php';
    }

    public function ubah() {
        require_once 'app/models/Game_model.php';
        $model = new Game_model();
        
        // Pastikan kita mengecek $_POST['id']
        if( $model->ubahDataGame($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: http://localhost/project_uas_game/');
            exit;
        } else {
            // Jika tidak ada perubahan data pun, kita anggap tetap berhasil agar tidak bingung
            Flasher::setFlash('tidak ada perubahan / berhasil', 'diubah', 'info');
            header('Location: http://localhost/project_uas_game/');
            exit;
        }
    }

    public function getubah() {
        require_once 'app/models/Game_model.php';
        $model = new Game_model();
        
        // Kirim data dalam format JSON agar bisa dibaca JavaScript
        echo json_encode($model->getGameById($_POST['id']));
    }
}