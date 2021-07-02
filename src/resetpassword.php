<!DOCTYPE html>
<html>
<head>
    <title>reset password</title>
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
                <h3>Thay đổi mật khẩu</h3>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="newpass" class="form-control" placeholder="nhập mật khẩu mới của bạn">
                    </div>
                    <div class="form-group d-flex justify-content-center">
                        <input type="submit" name="reset" value="OK" class="btn login_btn">
                    </div>
                    <?php
                    include 'connect.php';
                    if(isset($_GET['email']) && isset($_GET['token'])){
                        $email=base64_decode($_GET['email']);
                        $token=$_GET['token'];
                        $sql = "SELECT * FROM `reset_pass` WHERE m_email='$email'AND m_token='$token' ";
                        $query = mysqli_query($connect,$sql);
                        $num= mysqli_num_rows($query);
                        if($num!=0){
                            if(isset($_POST['reset'])){
                                $newpass= $_POST['newpass'];
                                $sql = "UPDATE `user` SET password='$newpass' WHERE email='$email'";
                                $query = mysqli_query($connect,$sql);
                                echo '<p style="color: whitesmoke"> thay đổi mật khẩu thành công </p>';
                            }
                        }
                        else{
                            echo '<p style="color: whitesmoke"> token không đúng </p>';
                        }
                    }
                    else{
                        echo '<p style="color: whitesmoke"> có lỗi xảy ra </p>';
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>