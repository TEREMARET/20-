<head>
    <title>5</title>
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
				$sql = "SELECT * FROM groups";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						echo "<tr>"."<td>".$row["id"]."</td>"."<td>". $row["name"]."</td>"."</tr>";}}
				else {echo "Нет групп.";}
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
		    Введите id группы
		    <input name="grup" id="grup" type="number">
		</div>
		
	    <button type="submit">Связать</button>
    </form>
	<?php
		$conn = new mysqli('localhost', 'root', '', 'school_management');

		if (isset($_POST['stud']) and isset($_POST['grup'])) 
		{
			if ($_POST['stud']!='' and $_POST['grup']!=''){
				$stmt = $conn->prepare("UPDATE students SET group_id = ? WHERE id = ?");
				$stmt->bind_param("ii", $grup, $stud);

				$stud = $_POST['stud'];
				$grup = $_POST['grup'];
				$stmt->execute();

				$stmt->close();
				$conn->close();
				header("Location: " . $_SERVER['PHP_SELF']);}
			else {echo 'Заполните все поля!';};
		}
	?>
</body>