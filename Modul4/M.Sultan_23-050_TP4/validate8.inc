<?php
function validateForm(&$errors, $data)
{
    // 1️⃣ Nama: wajib diisi & hanya huruf dan spasi
    if (empty(trim($data['nama']))) {
        $errors['nama'] = "Nama wajib diisi";
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $data['nama'])) {
        $errors['nama'] = "Nama hanya boleh huruf dan spasi";
    }

    // 2️⃣ NIM: wajib diisi & hanya angka
    if (empty($data['nim'])) {
        $errors['nim'] = "NIM wajib diisi";
    } elseif (!is_numeric($data['nim'])) {
        $errors['nim'] = "NIM harus berupa angka";
    }

    // 3️⃣ Email: wajib diisi & format valid (filter bawaan PHP)
    if (empty($data['email'])) {
        $errors['email'] = "Email wajib diisi";
    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Format email tidak valid";
    }

    // 4️⃣ Password: wajib diisi & minimal 6 karakter
    if (empty($data['password'])) {
        $errors['password'] = "Password wajib diisi";
    } elseif (strlen($data['password']) < 6) {
        $errors['password'] = "Password minimal 6 karakter";
    }

    // 5️⃣ Tanggal Lahir: wajib diisi & valid (pakai checkdate)
    if (empty($data['tanggal_lahir'])) {
        $errors['tanggal_lahir'] = "Tanggal lahir wajib diisi";
    } else {
        $tgl = explode('-', $data['tanggal_lahir']);
        if (count($tgl) == 3) {
            $tahun = (int)$tgl[0];
            $bulan = (int)$tgl[1];
            $hari = (int)$tgl[2];
            if (!checkdate($bulan, $hari, $tahun)) {
                $errors['tanggal_lahir'] = "Tanggal lahir tidak valid";
            }
        } else {
            $errors['tanggal_lahir'] = "Format tanggal tidak sesuai (YYYY-MM-DD)";
        }
    }
}
?>
