<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Zou Farm</title>
    <link rel="icon" type="image/png" href="assets/img/logo.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
    <div class="container">
        <header>
            <nav class="header__nav w-120">
                <div class="header__logo">
                    <img src="assets/img/logo.png" alt="Logo">
                </div>
                <div class="header__nav__content">
                    <div class="nav-close-icon"></div>
                    <ul class="header__menu">
                        <li class="menu__item">
                            <a href="#" class="menu__link active">Home</a>
                        </li>
                        <li class="menu__item">
                            <a href="#" class="menu__link">Product</a>
                        </li>
                        <li class="menu__item">
                            <a href="#" class="menu__link">Team</a>
                        </li>
                        <li class="menu__item">
                            <a href="#" class="menu__link">Blog</a>
                        </li>
                        <li class="menu__item">
                            <a href="session.php" class="menu__link">Sign In</a>
                        </li>
                    </ul>
                    <div class="header__signup">
                        <a href="add.php" class="btn btn__signup">
                            <i class="fas fa-user-plus"></i> Sign Up
                        </a>
                    </div>
                </div>

                <div class="hamburger-menu-wrap">
                    <div class="hamburger-menu">
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                    </div>
                </div>
            </nav>
        </header>

        <section class="hero w-120">
            <div class="hero__content">
                <div class="hero__text">
                    <h1 class="hero__title">A New approach to a healthy life</h1>
                    <p class="hero__description">
                       healthy life means healthy body ,food,and a state of mind 
                    </p>
                    <a href="#" class="btn btn__hero">İnvest Now</a>
                </div>
                <div class="hero__img">
                    <img src="assets/img/" alt="">
                </div>
            </div>
        </section>

        <section class="opportunities">
            <div class="opportunities__img">
                
            </div>
            <div class="opportunities__content w-105">
                <div class="opportunities__head">
                    <h2 class="opportunities__title">New Opportunities</h2>
                    <p class="opportunities__description">We are the first and the only crowdfunding platform enabling you to help better life in so many angles.</p>
                </div>
                <div class="opportunities__body">
                    <div class="opportunity">
                        <img src="assets/img/opportunites/opportunity-1.svg" alt="Icon" class="opportunity__icon">
                        <h4 class="opportunity__title">Connect with our admins</h4>
                        <p class="opportunity__description"> we are a group of friends and determined to give you the best experience ever
                        </p>
                    </div>

                    <div class="opportunity active">
                        <img src="assets/img/opportunites/opportunity-2.svg" alt="Icon" class="opportunity__icon">
                        <h4 class="opportunity__title">Grow your mind</h4>
                        <p class="opportunity__description">
by talking to our expert and buying or products we will ensure you a healthy mind !                        </p>
                    </div>
                    <div class="opportunity">
                        <img src="assets/img/opportunites/opportunity-3.svg" alt="Icon" class="opportunity__icon">
                        <h4 class="opportunity__title">try herbal medicament
                        </h4>
                        <p class="opportunity__description">
herbal medicaments help you attain peak self love without chemicals                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="invest  w-105">
            <div class="invest__content">
                <div class="invest__head">
                    <h2 class="invest__title">Try our forum</h2>
                    <p class="invest__description">our forum is made by the best programmers ever and will ensure you a smooth talk and a smooth responses</p>
                </div>
                <div class="invest__body">
                    <div class="invest__item">
                        <div class="invest__item__head">
                            <h5 class="invest__item__subtitle">NEW products TODAY</h5>
                        </div>
                        <div class="invest__item__body">
                            <h4 class="invest__item__title">long term benefits</h4>
                            <p class="invest__item_description">
                                it will ensure a good body
                            </p>
                        </div>
                        <div class="invest__item__footer">
                            <a href="#" class="btn btn__invest">Browse our coaches</a>
                        </div>
                    </div>
                    <div class="invest__item">
                        <div class="invest__item__head">
                            <h5 class="invest__item__subtitle">FULLY FUNDED</h5>
                        </div>
                        <div class="invest__item__body">
                            <h4 class="invest__item__title">Long terms investment
                            </h4>
                            <p class="invest__item_description">
                                Consider farms that have long term investment program.
                            </p>
                        </div>
                        <div class="invest__item__footer">
                            <a href="#" class="btn btn__invest">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

      

       

        <footer class="footer">
            <div class="footer__body w-105">
                <nav class="footer__nav">
                    <ul class="footer_nav__menu">
                        <li class="footer_nav__item">
                            <h4 class="footer_nav__menu__title">COMPANY</h4>
                        </li>
                        <li class="footer_nav__item">
                            <a href="#" class="footer_nav__link">About Us</a>
                        </li>
                        <li class="footer_nav__item">
                            <a href="#" class="footer_nav__link">Team</a>
                        </li>
                        <li class="footer_nav__item">
                            <a href="#" class="footer_nav__link">Careers</a>
                        </li>
                        <li class="footer_nav__item">
                            <a href="#" class="footer_nav__link">Contact</a>
                        </li>
                    </ul>
                    <ul class="footer_nav__menu">
                        <li class="footer_nav__item">
                            <h4 class="footer_nav__menu__title">INVEST</h4>
                        </li>
                        <li class="footer_nav__item">
                            <a href="#" class="footer_nav__link">Features</a>
                        </li>
                        <li class="footer_nav__item">
                            <a href="#" class="footer_nav__link">How it works</a>
                        </li>
                        <li class="footer_nav__item">
                            <a href="#" class="footer_nav__link">Pricing</a>
                        </li>
                        <li class="footer_nav__item">
                            <a href="#" class="footer_nav__link">Login</a>
                        </li>
                    </ul>
                    <ul class="footer_nav__menu">
                        <li class="footer_nav__item">
                            <h4 class="footer_nav__menu__title">LEGAL</h4>
                        </li>
                        <li class="footer_nav__item">
                            <a href="#" class="footer_nav__link">Privacy</a>
                        </li>
                        <li class="footer_nav__item">
                            <a href="#" class="footer_nav__link">Terms</a>
                        </li>
                        <li class="footer_nav__item">
                            <a href="#" class="footer_nav__link">Security</a>
                        </li>
                    </ul>
                </nav>
                <div class="footer__contact">
                    <h5 class="footer__contact__title">Blog Zou</h5>
                    <span>Write email to us</span>
                    <a href="mailto:info@zoufarm.com" class="email">info@zoufarm.com</a>
                    <a href="add.php" class="btn btn__signin">
                        <i class="far fa-user"></i> Sign Up
                    </a>
                </div>
            </div>
            <div class="footer__bottom">
                <div class="footer__bottom__content w-105">
                    <div class="footer__logo">
                        <img src="assets/img/logo.svg" alt="Logo">
                    </div>
                    <p class="footer_copyright">
                        © Copyright 2021. Zou Capital Pty Ltd (ABN 45 4545 87363).
                    </p>
                </div>
                <img src="assets/img/mountain.png" alt="Mountain" class="footer_img">
            </div>
        </footer>
    </div>
    <script src="assets/js/main.js" type="module"></script>

</body>

</html>