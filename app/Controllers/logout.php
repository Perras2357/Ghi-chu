<?php
/**
 * controllers/logout.php
 * Controller for logging out the user.
 * Place this file in the controllers directory.
 * This is called when the user accesses the "logout" route.
 */

session_start();

session_unset();
session_destroy();


header("Location: index.php?r=login");
exit;
?>
