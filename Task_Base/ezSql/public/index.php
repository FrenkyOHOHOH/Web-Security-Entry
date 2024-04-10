

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" type="image/png" href="./images/favicon.png">
        <title>GDUFS健康打卡查询</title>

        <!-- CSS -->
        <link href="./css/bootstrap.css" rel="stylesheet">
        <link href="./css/main.css" rel="stylesheet">
        
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
<style>
.animatedSearch {
    width: 50%;
    border: 1px solid #ccc;
    font-size: 1.2rem;
    border-radius: 5px;
    padding: 5px 8px;
    color: #333;
    transition: width 0.4s ease-in-out;
}

/**/
.animatedSearch:focus {
    width: 90%;
}
</style>
        <script src="./js/jquery-1.10.2.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <script src="./js/angular.js" type="text/javascript"></script>
        <script src="./js/angular-resource.js" type="text/javascript"></script>
        <script src="./js/angular-route.js" type="text/javascript"></script>
        <script src="./js/services.js" type="text/javascript"></script>
            </head>

    <body>

        

<div ng-controller="">
    <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">GDUFS健康打卡查询</a>
            </div>
            <div class="navbar-collapse collapse">
                <!--                <ul class="nav navbar-nav">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">帮助 <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">使用说明</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">关于我们</a></li>
                                        </ul>
                                    </li>
                                </ul>            -->
                <form class="navbar-form navbar-right" role="form" method="get" action="./index.php">
                <button type="submit" class="btn btn-primary">刷新</button>
                </form>
            </div>
        </div>
    </div>
    <div class="cpsbg">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8 whitebg">
                    <ul class="list-group">
                        <li class="list-group-item">
						<form action="index.php" method="get">
						<input type="text" class="animatedSearch" name="id"> 
						<button type="submit" class="btn btn-primary">查询</button>
                        </form>
                        </li>
                        
                    </ul>
                    <table class="table table-hover">
<thead>
<tr>
                    <th>第n次打卡</th>
                    <th>日期</th>

                    <th>时间</th>

                    </tr>
</thead>
<tbody>
<?php


$con = mysql_connect("127.0.0.1","root","root");
if (!$con){die('Could not connect: ' . mysql_error());}
$dbname1='cgctf';
mysql_select_db("cgctf", $con);
@mysql_select_db($dbname1,$con) or die ( "Unable to connect to the database: $dbname1".mysql_error());
$id = $_GET["id"];


if(isset($_GET["id"])){
    // echo $id;
    // echo "<br>";
    // echo $_SERVER['QUERY_STRING'];
    if(preg_match("/[\s#-]+/",$id)){
        die("NO!!! You are Hacker!!!");
    }
    $id = '"' . $id . '"';
    $query = "SELECT * FROM pcnumber WHERE id =($id)";
    // $query = "SELECT * FROM pcnumber WHERE id ='$id'";
    // echo $query;

    $result = mysql_query($query)or die('<pre>'.mysql_error().'</pre>');
    while($row = mysql_fetch_array($result))
      {
        echo '<tr class=" odd">
        <td arg="日期">'.$row['id'].'</td>
        <td arg="日期">'.$row['bigtime'].'</td>
       <td arg="时间">
       '.$row['smalltime'].'</td>
       </tr>
       ';
      }
    
}
else{
    $query = "select * from pcnumber order by id;";
    $result = mysql_query($query)or die('<pre>'.mysql_error().'</pre>');
    while($row = mysql_fetch_array($result))
      {
        echo '<tr class=" odd">
        <td arg="日期">'.$row['id'].'</td>
        <td arg="日期">'.$row['bigtime'].'</td>
       <td arg="时间">
       '.$row['smalltime'].'</td>
       </tr>
       ';
      }
}

?>
</tbody>
</table>

                </div>
                <div class="col-md-2">
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <hr />
        <footer>
            <p>GDUFS_GWHT &middot; 版权没有</p>
        </footer>
    </div>
</div>
    </body>
</html>









 
