<?php
include '../includes/auth.php';
include '../includes/config.php';

$leadCount = mysqli_fetch_assoc(
mysqli_query($conn,"SELECT COUNT(*) as total FROM leads")
)['total'];

$reviewCount = mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM reviews")
);

$winnerCount = mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM winners")
);
?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="main-content">
    <?php include 'includes/topbar.php'; ?>

Page Content Here

</div>

<?php include 'includes/footer.php'; ?>