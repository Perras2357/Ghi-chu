<?php
/**
 * controllers/login.php
 * Controller for handling login form display and authentication.
 * Place this file in the controllers directory.
 * It is called when the user accesses the "login" route.
 */

session_start(); // Bắt đầu session để quản lý trạng thái đăng nhập

// Nếu người dùng đã đăng nhập rồi, chuyển hướng về trang chính để tránh đăng nhập lại
if (isset($_SESSION['user_id'])) {
    header("Location: index.php?page=home"); // điều hướng đến trang chủ (hoặc trang quản lý ghi chú)
    exit;
}

// Include config (thiết lập kết nối cơ sở dữ liệu, v.v.)
require_once __DIR__ . '/../app/config.php'; 

// Khởi tạo các biến lưu giá trị form và thông báo lỗi
$email = "";
$error_message = "";
$error_email = "";
$error_password = "";

// Xử lý khi người dùng gửi form (REQUEST_METHOD == POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form và loại bỏ khoảng trắng thừa
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    // Kiểm tra dữ liệu hợp lệ (các trường không được rỗng)
    if (empty($email) || empty($password)) {
        $error_message = "Veuillez remplir tous les champs."; // Thông báo: "Vui lòng điền đầy đủ các trường."
    } else {
        // Chuẩn bị truy vấn kiểm tra người dùng theo email
        $stmt = $pdo->prepare("SELECT * FROM user WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$user) {
            // Email không tồn tại trong database
            $error_email = "Vous n’avez pas de compte. <a href='index.php?page=register'>Créer un compte</a>";
        } else {
            // So sánh mật khẩu nhập vào với mật khẩu lưu trong DB (giả sử đã được hash)
            if (!password_verify($password, $user['password'])) {
                // Mật khẩu không đúng
                $error_password = "Mot de passe incorrect, veuillez réessayer.";
                // Xoá giá trị mật khẩu đã nhập để người dùng nhập lại
                $password = "";
            } else {
                // Thông tin đăng nhập chính xác – tạo session cho người dùng
                $_SESSION['user_id']    = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                // (Nếu bảng user có các thông tin khác như tên, ta có thể lưu vào session để hiển thị nếu cần)

                // Lưu thời điểm đăng nhập để phục vụ kiểm tra phiên hết hạn (auto-logout)
                $_SESSION['last_activity'] = time();
                
                // Chuyển hướng người dùng đến trang sau khi đăng nhập (ví dụ: trang chủ hoặc dashboard)
                header("Location: index.php?page=home");
                exit;
            }
        }
    }
}

// Tải view trang đăng nhập để hiển thị form và thông báo (nếu có)
include __DIR__ . '/../views/login.php';
?>
