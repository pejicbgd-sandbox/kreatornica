<?php require('includes/init.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=" Kreatornica je udruženje umetnika i zanatlija iz mesta Kovačica u Srbiji. Osnovano je 2012 godine. Danas broji 16 članova raznog umetničkog interesovanja, čiji su zajednički ciljevi očuvanje i propagiranje starih zanata i ručnih radova, gajenje kulturne i umetničke raznolikosti u regionu, kao i međunarodna saradnja sa sličnim udruženjima u Evropi.">
    <meta name="author" content=" Kreatornica je udruženje umetnika i zanatlija iz mesta Kovačica u Srbiji.">
    <title>Club Kreatornica</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/kreatorci.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/fancybox/jquery.fancybox.css" type="text/css" media="screen"/>
    <link rel="stylesheet" href="assets/fancybox/helpers/jquery.fancybox-buttons.css" type="text/css" media="screen"/>
    <link rel="stylesheet" href="assets/fancybox/jquery.fancybox-thumbs.css" type="text/css" media="screen"/>
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet'
          type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
        header {
            background-image: url(assets/img/home/<?php echo  $consts['homeContent'][0]['naslovna']; ?>);
        }
    </style>
</head>
<body id="page-top" class="index">

<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container navigation-wrapper">
        <?php echo $twig->render('navbar.twig', $consts); ?>
</nav>

<!-- Header -->
<header>
    <div class="container intro-wrapper">
        <?php echo $twig->render('header.twig', $consts); ?>
    </div>
</header>

<div data-spy="scroll-area" data-target=".navbar" data-offset="12">

    <!-- About Section -->
    <section id="about_us">
        <?php echo $twig->render('about_us.twig', $consts); ?>
    </section>

    <!-- MEMBERS Section -->
    <section id="member" class="bg-light-gray" method="post">
        <?php echo $twig->render('members.twig', $consts); ?>
    </section>

    <!-- Projects Grid Section -->
    <section id="projects">
        <?php echo $twig->render('projects.twig', $consts); ?>
    </section>

    <!-- GALLERY SECTION -->
    <section id="gallery" class="bg-light-gray"> <!-- PAST CLIENTS-->
        <?php echo $twig->render('gallery.twig', $consts); ?>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <?php echo $twig->render('contact.twig', $consts); ?>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Club Kreatornica 2015</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li>
                            <a href="https://www.facebook.com/kreatornica.artclub?fref=ts" target="_blank">f</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#about_us">O nama</a>
                        </li>
                        <li><a href="#member">Članovi</a>
                        </li>
                        <li><a href="#projects">Projekti</a>
                        </li>
                        <li><a href="#gallery">Galerija</a>
                        </li>
                        <li><a href="#contact">Kontakt</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- jQuery -->
    <script src="assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="assets/js/classie.js"></script>
    <script src="assets/js/cbpAnimatedHeader.js"></script>

    <script type="text/javascript" src="assets/fancybox/jquery.fancybox.js"></script>
    <script type="text/javascript" src="assets/fancybox/helpers/jquery.fancybox-buttons.js"></script>
    <script type="text/javascript" src="assets/fancybox/jquery.fancybox-thumbs.js"></script>
    <script type="text/javascript" src="assets/fancybox/jquery.fancybox-media.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="assets/js/contact_me.js"></script>
    <script src="admin/js/c.js"></script>


</body>

</html>
