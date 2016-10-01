<?php require('includes/init.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content=" Kreatornica je udruženje umetnika i zanatlija iz mesta Kovačica u Srbiji. Osnovano je 2012 godine. Danas broji 16 članova raznog umetničkog interesovanja, čiji su zajednički ciljevi očuvanje i propagiranje starih zanata i ručnih radova, gajenje kulturne i umetničke raznolikosti u regionu, kao i međunarodna saradnja sa sličnim udruženjima u Evropi.">
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

    <!-- Project Modals -->

    <!-- Project Modal 1 -->
    <div class="portfolio-modal modal fade" id="projectModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2 id="project-title">Erasmus+ 2015</h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa
                                incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae
                                cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!
                                Nullam imperdiet ut nisi et dignissim. Ut pharetra vestibulum congue. Phasellus id
                                dictum nibh. Nullam elementum quis quam in bibendum. Aliquam congue luctus imperdiet.
                                Sed vehicula magna est, sit amet feugiat ipsum commodo vitae. Cras molestie lacus id
                                elit elementum dignissim. Nullam efficitur nulla at erat condimentum commodo. Maecenas
                                faucibus euismod turpis eu pretium. In elementum elementum ex, dignissim aliquet risus
                                sollicitudin non. Donec tellus magna, porta vehicula mauris id, pharetra finibus leo.
                                Morbi venenatis enim at dui accumsan dictum. Ut tincidunt dui eget pretium mattis. Fusce
                                sed est vitae libero pharetra ullamcorper semper et urna.
                            </p>


                            <div class="row">
                                <a class="fancybox-thumb" rel="fancybox-thumb" href="assets/img/gallery/large/2.jpg"
                                   id="btnOpen">
                                    <button type="button" class="btn btn-primary project-btn">Pogledajte kako nam je
                                        bilo na radionicama
                                    </button>
                                </a>

                                <div id="fancybox-thumb" class="hidden">
                                    <a class="fancybox-thumb " rel="fancybox-thumb"
                                       href="assets/img/gallery/large/3.jpg"
                                       title="elgol sunset (matty brooks)">
                                        <img src="assets/img/gallery/thumbs/3small.jpg" alt=""/>
                                    </a>

                                    <a class="fancybox-thumb" rel="fancybox-thumb" href="assets/img/gallery/large/4.jpg"
                                       title="Frondaisons (Valentin le luron)">
                                        <img src="assets/img/gallery/thumbs/4small.jpg" alt=""/>
                                    </a>

                                    <a class="fancybox-thumb" rel="fancybox-thumb" href="assets/img/gallery/large/5.jpg"
                                       title="The cold morning (Raimondas Ka.)">
                                        <img src="assets/img/gallery/thumbs/5small.jpg" alt=""/>
                                    </a>

                                    <a class="fancybox-thumb" rel="fancybox-thumb" href="assets/img/gallery/large/6.jpg"
                                       title="Silhouettes (una cierta mirada)">
                                        <img src="assets/img/gallery/thumbs/6small.jpg" alt=""/>
                                    </a>

                                </div>
                            </div>


                            <button type="button" class="btn btn-primary" data-dismiss="modal">Zatvori</button>


                            <!-- Project Modal 2 -->
                            <div class="portfolio-modal modal fade" id="projectModal2" tabindex="-1" role="dialog"
                                 aria-hidden="true">
                                <div class="modal-content">
                                    <div class="close-modal" data-dismiss="modal">
                                        <div class="lr">
                                            <div class="rl">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-8 col-lg-offset-2">
                                                <div class="modal-body">
                                                    <h2>Project Heading</h2>
                                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet
                                                        consectetur.</p>

                                                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam
                                                        posuere quis tellus at vestibulum. Cras dignissim ligula nec
                                                        risus consectetur rutrum et non nisi. Duis et est non augue
                                                        laoreet tristique. Proin suscipit ut augue sit amet ultrices.
                                                        Nullam lacus lectus, venenatis a accumsan sed, elementum nec
                                                        nisl. Maecenas non nisi a dui hendrerit varius. Mauris sit amet
                                                        ante vitae nisl scelerisque interdum. Quisque in nulla arcu.
                                                        Pellentesque aliquam velit dolor, quis congue est tempor vel.
                                                        Suspendisse porttitor nec purus vitae faucibus. Sed congue
                                                        molestie diam in ultricies. Cras venenatis libero et lobortis
                                                        finibus. Pellentesque ultrices elit dolor, id porta lacus
                                                        consectetur ac. Nullam turpis metus, hendrerit et massa vel,
                                                        sollicitudin sagittis augue. Nullam pretium mi in ante lacinia,
                                                        nec interdum turpis fermentum. </p>

                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                                                        <i class="fa fa-times"></i> Close Project
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Project Modal 3 -->
                            <div class="portfolio-modal modal fade" id="projectModal3" tabindex="-1" role="dialog"
                                 aria-hidden="true">
                                <div class="modal-content">
                                    <div class="close-modal" data-dismiss="modal">
                                        <div class="lr">
                                            <div class="rl">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-8 col-lg-offset-2">
                                                <div class="modal-body">
                                                    <!-- Project Details Go Here -->
                                                    <h2>Project Name</h2>
                                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet
                                                        consectetur.</p>

                                                    <p>Aenean faucibus libero ut massa facilisis dignissim. Mauris at
                                                        cursus nisi. Vestibulum cursus neque nunc, eget venenatis leo
                                                        fermentum non. Suspendisse gravida ullamcorper magna, at
                                                        interdum nibh ultrices id. Aliquam sit amet lacinia tellus.
                                                        Etiam eu semper eros. Duis ut diam vel libero porta volutpat.
                                                        Donec tincidunt consectetur efficitur. Nam hendrerit massa vel
                                                        lacus tincidunt finibus. Mauris laoreet lacus enim, ut fringilla
                                                        urna consectetur non. Suspendisse sagittis metus ut fringilla
                                                        sodales. Duis aliquet lacus in lorem rutrum, sit amet auctor
                                                        tellus ultrices. Phasellus eget odio justo. Aliquam suscipit
                                                        imperdiet libero, sed congue tortor euismod eget. Curabitur sit
                                                        amet ante rhoncus, volutpat mi eu, pharetra arcu. </p>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                                                        <i class="fa fa-times"></i> Close Project
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Portfolio Modal 3 -->
                            <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog"
                                 aria-hidden="true">
                                <div class="modal-content">
                                    <div class="close-modal" data-dismiss="modal">
                                        <div class="lr">
                                            <div class="rl">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-8 col-lg-offset-2">
                                                <div class="modal-body">
                                                    <!-- Project Details Go Here -->
                                                    <h2>Project Name</h2>
                                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet
                                                        consectetur.</p>

                                                    <p>Aenean faucibus libero ut massa facilisis dignissim. Mauris at
                                                        cursus nisi. Vestibulum cursus neque nunc, eget venenatis leo
                                                        fermentum non. Suspendisse gravida ullamcorper magna, at
                                                        interdum nibh ultrices id. Aliquam sit amet lacinia tellus.
                                                        Etiam eu semper eros. Duis ut diam vel libero porta volutpat.
                                                        Donec tincidunt consectetur efficitur. Nam hendrerit massa vel
                                                        lacus tincidunt finibus. Mauris laoreet lacus enim, ut fringilla
                                                        urna consectetur non. Suspendisse sagittis metus ut fringilla
                                                        sodales. Duis aliquet lacus in lorem rutrum, sit amet auctor
                                                        tellus ultrices. Phasellus eget odio justo. Aliquam suscipit
                                                        imperdiet libero, sed congue tortor euismod eget. Curabitur sit
                                                        amet ante rhoncus, volutpat mi eu, pharetra arcu. </p>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                                                        <i class="fa fa-times"></i> Close Project
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Portfolio Modal 4 -->
                            <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog"
                                 aria-hidden="true">
                                <div class="modal-content">
                                    <div class="close-modal" data-dismiss="modal">
                                        <div class="lr">
                                            <div class="rl">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-8 col-lg-offset-2">
                                                <div class="modal-body">
                                                    <!-- Project Details Go Here -->
                                                    <h2>Project Name</h2>
                                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet
                                                        consectetur.</p>

                                                    <p>Phasellus sit amet nulla rhoncus, porttitor eros a, pharetra
                                                        quam. Etiam risus magna, condimentum id arcu in, fringilla
                                                        euismod libero. Class aptent taciti sociosqu ad litora torquent
                                                        per conubia nostra, per inceptos himenaeos. Donec maximus
                                                        maximus ex, sed placerat metus ultricies et. Maecenas ac lacus
                                                        orci. Mauris at mi cursus, ornare justo eu, imperdiet nisl.
                                                        Pellentesque varius tellus nec lorem varius semper. Cras id
                                                        lectus volutpat, finibus leo non, elementum tellus. Quisque
                                                        ultricies metus sed neque tristique, vitae rhoncus lectus
                                                        commodo. Suspendisse sagittis orci mi. Morbi ultrices tortor sit
                                                        amet libero sollicitudin, quis sodales felis convallis. Duis id
                                                        tincidunt massa, id lobortis diam. Phasellus massa lacus, porta
                                                        nec ante vitae, consequat mattis odio. In pulvinar sapien vel
                                                        tempus suscipit. </p>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                                                        <i class="fa fa-times"></i> Close Project
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Project Modal 2 -->
                            <div class="portfolio-modal modal fade" id="projectModal2" tabindex="-1" role="dialog"
                                 aria-hidden="true">
                                <div class="modal-content">
                                    <div class="close-modal" data-dismiss="modal">
                                        <div class="lr">
                                            <div class="rl">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-8 col-lg-offset-2">
                                                <div class="modal-body">
                                                    <h2>Project Heading</h2>
                                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet
                                                        consectetur.</p>

                                                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam
                                                        posuere quis tellus at vestibulum. Cras dignissim ligula nec
                                                        risus consectetur rutrum et non nisi. Duis et est non augue
                                                        laoreet tristique. Proin suscipit ut augue sit amet ultrices.
                                                        Nullam lacus lectus, venenatis a accumsan sed, elementum nec
                                                        nisl. Maecenas non nisi a dui hendrerit varius. Mauris sit amet
                                                        ante vitae nisl scelerisque interdum. Quisque in nulla arcu.
                                                        Pellentesque aliquam velit dolor, quis congue est tempor vel.
                                                        Suspendisse porttitor nec purus vitae faucibus. Sed congue
                                                        molestie diam in ultricies. Cras venenatis libero et lobortis
                                                        finibus. Pellentesque ultrices elit dolor, id porta lacus
                                                        consectetur ac. Nullam turpis metus, hendrerit et massa vel,
                                                        sollicitudin sagittis augue. Nullam pretium mi in ante lacinia,
                                                        nec interdum turpis fermentum. </p>

                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                                                        <i class="fa fa-times"></i> Close Project
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- jQuery -->
                            <script src="assets/js/jquery.js"></script>

                            <!-- Bootstrap Core JavaScript -->
                            <script src="assets/js/bootstrap.min.js"></script>
                            <script src="assets/js/jqBootstrapValidation.js"></script>


                            <!-- Plugin JavaScript -->
                            <script
                                src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
                            <script src="assets/js/classie.js"></script>
                            <script src="assets/js/cbpAnimatedHeader.js"></script>

                            <script type="text/javascript" src="assets/fancybox/jquery.fancybox.js"></script>
                            <script type="text/javascript" src="assets/fancybox/helpers/jquery.fancybox-buttons.js"></script>
                            <script type="text/javascript" src="assets/fancybox/jquery.fancybox-thumbs.js"></script>
                            <script type="text/javascript" src="assets/fancybox/jquery.fancybox-media.js"></script>

                            <!-- Contact Form JavaScript -->
                            <script src="assets/js/contact_me.js"></script>
                            <script src="admin/js/c.js"></script>


                            <!--EXPANDS MEMBER SECTION-->
                            <script type="text/javascript">
                                $('.row .btn').on('click', function (e) {
                                    e.preventDefault();
                                    var $this = $(this);
                                    var $collapse = $this.closest('.collapse-group').find('.collapse');
                                    $collapse.collapse('toggle');


                                    // scroll to the corresponding  div
                                    $('#member').animate({
                                        scrollTop: $(this).parent('#member').children('.collapse-group').offset('').top
                                    });

                                    $('#member-unit').slideDown('swing');
                                });
                            </script>


</body>

</html>
