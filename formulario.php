<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Promedio de notas</title>
</head>
<body>
    <form name="formulario" method="post" action="calculo.php">
        <div class="col-sm-7 text-center">
            <label for="nombre" class="col-sm-2 col-form-label">nombre:</label>
            <input type="text" class="form-control" name="nombre" id="nombre">
        </div>
        <div class="col-sm-7 text-center">
            <label for="nota1" class="col-sm-2 col-form-label">Laboratorio 1:</label>
            <input type="number" class="form-control" name="nota1" id="nota1">
        </div>
        <div class="col-sm-7 text-center">
            <label for="nota2" class="col-sm-2 col-form-label">Laboratorio 2:</label>
            <input type="number" class="form-control" name="nota2" id="nota2">
        </div>
        <div class="col-sm-7 text-center">
            <label for="parcial" class="col-sm-2 col-form-label">Parcial:</label>
            <input type="number" class="form-control" name="parcial" id="parcial">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
    </form>
</body>
</html>
