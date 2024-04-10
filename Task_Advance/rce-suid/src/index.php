<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
</head>
<body>
<center>
    <br>
    <h1>Welcome</h1>
    <h2>upload&bypass<h2><br>
    <hr><br>
    <form action="/" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <input type="file" name="file" id="file"><br><br>
        <input type="submit" name="submit" value="Upload!!!">
    </form><br>
    <?php
        $file = $_FILES["file"];
        if(!empty($_FILES["file"])){
            $fileName='./upload/'.$file['name'];
            $extension = @strtolower(end(explode('.',$_FILES['file']['name'])));
            if(preg_match("/ph/i",$extension)){
                die("你打不开的，别试了");
            }
            $content = file_get_contents($_FILES["file"]["tmp_name"]);
            if(preg_match("/\<\?/i",$content)){
                die("这不还是php?");
       
            }else{
                    move_uploaded_file($file['tmp_name'],$fileName); 
                    echo "upload successful: /upload/" . $file["name"] . "<br>";
            }
        }
    ?>
    <br>

</center>
</body>
</html>
