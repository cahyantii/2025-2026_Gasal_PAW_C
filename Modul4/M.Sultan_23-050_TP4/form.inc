<?php
	<form method="POST" action="index.php">
	    <label for="surname">Surname:</label>
	    <input type="text" name="surname" id="surname"
	           value="<?php if (isset($_POST['surname'])) echo $_POST['surname']; ?>">
	    <input type="submit" value="Kirim">
	</form>
?>