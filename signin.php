<?php
    include "_partials/public/header.php";
 ?>

<section class="login">
    <div class="logowrap" style="position:absolute !important; left: 20px; top: 10px;">
        <a href="dashboard.php" class="logo"><img src="img/OOBC%20LOGO.png" alt=""></a>
    </div>

    <div class="contentBx redbg">
        <h2 class="mb-90">Log in to your account</h2>
        <div class="form">
            <form action="login.php" method="POST">
<!--                <div class="errors">kilode</div>-->
                <?php if (isset($error)) :?>
                    <span class="errors"><?= $error ?></span>
                <?php endif; ?>
                    
                <div class="inputBx mb-20">
                    <input type="text" placeholder="Username" name="username">
                </div>
                <div class="inputBx">
                    <input type="password" placeholder="Password" name="password">
                </div>

                <div class="inputBx">
                    <input type="submit" name="login" value="Login">
                </div>
            </form>
        </div>
    </div>
    <div class="imgBx2 op-3"></div>
</section>
</body>
</html>
