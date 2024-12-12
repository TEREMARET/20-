<head>
    <title>20</title>
    <meta charset="utf-8">
</head>
<table border="1">
    <tr>
	    <td>Преподаватель</td>
		<td>Количество студентов у преподавателя</td>
	</tr>
<?php
$conn = new mysqli('localhost', 'root', '', 'school_management');

$sql = "SELECT teachers.name AS teacher_name, COUNT(student_courses.student_id) AS total_students 
        FROM teachers 
        JOIN courses ON teachers.id = courses.teacher_id 
        JOIN student_courses ON courses.id = student_courses.course_id 
        GROUP BY teachers.id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>"."<td>".$row["teacher_name"]."</td>"."<td>". $row["total_students"]."</td>"."</tr>";
    }
} else {
    echo "Нечего показывать.";
}
$conn->close();
?>
</table>