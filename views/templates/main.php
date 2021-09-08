<?php
$url = $_SERVER['REQUEST_URI'];
$url = explode('?', $url);
$url = strtolower($url[0]);
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>linksWarehouse</title>
    <link rel="stylesheet" href="/public/vendors/bootstrap502/css/bootstrap.css">
    <link rel="shortcut icon" href="/img/chainIcon.svg">
    <script src="/public/vendors/bootstrap502/js/jquery-3.6.0.min.js"></script>
    <style>
        .linkCard:hover {
            background: #F7F7F7;
        }
    </style>
</head>
<body>


<header class="card-header p-1 mb-1 border-bottom">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/links/getall" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                <img src="/img/chainIcon.svg" alt="mdo" width="32" height="32" class="rounded-circle">
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/links/getall" class="nav-link px-2 <?php if ($url == "/links/getall") {
                        echo("link-secondary");
                    } else {
                        echo("link-dark");
                    }
                    ?>">Board</a></li>
                <li><a href="/links/getbyid" class="nav-link px-2 <?php if ($url == "/links/getbyid") {
                        echo("link-secondary");
                    } else {
                        echo("link-dark");
                    }
                    ?>">Your board</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" action="/links/getbysearch" method="post" <?php if ($url != "/links/getall") {echo("hidden");} ?>>
                <input type="search" name="query" class="form-control" placeholder="Search..." aria-label="Search">
            </form>

            <div>
                <a href="/pages/personal"">
                <img src="/img/personal.svg"
                     alt="mdo" width="32" height="32" class="rounded-circle">
                </a>
            </div>
        </div>
    </div>
</header>


<main style="min-height: 100vh">
    <?php require_once './views/' . $contentPage . '.php'; ?>
</main>

<footer class="card-footer border-top">
    <div class="row m-auto justify-content-center">
        <div class="col-auto ">
            <small class="d-block  text-dark ">Support:</small>
        </div>
        <div class="col-auto">
            <a href="https://www.instagram.com/_morozzov" target="_blank" class="text-decoration-none">
                <small class="d-block  text-muted ">Instagram</small>
            </a>
        </div>
        <div class="col-auto">
            <a href="https://t.me/moroz_zov" target="_blank" class="text-decoration-none">
                <small class="d-block  text-muted ">Telegram</small>
            </a>
        </div>
        <div class="col-auto">
            <a href="https://vk.com/moroz_zov" target="_blank" class="text-decoration-none">
                <small class="d-block  text-muted ">VK</small>
            </a>
        </div>
    </div>

</footer>


<script src="/public/vendors/bootstrap502/js/bootstrap.bundle.js"></script>

</body>
</html>