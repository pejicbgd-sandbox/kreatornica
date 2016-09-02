<?php include "helper.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Force latest IE rendering engine or ChromeFrame if installed -->
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <meta charset="utf-8">
    <META HTTP-EQUIV="content-type" CONTENT="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Creative - Bootstrap Admin Template</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <!--<link href="css/bootstrap-theme.css" rel="stylesheet">-->
    <!-- Bootstrap styles -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <!-- Generic page styles-->
    <link rel="stylesheet" href="css/adm-style.css">

    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet"/>
    <link href="css/font-awesome.min.css" rel="stylesheet"/>
    <!-- full calendar css-->
    <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet"/>
    <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet"/>
    <!-- easy pie chart-->
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css"
          media="screen"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
    <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/fullcalendar.css">
    <link href="css/widgets.css" rel="stylesheet">
    <link href="css/adm-style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet"/>
    <link href="css/xcharts.min.css" rel=" stylesheet">
    <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">


    <!---DATE PICKER-->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"/>
    <link rel="css/stylesheet" href="date-picker.css"/>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <script src="js/lte-ie7.js"></script>
    <![endif]-->
</head>

<body>
<!-- container section start -->
<section id="container" class="">


    <header class="header dark-bg">
        <div class="toggle-nav">
            <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i
                    class="icon_menu"></i></div>
        </div>

        <!--logo start-->
        <a href="index.html" class="logo">Club <span class="lite">Kreatornica</span></a>
        <!--logo end-->
    </header>

    <aside>
        <div id="sidebar" class="nav-collapse ">
            <ul class="sidebar-menu">
                <li class="active">
                    <a class="" href="?page=home-admin">
                        <i class="icon_house_alt"></i>
                        <span>Naslovna</span>

                    </a>
                </li>
                <li class="sub-menu">
                    <a href="?page=about-admin" class="">
                        <i class="icon_document_alt"></i>
                        <span>O nama</span>

                    </a>

                </li>
                <li class="sub-menu">
                    <a href="?page=member-admin" class="">
                        <i class="icon_desktop"></i>
                        <span>Članovi</span>

                    </a>

                </li>
                <li>
                    <a class="" href="?page=project-admin">
                        <i class="icon_genius"></i>
                        <span>Projekti</span>
                    </a>
                </li>
                <li>
                    <a class="" href="?page=gallery-admin">
                        <i class="icon_piechart"></i>
                        <span>Galerija</span>

                    </a>

                </li>

                <li class="sub-menu">
                    <a href="?page=contact-admin" class="">
                        <i class="icon_table"></i>
                        <span>Kontakt</span>

                    </a>

                </li>

                <li class="sub-menu">
                    <a href="?page=footer-admin" class="">
                        <i class="icon_documents_alt"></i>
                        <span>Donja navigacija</span>

                    </a>

                </li>

            </ul>
        </div>
    </aside>

    <section id="main-content">
        <section class="wrapper">
            <?php echo $twig->render($page . '.twig', $info); ?>
        </section>
    </section>
    <!--main content end-->
</section>

<script src="js/jquery.js"></script>
<script src="js/jquery-ui-1.10.4.min.js"></script>
<!-- bootstrap -->
<script src="js/bootstrap.min.js"></script>

<script>
    var viewData = {
        rootPath: "<?php echo ROOT_PATH; ?>"
    };
</script>
<script src="js/c.js"></script>
<!--<script src="js/custom.js"></script>-->
</body>
</html>
