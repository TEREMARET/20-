<head>
    <title>9</title>
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

Введите id студента, которого нужно удалить
<form method="post">
    <input name="name" id="name" type="number">
	<button type="submit">Отчислить!</button>
</form>
</body>

<?php
$conn = new mysqli('localhost', 'root', '', 'school_management');

if (isset($_POST['name'])) {
	if ($_POST['name']!=''){
	    $stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
        $stmt->bind_param("i", $id);
		
		$stmt2 = $conn->prepare("DELETE FROM student_courses WHERE student_id = ?");
        $stmt2->bind_param("i", $id);
		
        $id = $_POST['name'];
		
		$stmt2->execute();
        $stmt->execute();
        $stmt2->close();
		$stmt->close();
		
		$conn->close();
		
	    header("Location: " . $_SERVER['PHP_SELF']);}
	else {echo 'Введите id!';};
}
?>