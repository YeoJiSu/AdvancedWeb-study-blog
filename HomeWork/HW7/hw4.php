<html>

<body>
    <?php

    //DB 접속하기 
    echo "<br/>";
    $mysqli = new mysqli("164.125.36.78", "202055565", "@hd2061301", "db","3306");
    if ($mysqli->connect_errno){
        die("Failed to connect to MySQL");
    }
    else{
        echo "Connect to MySQL !!";
    }

    $xmlList="";
    if ($result = $mysqli->query("select * from students")) {
        //결과를 1 row 단위로 얻어와서 출력
        while ($data = $result->fetch_array()){
            $studentID = $data['studentID'];
            $name = $data['name'];
            $phonenum = $data['phonenum'];

            //DB 정보로 XML 문서의 element 구성하기 
            $List = "<students>
            <studentID>$studentID</studentID>
            <name>$name</name>
            <phonenum>$phonenum</phonenum>
            </students>";
            $xmlList = $xmlList.$List;
        }
        //결과 객체를 해제
        $result->close();
        //DB 연결을 해제
        $mysqli->close();
    }
    $xmlDoc = "<?xml version = '1.0'?>
    <!DOCTYPE db SYSTEM 'http://164.125.36.78/202055565/HW4/article.dtd'> <db>$xmlList</db>";

    $fp = fopen("article.xml","w") or die("Unable to open file!");
    fwrite($fp,$xmlDoc);
    fclose($fp);
    ?>
    <a href="http://164.125.36.78/202055565/HW4/article.xml">xml 파일 보기 </a>
    <a href="http://164.125.36.78/202055565/HW4/XMLDOMTraversal.html">XML dom 분석하기 </a>



</body>

</html>