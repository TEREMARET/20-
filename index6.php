<head>
    <title>6</title>
    <meta charset="utf-8">
</head>
<table border="1" height='20px'>
    <tr>
	    <td>Имя</td>
		<td>Группа</td>
	</tr>
<?php
$conn = new mysqli('localhost', 'root', '', 'school_management');

$sql = "SELECT students.name AS student_name, groups.name AS group_name 
        FROM students 
        LEFT JOIN groups ON students.group_id = groups.id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>"."<td>".$row["student_name"]."</td>"."<td>". $row["group_name"]."</td>"."</tr>";
    }
} else {
    echo "Нечего выводить.";
}

$conn->close();
?>
</table>