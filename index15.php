<head>
    <title>15</title>
    <meta charset="utf-8">
</head>
<body>
Введите имя преподавателя
<form method="post">
    <input name="name" id="name" type="text">
	<button type="submit">Добавить</button>
</form>
</body>

<?php
$conn = new mysqli('localhost', 'root', '', 'school_management');

if (isset($_POST['name'])) {
	if ($_POST['name']!=''){
	    $stmt = $conn->prepare("INSERT INTO teachers (name) VALUES (?)");
        $stmt->bind_param("s", $name);

        $name = $_POST['name'];
        $stmt->execute();

        $stmt->close();
	    header("Location: " . $_SERVER['PHP_SELF']);}
	else {echo 'Введите имя!';};
}
?>