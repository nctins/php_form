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
    <link rel="stylesheet" href="../css/styles.css">


</head>
<body>
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Nhập email của bạn</h3>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope-square"></i></span>
                        </div>
                        <input type="email" name="email" class="form-control" placeholder="email của bạn">
                    </div>
                    <div class="form-group d-flex justify-content-center">
                        <input type="submit" name="OK" value="OK" class="btn login_btn">
                    </div>
                    <?php
                    include 'connect.php';
                    include 'sendmail.php';
                    if(isset($_POST['OK'])){
                        $email=$_POST['email'];
                        if($email==""){
                            echo '<p style="color: whitesmoke"> chưa điền đầy đủ thông tin </p>';
                        }
                        else{
                            $sql = " SELECT * FROM `user` WHERE email='$email'";
                            $query = mysqli_query($connect,$sql);
                            $num = mysqli_num_rows($query);
                            if($num!=0){
                                $token = substr(md5(rand(1,100000)),0,20);
                                $time = time();
                                $insert_sql = "INSERT INTO `reset_pass`(m_email,m_token,m_time) VALUES ('$email','$token','$time')";
                                $insert_query = mysqli_query($connect,$insert_sql);
                                $encmail = base64_encode($email);
                                // gửi mail
                                $link = "resetpassword.php?email=".$encmail."&token=".$token;
                                $content = "<a href='$link'> bấm vào đây để đổi mật khẩu</a>";
                                $title = "đổi mật khầu";
                                $nTo="email được gởi từ admin";
                                $issend = sendMail($title,$content,$nTo, $email,'');
                                if($issend==1) echo ' <p style="color: whitesmoke"> đã gửi mail </p> ';
                                else echo ' <p style="color: whitesmoke"> chưa gửi được mail </p> ';

                            }
                            else{
                                echo '<p style="color: whitesmoke"> địa chỉ mail không đúng</p>';
                            }

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