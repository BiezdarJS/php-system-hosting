<?php require __DIR__ . './../private/initialize.php';


// Log out the admin
$session->logout();

redirect_to(url_for('/logowanie'));

?>
