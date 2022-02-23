<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOBC CBT APP</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="dist/all.min.css">
</head>
<body>
<header>
    <div style="justify-content: space-between; display: flex; width: 100%; align-items: center;">
        <div class="logowrap">
            <a href="#" class="logo"><img src="img/OOBC%20LOGO.png" alt=""></a>
        </div>
        <ul class="navigation">
            <li><a href="signin.php">Login</a></li>
        </ul>
    </div>
</header>
<section class="banner" id="banner">
    <div class="content">
        <h2>Computer Based Test Platform</h2>
        <p>Randomized questions, Over 100 Multiple choice questions, Over 20 Structural questions.
            <br>Safe, Fast, Easy to use
        </p>
        <a href="signin.php" class="btn">Login</a>
    </div>
</section>

<section class="about">
    <div class="contentBx">
        <div style="margin-bottom: 100px;">
            <h2 class="heading">Vision</h2>
            <p class="text">
                To transform ordinary people into overcomers in all areas of life so that they can reflect God's original plan for man to live in dominion
                over the creation.
            </p>
        </div>
        <div>
            <h2 class="heading">Mission</h2>
            <p class="text">
                To help people discover, develop, release and maximize their potentials in God.
            </p>
        </div>
    </div>
    <div class="imgBx"></div>
</section>
<section class="contact">
    <h2 class="heading dark">Jesse Solomon</h2>
    <p class="text dark">
        Show me someone who does a good job, and i will show you someone who is better than most and worthy of the company of kings.
    </p>
</section>
<footer>
    <div class="container">
        <div class="sec aboutus">
            <h2>About Us</h2>
            <p>
                OOBC ACADEMIC UNIT is a gathering of Eagles who believe in raising other academic eagles through impact and
                impart by teaching them how to soar academically.
            </p>
            <ul class="sci">
                <li><a href="https://www.facebook.com/ooreofeoluwa.bc"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="https://www.youtube.com/channel/UCFobMp33lhXVT_mr-00K_vA"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
            </ul>
        </div>


        <div class="sec">
            <h2>Contact Us</h2>
            <ul class="info">
                <li style="padding-bottom: 5px;">
                    <span><i class="fas fa-map-marker"></i></span>
                    <span>Oore-Ofe Oluwa Avenue, Behind Ajagungbade complex, LAUTECH Teaching Hospital Area,
						      P.O. Box 1280, <br>Ogbomoso, Oyo State, Nigeria.</span>
                </li>
                <li style="padding-bottom: 5px;">
                    <span><i class="fas fa-phone"></i></span>
                    <p><a href="">0800000000</a><br>
                        <a href="">090000000</a></p>
                </li>
                <li>
                    <span><i class="fas fa-envelope"></i></span>
                    <p><a href="">serivces@oreofe.com</a></p>
                </li>
            </ul>
        </div>
    </div>
</footer>
<div class="copyrightText">
    <p style="color:#fff;">Copyright &copy; OOBC Academic Unit, 2021.</p>
</div>

<script>
    window.addEventListener('scroll', function() {
        const header = document.querySelector('header');
        header.classList.toggle("sticky", window.scrollY > 0);
    });

    function toggleMenu() {
        const navigation = document.querySelector('.navigation');
        navigation.classList.toggle('active');
    }
</script>
</body>
</html>