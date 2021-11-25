<html>

<body>
    <?php
    
    //DB 접속하기 
    echo "<br/>";
    $mysqli = new mysqli("164.125.36.78", "202055565", "202055565", "db","3306");
    if ($mysqli->connect_errno){
        die("Failed to connect to MySQL");
    }
    else{
        echo "환영합니다 !!";
    }

    //DB 내 students 이라는 테이블 생성하기 
    // echo "<br/>";
    
    // $sql = "CREATE TABLE students(
    //     id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    //     studentID VARCHAR(30),
    //     name VARCHAR(30),
    //     phonenum VARCHAR(30),
    //     reg_date TIMESTAMP
    // )";
    
    // if ($mysqli->query($sql)===TRUE){
    //     echo "Table Example created successfully";
    // }else {
    //     // 이미 테이블이 존재한다면 error 메세지를 출력
    //     echo "Error creating table".$mysqli->error;
    // }
    
    //DB에 post로 데이터 추가 
    echo "<br/>";
    if ($mysqli->query("insert into students set studentID = '".$_POST['studentID']."', 
    name = '".$_POST['name']."', phonenum = '".$_POST['phonenum']."'")!==TRUE)
    {
        die("Failed to Insert Data");
    }
    //echo "1 record added.<br/><br/>";         

?>


    <table border=1>
        <tr>
            <td>학번</td>
            <td>이름</td>
            <td>휴대폰번호</td>
        </tr>


        <?php
        
    //DB에서 데이터 선택하여 출력하기 
    if ($result = $mysqli->query("select * from students")) {
        //결과를 1 row 단위로 얻어와서 출력
        while ($data = $result->fetch_array()){
            echo "<tr>";
            echo "<td>".$data['studentID']."</td>";
            echo "<td>".$data['name']."</td>";
            echo "<td>".$data['phonenum']."</td>";
            echo "</tr>";
        }
        //결과 객체를 해제
        $result->close();
        //DB 연결을 해제
        $mysqli->close();
    }
?>
    </table>

</body>

</html>