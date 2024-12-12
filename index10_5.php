<head>
    <title>Связывание преподавателя с курсом</title>
    <meta charset="utf-8">
</head>
<body>
    <div style='display:flex'>
        <table border="1"  height='20px'>
            <tr>
	            <td>ID</td>
		        <td>Преподаватель</td>
	        </tr>
			<?php
			    $conn = new mysqli('localhost', 'root', '', 'school_management');
			    $sql = "SELECT * FROM teachers";
			    $result = $conn->query($sql);

			    if ($result->num_rows > 0) {
				    while ($row = $result->fetch_assoc()) {
					    echo "<tr>"."<td>".$row["id"]."</td>"."<td>". $row["name"]."</td>"."</tr>";}}
			    else {echo "Нет преподавателей.";}
			?>
        </table>
		
		<div style="width:20px"></div>
		
        <table border="1" height='20px'>
            <tr>
	            <td>ID</td>
		        <td>Курсы</td>
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
	<p>Связывание преподавателя с курсом</p>
	<form method="post" style='display:flex'>
	    <div style='display:flex;flex-direction:column;'>
	        Введите id преподавателя
            <input name="prep" id="prep" type="number">
		</div>
		
		<div style='display:flex;flex-direction:column;'>
		    Введите id курса
		    <input name="kurs" id="kurs" type="number">
		</div>
		
	    <button type="submit">Связать</button>
    </form>
	<?php
		$conn = new mysqli('localhost', 'root', '', 'school_management');

		if (isset($_POST['prep']) and isset($_POST['kurs'])) 
		{
			if ($_POST['prep']!='' and $_POST['kurs']!=''){
				$stmt = $conn->prepare("UPDATE courses SET teacher_id = ? WHERE id = ?");
				$stmt->bind_param("ii",$prep,$kurs);

				$prep = $_POST['prep'];
				$kurs = $_POST['kurs'];
				$stmt->execute();

				$stmt->close();
				$conn->close();
				header("Location: " . $_SERVER['PHP_SELF']);}
			else {echo 'Заполните все поля!';};
		}
	?>
</body>