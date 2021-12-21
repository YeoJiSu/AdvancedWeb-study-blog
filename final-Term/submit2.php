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

    $xmlList="";
    if ($result = $mysqli->query("select * from final_json")) {
        while ($data = $result->fetch_array()){
            
            $json = $data['jsondata'];
            $arr = json_decode($json);

           
           $title = $arr->title;
           $date = $arr->date;
           $url =$arr->url;
           $describe =$arr->describe;
           $parent =$arr->parent;
           
           $List = "<files>
            <title>$title</title>
            <date>$date</date>
            <url>$url</url>
            <describe>$describe</describe>
            <parent>$parent</parent>
            </files>";
            $xmlList = $xmlList.$List;
        }
        //결과 객체를 해제
        $result->close();
        
        
    }
    $xmlDoc = "<?xml version = '1.0'?>
    <!DOCTYPE file SYSTEM 'http://164.125.36.78/202055565/test/file.dtd'> <file>$xmlList</file>";
    $fp = fopen("file.xml","w") or die("Unable to open file!");
    fwrite($fp,$xmlDoc);
    fclose($fp);

    // $sql = "CREATE TABLE XMLwith (
    //     id INT(40) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    //     XMLData XML,
    //     reg_date TIMESTAMP
    // )";
    
    //  if ($mysqli->query($sql)===TRUE){
    //     echo "Table Example created successfully";
    // }else {
    //     // 이미 테이블이 존재한다면 error 메세지를 출력
    //     echo "Table already existed";
    // }
    
    // if ($mysqli->query("load xml local infile './file.xml' into table XMLwith rows identified by '<file>'")!==TRUE)
    // {
    //     die("Failed to Insert Data");
    // }
    // echo "DATABASE 에 xml을 성공적으로 저장했습니다.";
    $mysqli->close();



?>
<h4>xml파일로 저장</h4>
<a href="http://164.125.36.78/202055565/test/file.xml"> 생성된 xml 파일 보기</a>
</body>

<br>
<script>
    
    function loadXMLDocument(  )
{
   var xmlHttpRequest = new XMLHttpRequest();
   xmlHttpRequest.open( "get",  'file.xml', false );
   xmlHttpRequest.send( null );
   var doc = xmlHttpRequest.responseXML;
   
} 
</script>

</html>