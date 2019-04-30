<!doctype html>
<head>
    <meta charset="utf-8">

    <title>Narrit</title>

    <link href="/bootstrap/dist/css/bootstrap-reboot.min.css" rel="stylesheet">
    <link href="/bootstrap/dist/css/bootstrap-grid.min.css" rel="stylesheet">
    <link href="/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/narrit.css" rel="stylesheet">

    <script src="/assets/js/jquery-3.0.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</head>

<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Narrit</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>

<main role="main" class="container">

    <div class="template default">

        <?php
        echo $content_for_layout;
        ?>

    </div>

</main>
<script src="/bootstrap/dist/js/bootstrap.bundle.js"></script>
<script src="/bootstrap/dist/js/bootstrap.js"></script>

</body>
</html>
