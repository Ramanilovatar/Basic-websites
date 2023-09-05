<?php
include_once 'database/db.php';
$connect = config();
$massage = null;
if (isset($_POST['btn'])) {
    $frm = $_POST['frm'];
    $sql = "SELECT * FROM users_tbl WHERE username='$frm[username]'";
    $row = mysqli_query($connect, $sql);
    $res = mysqli_fetch_assoc($row);
    if ($res['password'] == $frm['password']) {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $frm['username'];
        $_SESSION['password'] = $frm['password'];
        // start_cookie
        if (isset($_POST['remember'])) {
            setcookie('user_remember', $_SESSION['username'], time() + (60 * 60), '/');
            setcookie('pass_remember', $_SESSION['password'], time() + (60 * 60), '/');
        }
        header("location:index.php");
    } else {
        $massage = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" href="images/favicon_ico/log.ico">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<h2>ورود</h2>
<div class="login">
    <form method="POST">
        <label><b>نام کاربری
            </b>
        </label>
        <input type="text" name="frm[username]" class="input" placeholder="نام کاربری" required>
        <br><br>
        <label><b>رمز عبور
            </b><br>
        </label>
        <input type="Password" name="frm[password]" class="input" placeholder="رمز عبور" required>
        <br><br><br>
        <input type="submit" name="btn" class="btn" value="ورود">
        <br><br>
        <input type="checkbox" name="remember">
        <span>مرا به خاطر بسپار</span>
        <br><br>
        <a href="form.php" class="register-btn">ثبت نام</a>
    </form>
</div>
</body>
<?php if ($massage) { ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'error',
            title: 'کاربر مورد نظر یافت نشد'
        })
    </script>
<?php } ?>
</html>