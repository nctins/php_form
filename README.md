# mô tả: form đơn giản dùng để đăng nhập và đăng ký tài khoản.
# các bước chạy chương trình:
* tạo data base có tên là test gồm bảng user và reset_password
* code tạo bảng trong database:
```
` CREATE TABLE IF NOT EXISTS `user` (
` `id` int(11) NOT NULL AUTO_INCREMENT,
` `username` varchar(15) NOT NULL,
` `password` varchar(50) NOT NULL,
` `email` varchar(100) NOT NULL,
` PRIMARY KEY (`id`)
` ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;

CREATE TABLE `reset_pass` (
  `id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `m_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `m_token` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `m_time` bigint(20) NOT NULL,
  `m_numcheck` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
```
* tải PHPMailer 5 (link: <https://freetuts.net/download?id=400>) và copy vào thư mục lib
