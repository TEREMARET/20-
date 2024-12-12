<head>
    <title>16</title>
    <meta charset="utf-8">
</head>
<body>
Введите название курса
<form method="post">
    <input name="name" id="name" type="text">
	<button type="submit">Отправить</button>
</form>
</body>

<?php
$p1=0;
if (isset($_POST['name'])){
if ($_POST['name']!=""){
	$conn = new mysqli('localhost', 'root', '', 'school_management');
	$sql = "
	    SELECT students.name AS student_name, students.id AS student_is, courses.name AS course_name
		FROM students
        LEFT JOIN student_courses ON students.id =student_courses.student_id
        LEFT JOIN courses ON student_courses.course_id = courses.id";

	$result = $conn->query($sql);

	while ($row = $result->fetch_assoc())
	    {if ($row["course_name"]==$_POST['name'])
			{echo 
			    $row["student_name"]."<br>";
				$p1=1;}
		}
	if($p1==0){echo "Не найдено";}
	
	$conn->close();
}
else{echo "Введите название!";}}
?>