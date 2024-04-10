<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>登录页面</title>
    <script>
        function base64EncodePassword() {
            var passwordInput = document.getElementById('password');
            var encodedPassword = btoa(passwordInput.value);
            passwordInput.value = encodedPassword;
        }
    </script>
</head>
<body>
    <h2>登录</h2>

    <form action="" method="post" onsubmit="base64EncodePassword()">
        用户名：<input type="text" name="username"><br>
        密码：<input type="password" id="password" name="password"><br>
        <input type="submit" value="登录">
    </form>
</body>
</html>

<?php
$correct_username = "admin";$correct_password = "this_passwd";
$username =$_POST['username'];
$encoded_password =$_POST['password'];
$password = base64_decode($encoded_password);
if(isset($username) && isset($password)){
    if ($username ==$correct_username && $password ==$correct_password) {
        echo "登录成功，欢迎 " . $username . " 这是你的flag：flag{example}";
    } else {
        echo "登录失败，用户名或密码错误";
    }
}
?>
