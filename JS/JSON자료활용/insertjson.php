<html>
    <body>
<?php
    $conn = mysqli_connect("164.125.36.78", "ID(학번)", "비밀번호", "DB이름","포트");
    if (!$conn){
        die("Failed to connect to MYSQL");
    }
    if (mysqli_query($conn, "insert into studentsjson set jsondata = '".$_POST['jsonstring']."'") !== TRUE)
    {
        die("Failed to Insert Data");
    }
    echo "1 record added.<br/><br/>";
?>
    </body>
</html>