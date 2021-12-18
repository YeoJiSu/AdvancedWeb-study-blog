<html>

<head>
    <meta charset="utf-8" />
</head>

<body>
    <?php
    echo "<br/>";

    $mysqli = new mysqli("164.125.36.78", "202055565", "@hd2061301", "202055565","3306");
    if ($mysqli->connect_errno){
        die("Failed to connect to MySQL");
    }
    else{
        echo "Connect to MySQL !!";
    }
    echo "<br/>";

    $sql = "CREATE TABLE my_json (
        id INT(40) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        json_data JSON NULL,
        reg_date TIMESTAMP
    )";
    
    if ($mysqli->query($sql)===TRUE){
        echo "Table Example created successfully";
    }else {
        // 이미 테이블이 존재한다면 error 메세지를 출력
        echo "Table already existed";
    }

    //--------------NO.1------------------------------------------------------------------------
    
    // DB에 JSON형태의 데이터를 저장하기

    $value1 = $_POST['subject1'];
    $value2 = $_POST['subject2'];
    $value3 = $_POST['subject3'];
    echo "<br>";
    $array = array("sub1"=> "$value1","sub2"=> "$value2","sub3"=> "$value3");
    $json = json_encode($array) ;

    if ($mysqli->query("INSERT INTO my_json (json_data) VALUES ('".$json."')")!==TRUE)
    {
        die("Failed to Insert Data");
    }
    echo "1 record added.<br/><br/>";


    $myfile = fopen("json.txt", "w") or die("Unable to open file!");

    
    if ($result = $mysqli->query("select * from my_json")) {
        //결과를 1 row 단위로 얻어와서 출력
        while ($data = $result->fetch_array()){
            setcookie($data['id'], $data['json_data'], time()+3600,"/");
            fwrite($myfile,$data['json_data']);
        }
        //결과 객체를 해제
        $result->close();
        //DB 연결을 해제
        $mysqli->close();
    }
    fclose($myfile);


   
    

?>
    <br><br><br>
    <?php
    foreach($_COOKIE as $key => $value) { 
        print("<P> 쿠키 이름 : $key , 쿠키 값: $value </P>");   
}
?>

</body>

</html>