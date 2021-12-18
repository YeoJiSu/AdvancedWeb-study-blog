<html>

<head>
    <meta charset="utf-8" />
</head>

<script>
let data = {
    userId: 1,
    title: 'what',
    body: '???????'
}
const jsonStr = JSON.stringify(data);
localStorage.clear();
localStorage.setItem("json", jsonStr);

var json_value = localStorage.getItem("json");
alert(json_value);

var result = JSON.parse(json_value);
var val =
    result.userId + " " +
    result.title + " " +
    result.body;
console.log(val);
</script>

<body>

</body>

</html>