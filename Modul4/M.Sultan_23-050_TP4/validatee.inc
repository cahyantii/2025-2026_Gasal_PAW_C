<?php
function validateForm(&$errors, $data)
{
    // Validasi Nama
    if (empty(trim($data['nama']))) {
        $errors['nama'] = "Nama wajib diisi";
    }

    // Validasi NIM
    if (empty($data['nim'])) {
        $errors['nim'] = "NIM wajib diisi";
    }

    // Validasi Email
    if (empty($data['email'])) {
        $errors['email'] = "Email wajib diisi";
    }

    // Validasi Password
    if (empty($data['password'])) {
        $errors['password'] = "Password wajib diisi";
    }

    // Validasi Tanggal Lahir
    if (empty($data['tanggal_lahir'])) {
        $errors['tanggal_lahir'] = "Tanggal lahir wajib diisi";
    }
}
?>