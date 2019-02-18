<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <?php require_once __DIR__ . "/../../index.php"; ?>
        <?php use Symfony\Component\Filesystem\Filesystem;

        $pathToVendor = (new Filesystem())->makePathRelative(VENDORS_ROOT, __DIR__);
        ?>

        <link rel="stylesheet" href="./<?= $pathToVendor ?>css/site.css">
        <link rel="stylesheet" href="./<?= $pathToVendor ?>css/bootstrap.min.css">
        <title>qwer</title>
        <script src="./<?= $pathToVendor ?>js/jquery-3.2.1.slim.min.js" charset="utf-8"></script>
        <script src="./<?= $pathToVendor ?>js/popper.min.js" charset="utf-8"></script>
        <script src="./<?= $pathToVendor ?>js/bootstrap.min.js" charset="utf-8"></script>
    </head>

    <body>

        <nav class="container-fluid navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Admission Registration</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navs start -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Registration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Log in</a>
                    </li>
                </ul>
                <!-- Navs Ends -->
            </div>

        </nav>

        <div class="container-fluid" id="content">
            <div class="col ">
                <h2>Latest Admission</h2>
                <p>University</p>
                <p>Starting time</p>
            </div>
            <div class="col">
                <h2>Latest Admission</h2>
                <p>University</p>
                <p>Starting time</p>
            </div>
            <div class="col">
                <h2>Latest Admission</h2>
                <p>University</p>
                <p>Starting time</p>
            </div>
        </div>
        <?php include_once __DIR__.'/partials/footer.php'; ?>
    </body>
</html>
