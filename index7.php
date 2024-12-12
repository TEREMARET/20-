<head>
    <title>7</title>
    <meta charset="utf-8">
</head>
<body>
    <div style='display:flex'>
        <table border="1"  height='20px'>
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
					    echo "<tr>"."<td>".$row["id"]."</td>"."<td>". $row["name"]."</td>"."</tr>";}}
			    else {echo "Нет студентов.";}
			?>
        </table>
		
		<div style="width:20px"></div>
		
        <table border="1" height='20px'>
            <tr>
	            <td>ID</td>
		        <td>Имя группы</td>
	        </tr>
			<?php
				$sql = "SELECT * FROM courses";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						echo "<tr>"."<td>".$row["id"]."</td>"."<td>". $row["name"]."</td>"."</tr>";}}
				else {echo "Нет курсов.";}
				$conn->close();
			?>
        </table>
    </div>
	
	<br>
	<form method="post" style='display:flex'>
	    <div style='display:flex;flex-direction:column;'>
	        Введите id студента
            <input name="stud" id="stud" type="number">
		</div>
		
		<div style='display:flex;flex-direction:column;'>
		    Введите id курса
		    <input name="kurs" id="kurs" type="number">
		</div>
		
	    <button type="submit">Связать</button>
    </form>
	<?php
		$conn = new mysqli('localhost', 'root', '', 'school_management');

		if (isset($_POST['stud']) and isset($_POST['kurs'])) 
		{
			if ($_POST['stud']!='' and $_POST['kurs']!=''){
				$stmt = $conn->prepare("INSERT INTO student_courses (student_id,course_id) VALUES (?,?)");
				$stmt->bind_param("ii",$stud,$kurs);

				$stud = $_POST['stud'];
				$kurs = $_POST['kurs'];
				
				$stmt->execute();
				$stmt->close();
				$conn->close();
				header("Location: " . $_SERVER['PHP_SELF']);}
			else {echo 'Заполните все поля!';};
		}
	?>
</body>