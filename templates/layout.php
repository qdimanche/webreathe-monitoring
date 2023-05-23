<?php require_once "../app/includes/module-collection.php"?>

<html>
<head>
    <title>Webreathe - Monitoring</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>

<?php include (dirname(__DIR__).'/app/components/navbar.php') ?>
<main class="container">
    <?php echo isset($content) ? $content : ''; ?>
</main>

<?php include (dirname(__DIR__).'/app/components/footer.php') ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="../../public/js/script.js" crossorigin="anonymous"></script>
</body>
</html>