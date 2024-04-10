<?php
error_reporting(0);
$flag = "flag{example}";
if(!session_id())
    session_start();

if(!isset($_SESSION['count']))
    $_SESSION['count']=0;

if(isset($_SESSION['answer']) && isset($_POST['answer'])){
    if(($_SESSION['answer'])!=$_POST['answer']){
        session_destroy();
        die('答案错误');
    }
    else{
        if(intval(time())-$_SESSION['time']<1){
            session_destroy();
            die('老头要加速了！');
        }
        if(intval(time())-$_SESSION['time']>2){
            session_destroy();
            die('快点，等的我花都谢了');
        }
        $_SESSION['count']++;
    }
}
if($_SESSION['count']>=19){
    session_destroy();
    echo $flag;
    die();
}
$num1=rand(0,1000);
$num2=rand(0,1000);
$num3=rand(0,1000);
$num4=rand(0,1000);
$mark=rand(0,3);
$ans = 0;
switch($mark){
    case 0:
        $ans=$num1+$num2-$num3*$num4;
        break;
    case 1:
        $ans=$num1*$num2+$num3-$num2;
        break;
    case 2:
        $ans=$num1*$num4*$num3-$num2;
        break;
    case 3:
        $ans=$num1+$num4+$num3*$num2;
        break;
}
$_SESSION['answer']=$ans;
$_SESSION['time']=intval(time());
?>
<h1>游戏规则</h1>

<p>请帮老头计算出下面式子的答案</p>
<p>在2s内提交你的答案，答对19次老头就会给你flag</p>
<p>由于老头不能加速，所以每题都要隔1s以上才能提交</p>
<p> 你已经回答了 <?php echo $_SESSION['count'];?>个问题</p>

<form action="" method="post">
<?php
$sentence="";
switch($mark) {
    case 0:
        $sentence = "$num1 + $num2 - $num3 * $num4";
        break;
    case 1:
        $sentence = "$num1 * $num2 + $num3 - $num2";
        break;
    case 2:
        $sentence = "$num1 * $num4 * $num3 - $num2";
        break;
    case 3:
        $sentence = "$num1 + $num4 + $num3 * $num2";
        break;
}
echo "<div".">".$sentence."="."?"."</div>";
?>
    <input type="text" name="answer">
    <input type="submit" value="提交">
</form>
