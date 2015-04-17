<?php
$password="365277";

$link = mysqli_connect("localhost",
    "dolar",
    "123456",
    "word_list");

$query = "INSERT INTO `words`(`id`,`english`,`bangla`)
          VALUES('','$_POST[english]','$_POST[bangla]')";

mysqli_query($link,$query);
header('location:bsd.php');
?>
