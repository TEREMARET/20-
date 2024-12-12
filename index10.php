<head>
    <title>10</title>
    <meta charset="utf-8">
</head>
<body>

<table border="1">
    <tr>
	    <td>ID</td>
		<td>Имя</td>
	</tr>
<?php
$conn = new mysqli('localhost', 'root', '', 'school_management');

$sql = "SELECT * FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>"."<td>".$row["id"]."</td>"."<td>". $row["name"]."</td>"."</tr>";
    }
} else {
    echo "Нет студентов.";
}

$conn->close();
?>
</table>
<br>

<form method="post" style='display:flex'>
    <div style='display:flex;flex-direction:column;'>
        Введите id студента
        <input name="idi" id="idi" type="number">
	</div>
	<div style='display:flex;flex-direction:column;'>
	    Введите новое имя студента
        <input name="name" id="name" type="text">
	</div>
	<button type="submit">Изменить имя</button>
</form>
</body>

<?php
$conn = new mysqli('localhost', 'root', '', 'school_management');

if (isset($_POST['name'])) {
	if ($_POST['idi']!='' and $_POST['name']!=''){
	    $stmt = $conn->prepare("UPDATE students SET name=? WHERE id=?");
        $stmt->bind_param("si",$name,$id);
		
        $id = $_POST['idi'];
		$name = $_POST['name'];
		
        $stmt->execute();
		$stmt->close();
		$conn->close();
		
	    header("Location: " . $_SERVER['PHP_SELF']);}
	else {echo 'Введите имя и id!';};
}
?>