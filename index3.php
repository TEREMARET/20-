<head>
    <title>3</title>
    <meta charset="utf-8">
</head>
<table border="1">
    <tr>
	    <td>ID</td>
		<td>Имя</td>
		<td>ID группы</td>
	</tr>
<?php
$conn = new mysqli('localhost', 'root', '', 'school_management');

$sql = "SELECT * FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>"."<td>".$row["id"]."</td>"."<td>". $row["name"]."</td>"."<td>".$row["group_id"]."</td>"."</tr>";
    }
} else {
    echo "Нет студентов.";
}

$conn->close();
?>
</table>