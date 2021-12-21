<?php
    setcookie("studentID", $_POST["studentID"], time()+60);
    setcookie("name", $_POST["name"], time()+60);
    setcookie("phonenum", $_POST["phonenum"], time()+60);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>Cookie Saved</title>
    </head>
    <body>
        <p>Cookie has been set</p>
    </body>
</html>
        