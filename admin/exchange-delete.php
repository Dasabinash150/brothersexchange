<?php

include '../includes/config.php';

$id=(int)$_GET['id'];

$row=mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT * FROM exchanges WHERE id=$id")
);

if(file_exists(
'../uploads/exchanges/'.$row['image']
)){
unlink(
'../uploads/exchanges/'.$row['image']
);
}

mysqli_query(
$conn,
"DELETE FROM exchanges WHERE id=$id"
);

header("Location: exchanges.php");
exit;


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
       value="<?= $data['name'] ?>"
       class="form-control mb-3">

<input type="text"
       name="link"
       value="<?= $data['link'] ?>"
       class="form-control mb-3">

<img src="../uploads/exchanges/<?= $data['image'] ?>"
     width="200"
     class="mb-3">

<input type="file"
       name="image"
       class="form-control mb-3">

<button name="update"
        class="btn btn-primary">
Update Exchange
</button>

</form>

</div>

<?php include 'includes/footer.php'; ?>
