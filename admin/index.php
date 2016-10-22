<?php include "admin-helper.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <META HTTP-EQUIV="content-type" CONTENT="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=" Kreatornica je udruženje umetnika i zanatlija iz mesta Kovačica u Srbiji. Osnovano je 2012 godine. Danas broji 16 članova raznog umetničkog interesovanja, čiji su zajednički ciljevi očuvanje i propagiranje starih zanata i ručnih radova, gajenje kulturne i umetničke raznolikosti u regionu, kao i međunarodna saradnja sa sličnim udruženjima u Evropi.">
    <meta name="author" content=" Kreatornica je udruženje umetnika i zanatlija iz mesta Kovačica u Srbiji.">
    <meta name="keyword" content="Kreatornica">

    <title>Admin - Kreatornica</title>
    <!-- bootstrap theme -->
    <!--<link href="css/bootstrap-theme.css" rel="stylesheet">-->
    <!-- Bootstrap styles -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <!-- Generic page styles-->
    <link rel="stylesheet" href="css/adm-style.css">

    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet"/>
    <link href="css/font-awesome.min.css" rel="stylesheet"/>
    <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">

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
        <a href="../index.php" class="logo">Club <span class="lite">Kreatornica</span></a>
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
