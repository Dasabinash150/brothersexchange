<?php

include '../includes/config.php';

$id=$_GET['id'];

$row=mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT * FROM carousel_slides
WHERE id=$id")
);

unlink(
'../uploads/carousel/'.
$row['image']
);

mysqli_query($conn,
"DELETE FROM carousel_slides
WHERE id=$id");

header("Location: carousel.php");