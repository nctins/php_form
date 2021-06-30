<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   	<meta charset="utf-8">
   	<meta lang="vi">

	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" href="./css/style.css">
	

</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Đăng nhập</h3>	
			</div>
			<div class="card-body">
				<form action="index.php" method="post">
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
					<div class="d-flex justify-content-end links">
						<a href="#">quên mật khẩu?</a>
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Remember
					</div>
					<div class="form-group">
						<input type="submit" name="login" value="Login" class="btn float-right login_btn">
					</div>

                    <?php
                    include 'src/connect.php';
                    if(isset($_POST['login'])){
                        $username=$_POST['username'];
                        $password=$_POST['password'];
                        if($username==""||$password==""){
                            echo '<script language="JavaScript" > alert("chưa điền đầy đủ thông tin");</script>';
                        }
                        else{
                            $sql = "SELECT * FROM `member` WHERE username='$username' and password='$password'";
                            $query = mysqli_query($connect,$sql);
                            $num_row = mysqli_num_rows($query);
                            if($num_row != 0){
//                                echo '<script> alert("đăng nhập thành công");</script>';
                                $row = mysqli_fetch_assoc($query);
                                $_SESSION['username'] = $row['username'];
                                echo '<script> alert("đăng nhập thành công");</script>';
                            }
                            else{
                                echo '<script> alert("tên đăng nhập hoặc mật khẩu chưa đúng");</script>';
                            }
                        }
                    }
                    ?>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center">
					<a href="signup.php">tạo tài khoản mới</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>

</html>