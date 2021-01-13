<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MPU - Multiplayer United<?=!empty($viewOpts['page']['title']) ? ' | ' . $viewOpts['page']['title'] : ''?></title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="/public/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link href="/public/css/style.css?<?=uniqid()?>" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
            <div class="container">
                <a class="navbar-brand" href="/"><img src="/public/img/mpu-brand.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <?php
                $viewOpts['page']['section'] = empty($viewOpts['page']['section']) ? '' : $viewOpts['page']['section'];
                ?>

                <div class="collapse navbar-collapse" id="mainmenu">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item<?=$viewOpts['page']['section'] == 'home' ? ' active' : ''?>">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item<?=$viewOpts['page']['section'] == 'games' ? ' active' : ''?>">
                            <a href="#" class="nav-link mpu-dropdown-toggle" data-toggle="dropdown-games">Games</a>
                        </li>
                        <li class="nav-item<?=$viewOpts['page']['section'] == 'sections' ? ' active' : ''?>">
                            <a href="#" class="nav-link mpu-dropdown-toggle" data-toggle="dropdown-news">Sections</a>
                        </li>
                        <li class="nav-item<?=$viewOpts['page']['section'] == 'info' ? ' active' : ''?>">
                            <a href="#" class="nav-link mpu-dropdown-toggle" data-toggle="dropdown-info">Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://discord.gg/hxac7GzTEy">Join our Discord</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid dropdown-content bg-secondary" style="display: none; position: absolute; z-index: 1; padding: 1.5rem; ">
            <?php
            foreach (glob(ROOT . "/app/views/_menus/*.php") as $filename) {
                include $filename;
            }
            ?>
        </div>
    </header>

    <!-- Begin page content -->
    <main role="main" class="flex-shrink-0 mainContent">
        <?php
        include(views . '/content/' . $viewOpts['page']['content'] . '.php');
        ?>
    </main>

    <footer class="footer mt-auto py-3">
        <div class="container">
            <hr>
            <small class="text-muted">Copyright &copy; Multiplayer United, 1997 - <?=date('Y')?>. All Rights Reserved.</small>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="/public/js/app.js?<?=uniqid()?>"></script>

</body>

</html>
