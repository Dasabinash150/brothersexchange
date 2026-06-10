<?php
include '../includes/config.php';

$result = mysqli_query($conn,
"SELECT * FROM exchanges ORDER BY id DESC");
?>

<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="main-content">

<div class="d-flex justify-content-between mb-3">
    <h3>Manage Exchanges</h3>

    <a href="exchange-add.php"
       class="btn btn-primary">
       Add Exchange
    </a>
</div>

<table class="table table-bordered">

<tr>
    <th>ID</th>
    <th>Image</th>
    <th>Name</th>
    <th>Link</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?= $row['id'] ?></td>

<td>
<img src="../uploads/exchanges/<?= $row['image'] ?>"
     width="120">
</td>

<td><?= $row['name'] ?></td>

<td><?= $row['link'] ?></td>

<td>
<?= $row['status']==1
? '<span class="badge bg-success">Active</span>'
: '<span class="badge bg-danger">Inactive</span>' ?>
</td>

<td>

<a href="exchange-edit.php?id=<?= $row['id'] ?>"
   class="btn btn-warning btn-sm">
Edit
</a>

<a href="exchanges.php?toggle=<?= $row['id'] ?>"
   class="btn btn-info btn-sm">
Toggle
</a>

<a href="exchange-delete.php?id=<?= $row['id'] ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Delete Exchange?')">
Delete
</a>

</td>

</tr>

<?php } ?>

</table>

</div>