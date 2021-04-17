<?php

SESSION_START();

session_destroy();

header('Location: logout_success.php');

?>



