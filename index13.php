<head>
    <title>13</title>
    <meta charset="utf-8">
</head>

<?php
$conn = new mysqli('localhost', 'root', '', 'school_management');

$sql = "SELECT * FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
		if ($row["group_id"]=="")
		    {echo $row["name"].$row["group_id"]."<br>";}}}
else
    {echo "Не найдено.";}

$conn->close();
?>