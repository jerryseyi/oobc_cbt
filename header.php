<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOBC CBT <?php if(isset($title)) echo " | $title"; ?></title>
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<div class="container">

        <?php if ($isAdmin == true): ?>
            <?php require_once("sidebar.php") ?>
        <?php endif; ?>

    <div class="main" <?php if ($isAdmin == false) { echo "style='left: 0; width: 100%;'";}?>>
        <div class="topbar">
            <div class="toggle" onclick="toggleMenu()"></div>

            <div class="user" onclick="toggleDropdown()">
                <img src="img/user.jpeg" alt="">
            </div>
            <div class="dropdown">
                <h3><?= $me['username']?></h3>
                <ul>
                    <li><span class="fas fa-image"></span><a href="change-image.html">Change Avatar</a></li>
                    <li><span class="fas fa-key"></span><a href="change-password.html">Change Password</a></li>
                    <li><span class="fas fa-sign-out-alt"></span><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>