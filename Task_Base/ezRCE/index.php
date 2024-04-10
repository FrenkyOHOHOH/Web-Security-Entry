<?php
highlight_file(__FILE__);
if(isset($_POST['password'])&&isset($_POST['e_v.a.l'])){
    $password=md5($_POST['password']);
    echo $password."<br>";
    $code=$_POST['e_v.a.l'];
    echo $code."<br>";
    if($password==$_POST['password']){
        echo "yes<br>";
        if(!preg_match("/flag|system|pass|cat|ls/i",$code)){
            eval($code);
        }
    }
}