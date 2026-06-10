<?php

include '../includes/config.php';

if(isset($_POST['save'])){

$title = $_POST['title'];
$link = $_POST['link'];

$image = time().$_FILES['image']['name'];

move_uploaded_file(
$_FILES['image']['tmp_name'],
'../uploads/carousel/'.$image
);

mysqli_query($conn,
"INSERT INTO carousel_slides
(title,image,link)
VALUES
('$title','$image','$link')");

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
class="form-control mb-3"
placeholder="Title">

<input type="text"
name="link"
class="form-control mb-3"
placeholder="Link">

<input type="file"
name="image"
class="form-control mb-3"
required>

<button name="save"
class="btn btn-success">
Save Slide
</button>

</form>

</div>

<?php include 'includes/footer.php'; ?>