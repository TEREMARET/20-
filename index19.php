<head>
    <title>19</title>
    <meta charset="utf-8">
</head>
<h4>Студенты, зарегистрированные на нескольких курсах:</h4>
<?php
$conn = new mysqli('localhost', 'root', '', 'school_management');

$sql = "SELECT students.name AS student_name, COUNT(student_courses.course_id) AS course_count 
        FROM students 
        JOIN student_courses ON students.id = student_courses.student_id 
        GROUP BY students.id 
        HAVING course_count > 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row["student_name"]."<br>";
    }
} else {
    echo "Нет студентов.";
}

$conn->close();
?>