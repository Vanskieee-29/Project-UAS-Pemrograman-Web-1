<?php

class Auth {
    public function index() {
        $data['judul'] = 'Login Page';
        require_once 'app/views/auth/index.php';
    }

    public function prosesLogin() {
        require_once 'app/models/User_model.php';
        $model = new User_model();
        
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = $model->getUserByUsername($username);

        if ($user) {
            // Cek password
            if (password_verify($password, $user['password'])) {
                if (session_status() === PHP_SESSION_NONE) session_start();
                
                $_SESSION['login'] = true;
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                header('Location: http://localhost/project_uas_game/Home');
                exit;
            } else {
                // JIKA PASSWORD SALAH: Beri notif, jangan pindah halaman/cetak teks
                Flasher::setFlash('gagal', 'Password salah!', 'danger');
                header('Location: http://localhost/project_uas_game/Auth');
                exit;
            }
        } else {
            // JIKA USERNAME TIDAK ADA
            Flasher::setFlash('gagal', 'Username tidak ditemukan!', 'danger');
            header('Location: http://localhost/project_uas_game/Auth');
            exit;
        }
    }

    public function logout() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        session_destroy();
        header('Location: http://localhost/project_uas_game/Auth');
        exit;
    }
}