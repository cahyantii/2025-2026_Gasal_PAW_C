<?php
	function validateName(&$errors, $field_list, $field_name)
	{
	    // Pola regex untuk memastikan input hanya huruf, tanda kutip tunggal (') atau tanda minus (-)
	    $pattern = "/^[a-zA-Z'-]+$/"; 

	    // Jika field tidak diisi sama sekali
	    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
	        $errors[$field_name] = 'required';
	    } 
	    // Jika format input tidak sesuai pola alfabet
	    else if (!preg_match($pattern, $field_list[$field_name])) {
	        $errors[$field_name] = 'invalid';
	    }
	}
?>
