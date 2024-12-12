<head>
    <title>11</title>
    <meta charset="utf-8">
</head>
<body>

<table border="1">
    <tr>
	    <td>Преподаватель</td>
		<td>Курс</td>
	</tr>
<?php
$conn = new mysqli('localhost', 'root', '', 'school_management');

$sql = "SELECT teachers.name AS teacher_name, courses.name AS course_name 
        FROM teachers 
        LEFT JOIN courses ON teachers.id = courses.teacher_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>"."<td>".$row["teacher_name"]."</td>"."<td>". $row["course_name"]."</td>"."</tr>";
    }
} else {
    echo "Нечего показывать.";
}

$conn->close();
?>
</table>
</body>