<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<style>
body{
    margin:0;
    background:#f5f7fb;
    font-family:Arial,sans-serif;
}

.sidebar{
    position:fixed;
    left:0;
    top:0;
    width:250px;
    height:100vh;
    background:#111827;
    overflow-y:auto;
}

.logo{
    padding:20px;
    color:white;
    text-align:center;
    font-size:24px;
    font-weight:bold;
    border-bottom:1px solid #374151;
}

.sidebar ul{
    list-style:none;
    padding:0;
    margin:0;
}

.sidebar ul li a{
    display:block;
    color:#fff;
    text-decoration:none;
    padding:15px 20px;
    transition:.3s;
}

.sidebar ul li a:hover,
.sidebar ul li a.active{
    background:#2563eb;
}

.main-content{
    margin-left:250px;
    padding:25px;
}

.logout{
    position:absolute;
    bottom:20px;
    width:100%;
}
</style>

<div class="sidebar">

    <div class="logo">
        Brothers Exchange
    </div>

    <ul>

        <li>
            <a href="dashboard.php"
            class="<?= ($current_page=='dashboard.php')?'active':'' ?>">
            Dashboard
            </a>
        </li>

        <li>
            <a href="carousel.php"
            class="<?= ($current_page=='carousel.php')?'active':'' ?>">
            Carousel
            </a>
        </li>
        <li>
<a href="exchanges.php">
Exchange Management
</a>
</li>

        <li>
            <a href="reviews.php"
            class="<?= ($current_page=='reviews.php')?'active':'' ?>">
            Reviews
            </a>
        </li>

        <li>
            <a href="winners.php"
            class="<?= ($current_page=='winners.php')?'active':'' ?>">
            Winners
            </a>
        </li>

        <li>
            <a href="payments.php"
            class="<?= ($current_page=='payments.php')?'active':'' ?>">
            Payment Settings
            </a>
        </li>


    </ul>

    <div class="logout">
        <a href="../logout.php"
           style="display:block;padding:15px 20px;color:#fff;text-decoration:none;background:#dc2626;">
            Logout
        </a>
    </div>

</div>