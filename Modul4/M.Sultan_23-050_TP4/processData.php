<?php
require 'validate.inc';

$errors = array();

// Panggil fungsi validasi untuk field 'surname'
validateName($errors, $_POST, 'surname');

// Cek apakah ada error
if ($errors) {
    echo 'Errors:<br/>';
    foreach ($errors as $field => $error) {
        echo "$field $error<br/>";
    }
} else {
    echo 'Data OK!';
}
?>
