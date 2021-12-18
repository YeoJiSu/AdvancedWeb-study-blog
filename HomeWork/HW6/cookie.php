<?php
    $cookie_name= $_POST['name'];
    $cookie_value = $_POST['value'];
    // 30일동안 쿠키 유지
    setcookie($cookie_name, $cookie_value, time()+ 3600,"/");
?>
<html>

<body>
    <?php
    foreach($_COOKIE as $key => $value) { 
        print("<P> 쿠키 이름 : $key , 쿠키 값: $value </P>");   
}
?>

</body>

</html>