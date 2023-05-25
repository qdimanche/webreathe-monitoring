<?php session_start(); ?>

<html>
<head>
    <title>Webreathe - Monitoring</title>
    <link rel="stylesheet" href="/public/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.27.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-moment@0.1.1"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<body>

<?php include(dirname(__DIR__) . '/app/components/navbar.php') ?>
<main class="container position-relative mt-10 mb-10">
    <?php echo isset($content) ? $content : ''; ?>
</main>

<?php include(dirname(__DIR__) . '/app/components/footer.php') ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>
</html>