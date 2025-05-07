<?php
/**
 * controllers/logout.php
 * Controller for logging out the user.
 * Place this file in the controllers directory.
 * This is called when the user accesses the "logout" route.
 */

session_start(); // Bắt đầu session (nếu chưa) để có thể hủy
// Hủy tất cả dữ liệu phiên đăng nhập
session_unset();
session_destroy();

// Chuyển hướng về trang đăng nhập sau khi đăng xuất
header("Location: index.php?page=login");
exit;
?>
