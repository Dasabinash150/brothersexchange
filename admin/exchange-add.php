<?php

include '../includes/config.php';

if(isset($_POST['save'])){

$name=$_POST['name'];
$link=$_POST['link'];

$image=time().'_'.$_FILES['image']['name'];

move_uploaded_file(
$_FILES['image']['tmp_name'],
'../uploads/exchanges/'.$image
);

mysqli_query($conn,"
INSERT INTO exchanges
(name,image,link)
VALUES
('$name','$image','$link')
");

header("Location: exchanges.php");
exit;
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
       name="name"
       class="form-control mb-3"
       placeholder="Exchange Name"
       required>

<input type="text"
       name="link"
       class="form-control mb-3"
       placeholder="Website Link"
       required>

<input type="file"
       name="image"
       class="form-control mb-3"
       required>

<button class="btn btn-success"
        name="save">
Save Exchange
</button>

</form>

</div>

<?php include 'includes/footer.php'; ?>