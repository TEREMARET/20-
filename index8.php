<head>
    <title>8</title>
    <meta charset="utf-8">
</head>
<table border="1" height='20px'>
    <tr>
	    <td>Название курса</td>
		<td>Количество студентов на курсе</td>
	</tr>
<?php
$conn = new mysqli('localhost', 'root', '', 'school_management');

$sql = "SELECT courses.name AS course_name, COUNT(student_courses.student_id) AS student_count 
        FROM courses 
        LEFT JOIN student_courses ON courses.id = student_courses.course_id 
        GROUP BY courses.name";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>"."<td>".$row["course_name"]."</td>"."<td>". $row["student_count"]."</td>"."</tr>";
    }
} else {
    echo "Нечего выводить.";
}

$conn->close();
?>
</table>