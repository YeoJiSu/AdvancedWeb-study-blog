<html>
    <body>
<?php
    $conn = mysqli_connect("164.125.36.78", "ID(학번)", "비밀번호", "DB이름","포트");
    if (!$conn){
        echo "Failed to create Table";
    }
    if (mysqli_query($conn, "create table studentsjson (jsondata varchar(150) not null,".
        "primary key(jsondata))") !==TRUE)
        {
            echo "Failed to create Table";
        }
?>
    </body>
</html>