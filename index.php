<head>
    <title>1</title>
    <meta charset="utf-8">
</head>
<?php
$host = 'localhost'; 
$db = 'school_management'; 
$user = 'root';    
$password = '';      


$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}
echo "Соединение успешно установлено!";
?>