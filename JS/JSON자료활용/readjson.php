<?php
    $conn = mysqli_connect("164.125.36.78", "ID(학번)", "비밀번호", "DB이름","포트");
    if (!$conn){
        echo "Failed to create Table";
    }
    $key = 0;
    $result = mysqli_query($conn, "select jsondata from studentsjson");
    while($row = mysqli_fetch_array($result)){
        $key+=1;
        $data = $row[ 'jsondata' ];
        echo "<script language='Javascript'>sessionStorage.setItem('$key', '$data');</script>";
    }
    echo "<script lanuage='Javascript'>sessionStorage.setItem(0, '$key');</script>";
?>
<html>
    <body>
        <script>
            function start(){
                var num = Number(sessionStorage.getItem('0'));
                for(var i=1;i<=num;i++){
                    const now = JSON.parse(sessionStorage.getItem(String(i)));
                    document.write(" StudentID : "+now.studentID+" Name : "+now.name+" PhoneNumber : "+now.phonenum+'<br>');
                }
            }
            window.addEventListener("load", start, false);
        </script>
    </body>
</html>