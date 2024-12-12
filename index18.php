<head>
    <title>18</title>
    <meta charset="utf-8">
</head>
<form method="POST">
<?php
$conn = new mysqli('localhost', 'root', '', 'school_management');

$sql = "SELECT * FROM groups";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo
		"<input type='radio' name='gruppa' value=".$row['id'].">".$row['name']."<br>";
    }
} else {
    echo "Нет студентов.";
}

$conn->close();
?>
<button type="submit">Отправить</button>
</form>

<?php
$p1=0;
$conn = new mysqli('localhost', 'root', '', 'school_management');

$sql = "SELECT groups.name AS group_name, groups.id AS id, students.name AS student_name FROM groups LEFT JOIN students ON groups.id=students.group_id";
$result = $conn->query($sql);

if (isset($_POST['gruppa'])){
	while ($row = $result->fetch_assoc()){
        if ($_POST['gruppa']==$row['id']){
			echo 
			    $row['student_name'].'<br>';
				if ($row['student_name']!='')
				    {$p1=1;}}}
	$conn->close();
	
	if($p1==0){echo 'В этой группе никто не учится';}
};
?>
