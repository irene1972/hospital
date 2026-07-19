<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>Hospital | <?php print $datos['titulo']; ?></title>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark">
        <a href="#" class="navbar-brand">Hospital</a>
    </nav>
    <div class="container-fluid">
        <div class="row-content">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="card p-4 mt-3 bg-info-subtle">
                    <div class="card-header text-center">
                        <h2><?php print $datos['subtitulo']; ?></h2>
                    </div>
                    <div class="card-body">