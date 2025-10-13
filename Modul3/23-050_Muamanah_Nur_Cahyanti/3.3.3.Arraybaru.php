<?php
    $weight = array(
        "Andy" => 65,
        "Bany" => 60,
        "Charlie" => 63
    );

    // Mengambil semua nilai dari array asosiatif menjadi array numerik
    $values = array_values($weight);

    // Menampilkan data ke-2
    echo 'Data ke-2 dari array $weight adalah: ' . $values[1] . ' kg';
?>
