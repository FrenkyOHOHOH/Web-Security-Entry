<?php
error_reporting(0);
session_start(); // 开始session

// 检查是否有按钮点击事件，如果是则重新生成题目
if (isset($_POST['generate'])) {
    // 清除当前题目，以便生成新题目
    $_SESSION['operatorSign'] = '';
    unset($_SESSION['number1'],$_SESSION['number2'], $_SESSION['operator'],$_SESSION['result']);
}

// 检查session中是否有存储的题目，如果没有则生成新的题目
if (!isset($_SESSION['number1']) || !isset($_SESSION['number2']) || !isset($_SESSION['operator']) || !isset($_SESSION['result'])) {
    // 生成两个随机数和一个随机运算符（不包括除法）
    $_SESSION['number1'] = rand(1, 99);
    $_SESSION['number2'] = rand(1, 99);
    $_SESSION['operator'] = rand(0, 1); // 只包括加法和减法

    // 根据随机运算符来计算结果，并确保结果大于10
    do {
        switch ($_SESSION['operator']) {
            case 0: // 加法
                $_SESSION['result'] =$_SESSION['number1'] + $_SESSION['number2'];
                $_SESSION['operatorSign'] = '+';
                break;
            case 1: // 减法
                // 确保减法结果不为负数且大于10
                $_SESSION['number1'] = rand(11, 99);
                $_SESSION['number2'] = rand(1,$_SESSION['number1'] - 10);
                $_SESSION['result'] =$_SESSION['number1'] - $_SESSION['number2'];
                $_SESSION['operatorSign'] = '-';
                break;
            default:
                $_SESSION['result'] = 0;
                $_SESSION['operatorSign'] = '';
        }
    } while ($_SESSION['result'] <= 10); // 如果结果小于等于10，重新生成题目
}

// 检查用户是否提交了答案
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ans'])) {
    $userAnswerEncrypted =$_POST['ans'];

    // 对存储的答案进行SHA-256加密
    $correctAnswerEncrypted = hash('sha256',$_SESSION['result']);


    // 判断用户答案是否正确
    if ($userAnswerEncrypted ==$correctAnswerEncrypted) {
        echo "<h1>成功！你的flag是：GWHT{flag}</h1>";
        // 清除当前题目，以便生成新题目
        $_SESSION['operatorSign'] = '';
        unset($_SESSION['number1'],$_SESSION['number2'], $_SESSION['operator'],$_SESSION['result']);
    } else {
        echo "<h1>请重新计算。</h1>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>运算小游戏</title>
    <script src="js/crypto-js.min.js"></script>
    <script src="js/bypass.js"></script>
</head>
<body>
<form method="post" action="">
    <input type="hidden" name="generate" value="1">
    <button type="submit">随机生成题目</button>
</form>
<p>随机加减运算：<?= $_SESSION['number1'] . ' ' .$_SESSION['operatorSign'] . ' ' . $_SESSION['number2'] ?></p>
<form method="post" action="" onsubmit="return encryptAnswer();">
    你的答案：<input type="text" maxlength='1' name="ans" id="ans" oninput="limitInputLength(this, 1)">
    <input type="submit" value="提交">
</form>
<!-- 随机生成题目按钮 -->
<p>猜猜为什么只能输入一个字符？学习一下html标签和前端js绕过。</p>
<p>温馨提示：建议不要用屏蔽js的方式来做这题，这样做起来会很麻烦，除非你阅读源码理解js干了什么</p>
</body>
</html>
