 
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

    $sql = "CREATE TABLE final_json (
        id INT(40) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        jsondata JSON NULL,
        reg_date TIMESTAMP
    )";
    
    if ($mysqli->query($sql)===TRUE){
        echo "Table Example created successfully";
    }else {
        // 이미 테이블이 존재한다면 error 메세지를 출력
        echo "Table already existed";
    }

    if ($mysqli->query("insert into final_json set jsondata = '".$_POST['jsonstring']."'")!==TRUE)
    {
        die("Failed to Insert Data");
    }
    echo "1 record added.<br/><br/>";
    if ($result = $mysqli->query("select * from final_json")) {
        while ($data = $result->fetch_array()){
            
            $json = $data['jsondata'];
            $arr = json_decode($json);
            echo "디비 내용 공개";
           echo "$arr->title";
           echo "$arr->date";
           echo "$arr->url";
           echo "$arr->title";
           echo "$arr->describe";
           echo "$arr->parent";
           echo "<br><br><br>";


        }
        //결과 객체를 해제
        $result->close();
        //DB 연결을 해제
        $mysqli->close();
    }



?>