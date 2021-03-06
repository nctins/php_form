<?php
session_start();
if(isset($_SESSION['username'])){
    header('location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>signup Page</title>
   	<meta charset="utf-8">
   	<meta lang="vi">

	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" href="../css/style.css">
	

</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Đăng Ký</h3>
			</div>
			<div class="card-body">
				<form action="" method="post">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="username" class="form-control" placeholder="tên đăng nhập">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="password" class="form-control" placeholder="mật khẩu">
					</div>
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-envelope-square"></i></span>
						</div>
						<input type="email" name="email" class="form-control" placeholder="email của bạn">
					</div>
					<div class="form-group d-flex justify-content-center">
						<input type="submit" name="signup" value="Đăng ký" class="btn login_btn">
					</div>
					<?php
                        include 'connect.php';
                        if(isset($_POST['signup'])){
                            $username=$_POST['username'];
                            $password=$_POST['password'];
                            $email=$_POST['email'];
                            if($username==""||$password==""||$email==""){
                                echo '<p style="color: whitesmoke"> chưa điền đầy đủ thông tin</p>';
                            }
                            else{
                                $sql = "INSERT INTO `user` (username, password, email) VALUES ('$username','$password','$email')";
                                $query = mysqli_query($connect,$sql);
                                echo '<p style="color: whitesmoke"> đăng ký thành công</p>';
                            }
                        }
					?>
				</form>
			</div>
		</div>
	</div>
</div>
</body>

</html>