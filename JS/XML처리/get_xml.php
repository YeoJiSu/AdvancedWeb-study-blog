<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        $my = new mysqli("164.125.36.78", "202055565", "@hd2061301", "202055565", "3306");
        if ($my->connect_errno){
            die("Failed to connect to MySQL");
        }
        $result = $my->query("select * from student");
        
        $xml = new XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString("\t");
        $xml->startDocument('1.0',"UTF-8");
        $xml->writeDtd('student',null,'dtd_file.dtd',null);
        
        $xml->startElement("students");
        $i=0;
        while($data = $result->fetch_array()){
            $xml->startElement("student");
            $xml->writeAttribute("num",$i);

            $xml->writeElement("name",$data['name']);
            $xml->writeElement("studentID",$data['studentID']);
            $xml->writeElement("sex",$data['sex']);
            $xml->endElement();

            $i++;
        }
        $xml->endElement();
        $xml->endDocument();
        $result = $xml->outputMemory();

        echo $result;
        file_put_contents("xmlData.xml",$result);
    ?>
</body>

</html>