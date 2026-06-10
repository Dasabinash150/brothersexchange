<?php

include '../includes/config.php';
$id = (int)$_GET['id'];

$row = mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT * FROM carousel_slides WHERE id=$id")
);

echo "Current Status: ".$row['status']."<br>";

$newStatus = ($row['status']==1)?0:1;

echo "New Status: ".$newStatus."<br>";

$update = mysqli_query($conn,
"UPDATE carousel_slides
SET status=$newStatus
WHERE id=$id");

if($update){
    echo "Updated Successfully";
}else{
    echo mysqli_error($conn);
}

exit;
?>