<!doctype html>
<html lang="en">
<head>
    <title>
        <?php echo $this->page->generateTitle(); ?>
    </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>-->
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->

    <?php
        $this->page->generateCss();
    ?>

    <style>
        body { padding-top: 70px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top ">
            <div class="container">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">SPK UNIVERSITAS</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Kriteria</a></li>
                            <li><a href="#">Universitas</a></li>
                            <li><a href="#">Rangking</a></li>
                        </ul>

                    </div><!-- /.navbar-collapse -->
                </div>


            </div>
        </nav>
    </div>

    <div class="container">

    </div>

    <?php
            $this->page->generateJs();
    ?>

</body>
</html>