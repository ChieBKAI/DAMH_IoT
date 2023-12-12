<?php
// Thông tin kết nối MySQL
define('DB_SERVER', 'sql301.infinityfree.com'); // Tên máy chủ MySQL
define('DB_USERNAME', 'if0_35447870'); // Tên người dùng MySQL
define('DB_PASSWORD', '7a6ZBYU0IROhU'); // Mật khẩu MySQL
define('DB_DATABASE', 'if0_35447870_db_admin'); // Tên cơ sở dữ liệu MySQL

// Kết nối tới MySQL
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

// Kiểm tra kết nối
if ($conn === false) {
    die("Connect error: " . mysqli_connect_error());
} else {
    // echo "Connect successfully"; 
}
?>
