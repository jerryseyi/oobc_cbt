<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOBC CBT <?php if(isset($title)) echo " | $title"; ?></title>
    <link rel="stylesheet" href="dist/all.min.css">
    <link rel="stylesheet" href="css/index.css">
    <?php
    if (isset($tinymce)) {
            echo "<script src='js/tinymce/tinymce.min.js'></script>
                  <script src='dist/plugin.min.js'></script>
                  <script src='dist/index.js'></script>
                  <script src='https://wiris.net/demo/plugins/app/WIRISplugins.js?viewer=image'></script>
                 ";
        }
    
    if (isset($filepond)) {
        echo "<link href='https://unpkg.com/filepond/dist/filepond.css' rel='stylesheet'>
	        <link href='https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css'
			rel='stylesheet'
                />";
    }

    ?>
</head>
<body>
<div class="container">

        <?php if ($isAdmin == true): ?>
            <?php require_once("sidebar.php") ?>
        <?php endif; ?>

    <div class="main" <?php if ($isAdmin == false) { echo "style='left: 0; width: 100%;'";}?>>
        <div class="topbar">
            <?php if ($isAdmin == false) : ?>
                <div style="display: flex; justify-content: center; align-items: center;">
                    <div class="user">
                        <img src="img/OOBC%20LOGO.png" alt="">
                    </div>
                    <span style="color: #162c3b; font-size: 1.2em; font-weight: bold; margin-left: 10px;">OOBC CBT APP</span>
                </div>
            <?php endif; ?>
            <?php if ($isAdmin == true) : ?>
                <div class="toggle" onclick="toggleMenu()"></div>
            <?php endif; ?>

            <div class="user" onclick="toggleDropdown()">
                <img src="<?= $me['photo'] ?: 'img/default.png' ?>" alt="">
            </div>
            <div class="dropdown">
                <h3><?= $me['username'] ?></h3>
                <ul>
                    <li><span class="fas fa-image"></span><a href="change_avatar.php">Change Avatar</a></li>
                    <?php if ($isAdmin) : ?>
                    <li><span class="fas fa-key"></span><a href="change_password.php">Change Password</a></li>
                    <?php endif; ?>
                    <li><span class="fas fa-sign-out-alt"></span><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>