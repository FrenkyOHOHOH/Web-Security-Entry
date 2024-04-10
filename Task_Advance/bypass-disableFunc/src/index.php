<?php
highlight_file(__FILE__);
// you can see the disable_functions in phpinfo.php, bypass them then read /flag
if(isset($_POST['password'])&&isset($_POST['e_v.a.l'])){
    $password=md5($_POST['password']);
    echo $password."<br>";
    $code=$_POST['e_v.a.l'];
    echo $code."<br>";
    if(substr($password,0,6)==="c4d038"){
        echo "yes<br>";
        if(!preg_match("/flag|system|pass|cat|ls/i",$code)){
            eval($code);
        }
    }
}