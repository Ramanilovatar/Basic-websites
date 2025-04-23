<?php
include_once 'database/db.php';
$connect = config();
$massage = null;
if (isset($_POST['btn'])) {
    $frm = $_POST['frm'];
    $sql = "INSERT INTO users_tbl (username,email,age,password) VALUES ('$frm[username]','$frm[email]','$frm[age]','$frm[password]')";
    mysqli_query($connect, $sql);
    $massage = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
    <link rel="stylesheet" href="css/register.css">
    <link rel="icon" href="images/favicon_ico/log.ico">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<h2>ثبت نام</h2>
<div class="login">
    <form method="POST">
        <label><b>نام کاربری/به انگلیسی</b></label>
        <input type="text" class="input" name="frm[username]" placeholder="نام کاربری" required>
        <label><b>ایمیل/اختیاری</b></label>
        <input type="email" class="input" name="frm[email]" placeholder="ایمیل">
        <label><b>سن/اختیاری</b></label>
        <input type="number" class="input" name="frm[age]" placeholder="سن">
        <label><b>رمز عبور</b></label>
        <input type="Password" class="input" name="frm[password]" placeholder="رمز عبور" required>
        <br><br>
        <input type="submit" class="btn" name="btn" value="ثبت نام">
        <br><br>
        <a href="login.php" class="login-btn">ورود</a>
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
            icon: 'success',
            title: 'ثبت نام با موفقیت انجام شد'
        })
    </script>
<?php } ?>
</html>