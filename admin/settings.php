<?php
include '../includes/config.php';

$data = mysqli_fetch_assoc(
mysqli_query($conn,"SELECT * FROM website_settings WHERE id=1")
);

if(isset($_POST['save'])){

    $site_name = $_POST['site_name'];
    $hero_title = $_POST['hero_title'];
    $hero_description = $_POST['hero_description'];

    $whatsapp = $_POST['whatsapp'];
    $telegram = $_POST['telegram'];
    $instagram = $_POST['instagram'];
    $facebook = $_POST['facebook'];
    $twitter = $_POST['twitter'];

    $about_title = $_POST['about_title'];
    $about_content = $_POST['about_content'];

    $footer_text = $_POST['footer_text'];
    $logo = $data['logo'];
    $favicon = $data['favicon'];
    $hero_image = $data['hero_image'];
    $about_image = $data['about_image'];

if(!empty($_FILES['logo']['name'])){
    $logo = time().'_'.$_FILES['logo']['name'];
    move_uploaded_file(
        $_FILES['logo']['tmp_name'],
        '../uploads/settings/'.$logo
    );
}

if(!empty($_FILES['favicon']['name'])){
    $favicon = time().'_'.$_FILES['favicon']['name'];
    move_uploaded_file(
        $_FILES['favicon']['tmp_name'],
        '../uploads/settings/'.$favicon
    );
}

if(!empty($_FILES['hero_image']['name'])){
    $hero_image = time().'_'.$_FILES['hero_image']['name'];
    move_uploaded_file(
        $_FILES['hero_image']['tmp_name'],
        '../uploads/settings/'.$hero_image
    );
}

if(!empty($_FILES['about_image']['name'])){
    $about_image = time().'_'.$_FILES['about_image']['name'];
    move_uploaded_file(
        $_FILES['about_image']['tmp_name'],
        '../uploads/settings/'.$about_image
    );
}

mysqli_query($conn,"
UPDATE website_settings SET

site_name='$site_name',
hero_title='$hero_title',
hero_description='$hero_description',

whatsapp='$whatsapp',
telegram='$telegram',
instagram='$instagram',
facebook='$facebook',
twitter='$twitter',

about_title='$about_title',
about_content='$about_content',

footer_text='$footer_text',

logo='$logo',
favicon='$favicon',
hero_image='$hero_image',
about_image='$about_image'

WHERE id=1
");

    header("Location: settings.php?success=1");
    exit;
}
?>

<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="main-content">

<?php include 'includes/topbar.php'; ?>

<div class="container-fluid">

    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Website Settings</h4>
        </div>

        <div class="card-body">

            <?php if(isset($_GET['success'])){ ?>
                <div class="alert alert-success">
                    Settings Updated Successfully
                </div>
            <?php } ?>

            <form method="POST" enctype="multipart/form-data">

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Site Name</label>
                        <input type="text"
                               name="site_name"
                               class="form-control"
                               value="<?= $data['site_name'] ?>">
                    </div>
                    <div class="col-md-6 mb-3">
    <label class="form-label">Logo</label>

    <?php if(!empty($data['logo'])){ ?>
        <img src="../uploads/settings/<?= $data['logo'] ?>"
             class="img-thumbnail mb-2"
             width="120">
    <?php } ?>

    <input type="file"
           name="logo"
           class="form-control">
</div>

<div class="col-md-6 mb-3">
    <label class="form-label">Favicon</label>

    <?php if(!empty($data['favicon'])){ ?>
        <img src="../uploads/settings/<?= $data['favicon'] ?>"
             class="img-thumbnail mb-2"
             width="60">
    <?php } ?>

    <input type="file"
           name="favicon"
           class="form-control">
</div>

<div class="col-md-6 mb-3">
    <label class="form-label">Hero Image</label>

    <?php if(!empty($data['hero_image'])){ ?>
        <img src="../uploads/settings/<?= $data['hero_image'] ?>"
             class="img-thumbnail mb-2"
             width="120">
    <?php } ?>

    <input type="file"
           name="hero_image"
           class="form-control">
</div>

<div class="col-md-6 mb-3">
    <label class="form-label">About Image</label>

    <?php if(!empty($data['about_image'])){ ?>
        <img src="../uploads/settings/<?= $data['about_image'] ?>"
             class="img-thumbnail mb-2"
             width="120">
    <?php } ?>

    <input type="file"
           name="about_image"
           class="form-control">
</div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">WhatsApp Number</label>
                        <input type="text"
                               name="whatsapp"
                               class="form-control"
                               value="<?= $data['whatsapp'] ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Telegram Link</label>
                        <input type="text"
                               name="telegram"
                               class="form-control"
                               value="<?= $data['telegram'] ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Instagram Link</label>
                        <input type="text"
                               name="instagram"
                               class="form-control"
                               value="<?= $data['instagram'] ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Facebook Link</label>
                        <input type="text"
                            name="facebook"
                            class="form-control"
                            value="<?= $data['facebook'] ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Twitter Link</label>
                        <input type="text"
                            name="twitter"
                            class="form-control"
                            value="<?= $data['twitter'] ?>">
                    </div>

                    <div class="col-12 mb-3">
                        <label class="form-label">Hero Title</label>
                        <input type="text"
                               name="hero_title"
                               class="form-control"
                               value="<?= $data['hero_title'] ?>">
                    </div>

                    <div class="col-12 mb-3">
                        <label class="form-label">Hero Description</label>
                        <textarea
                            name="hero_description"
                            rows="3"
                            class="form-control"><?= $data['hero_description'] ?></textarea>
                    </div>

                    <div class="col-12 mb-3">
                        <label class="form-label">About Title</label>
                        <input type="text"
                               name="about_title"
                               class="form-control"
                               value="<?= $data['about_title'] ?>">
                    </div>

                    <div class="col-12 mb-3">
                        <label class="form-label">About Content</label>
                        <textarea
                            name="about_content"
                            rows="5"
                            class="form-control"><?= $data['about_content'] ?></textarea>
                    </div>

                    <div class="col-12 mb-3">
                        <label class="form-label">Footer Text</label>
                        <textarea
                            name="footer_text"
                            rows="3"
                            class="form-control"><?= $data['footer_text'] ?></textarea>
                    </div>

                </div>

                <button type="submit"
                        name="save"
                        class="btn btn-primary">
                    Save Settings
                </button>

            </form>

        </div>
    </div>

</div>

</div>

<?php include 'includes/footer.php'; ?>