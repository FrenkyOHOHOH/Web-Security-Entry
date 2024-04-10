<?php
$flag='GWHT{flag}';
setcookie('GWHT','1919810');
if(isset($_POST['username'])){
    echo "Hello ".$_POST['username']."! Welcome to Web Security Entry Platform，你将在这个环境里学习一些HTTP知识。<br>";
}else{
    die("请通过POST方法告诉我你的username！");
}

if($_SERVER['HTTP_USER_AGENT']=='GWHT'){
    echo "哦，你看上去是用GWHT浏览器访问的<br>";
    if($_SERVER['HTTP_CLIENT_IP']=='127.0.0.1'||$_SERVER['HTTP_X_FORWARDED_FOR']=='127.0.0.1'){
        echo "看上去你确实是从本地发起访问的<br>";
        if($_SERVER['HTTP_REFERER']=='gdufs.edu.cn'){
            echo "你来自确实是从广外来的<br>";
            if($_COOKIE['GWHT']=='114514'){
                echo "恭喜你，你现在应该了解了一些HTTP知识了！下面是你的flag<br>";
                echo $flag;
                die();
            }
            echo "Q: 你知道Cookie吗？请给我十一万四千五百一十四个GWHT饼干！";
            die();
        }
        echo 'Q: 你知道referer吗？你不是来自gdufs.edu.cn的';
        die();
    }
    echo 'Q: 你知道X_Forwarded_For吗？你不在本地，你到底在哪！';
    die();
}
echo "Q: 你知道UA头吗？你不是用GWHT浏览器访问的！";
?>