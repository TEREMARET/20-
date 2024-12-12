<head>
    <title>12</title>
    <meta charset="utf-8">
</head>
<body>
Введите имя студента
<form method="post">
    <input name="name" id="name" type="text">
	<button type="submit">Отправить</button>
</form>
</body>

<?php
$p1=0;
if (isset($_POST['name'])){
	$conn = new mysqli('localhost', 'root', '', 'school_management');
	$sql = "
	    SELECT students.name AS student_name, students.id AS student_is, groups.name AS group_name, courses.name AS course_name
		FROM students
        LEFT JOIN groups ON students.group_id = groups.id
        LEFT JOIN student_courses ON students.id =student_courses.student_id
        LEFT JOIN courses ON student_courses.course_id = courses.id";

	$result = $conn->query($sql);

	while ($row = $result->fetch_assoc())
	    {if ($row["student_name"]==$_POST['name'])
			{echo 
			    "ID: ".$row["student_is"]."<br>".
			    "Имя: ". $row["student_name"]."<br>".
				"Группа: ".$row["group_name"]."<br>".
				"Курс: ".$row["course_name"];
				$p1=1;}
		}
	if($p1==0){echo "Не найдено";}
	
	$conn->close();
}
?>