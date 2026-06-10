<?php
include '../includes/config.php';

$result = mysqli_query($conn,
"SELECT * FROM carousel_slides ORDER BY id DESC");
// status
if(isset($_GET['toggle'])){

    $id = (int)$_GET['toggle'];

    mysqli_query($conn,"
        UPDATE carousel_slides
        SET status = IF(status=1,0,1)
        WHERE id=$id
    ");

    header("Location: carousel.php");
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

<table class="table table-bordered table-striped">

<tr>
<th>ID</th>
<th>Image</th>
<th>Title</th>
<th>Link</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?= $row['id'] ?></td>

<td>
<img src="../uploads/carousel/<?= $row['image'] ?>"
width="120">
</td>

<td><?= $row['title'] ?></td>

<td><?= $row['link'] ?></td>

<td>

<?php if($row['status'] == 1){ ?>
    <span class="badge bg-success">Active</span>
<?php } else { ?>
    <span class="badge bg-danger">Inactive</span>
<?php } ?>

</td>

<td>

<a href="carousel-edit.php?id=<?= $row['id'] ?>"
class="btn btn-warning btn-sm">
Edit
</a>

<a href="carousel.php?toggle=<?= $row['id'] ?>"
   class="btn <?= ($row['status']==1) ? 'btn-warning' : 'btn-success' ?> btn-sm">

   <?= ($row['status']==1) ? 'Disable' : 'Enable' ?>

</a>

<a href="carousel-delete.php?id=<?= $row['id'] ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Delete Slide?')">
Delete
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

<?php include 'includes/footer.php'; ?>