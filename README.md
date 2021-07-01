# mô tả: form đơn giản dùng để đăng nhập và đăng ký tài khoản.
# các bước chạy chương trình:
* tạo data base có tên là test gồm bảng user và reset_password
* code tạo bảng trong database:
` CREATE TABLE IF NOT EXISTS `user` (
` `id` int(11) NOT NULL AUTO_INCREMENT,
` `username` varchar(15) NOT NULL,
` `password` varchar(50) NOT NULL,
` `email` varchar(100) NOT NULL,
` PRIMARY KEY (`id`)
` ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;
* tải PHPMailer 5 và copy vào thư mục lib
