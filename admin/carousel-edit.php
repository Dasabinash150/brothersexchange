<?php

include '../includes/config.php';

$id = $_GET['id'];

$data = mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT * FROM carousel_slides
WHERE id=$id")
);

if(isset($_POST['update'])){

$title = $_POST['title'];
$link = $_POST['link'];

if($_FILES['image']['name']){

$newImage =
time().$_FILES['image']['name'];

move_uploaded_file(
$_FILES['image']['tmp_name'],
'../uploads/carousel/'.$newImage
);

unlink(
'../uploads/carousel/'.
$data['image']
);

mysqli_query($conn,
"UPDATE carousel_slides
SET title='$title',
link='$link',
image='$newImage'
WHERE id=$id");

}else{

mysqli_query($conn,
"UPDATE carousel_slides
SET title='$title',
link='$link'
WHERE id=$id");

}

header("Location: carousel.php");

}
?>



<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="main-content">

<div class="d-flex justify-content-between mb-3">
    <h3>Carousel Management</h3>

    <a href="add-carousel.php"
       class="btn btn-primary">
       Add Slide
    </a>
</div>

<form method="POST" enctype="multipart/form-data">

<input type="text"
name="title"
value="<?= $data['title'] ?>">

<input type="text"
name="link"
value="<?= $data['link'] ?>">

<img src="../uploads/carousel/<?= $data['image'] ?>"
width="200">

<input type="file"
name="image">

<button name="update">
Update Slide
</button>

</form>

</div>

<?php include 'includes/footer.php'; ?>