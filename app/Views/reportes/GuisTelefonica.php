<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte del Viaje de Estudiante</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        @page {
            margin: 150px 30px 90px 80px;
        }

        header {
            position: fixed;
            top: -110px;
            left: 0px;
            right: 0px;
            height: 50px;
            color: white;
            text-align: center;
            line-height: 40px;
        }

        footer {
            position: fixed;
            bottom: -100px;
            left: 0px;
            right: 0px;
            height: 50px;
            background-color: #03a9f4;
            color: black;
            text-align: center;
            line-height: 35px;
        }

        #watermark {
            position: fixed;
            bottom: -1.5cm;
            left: -0.8cm;
            opacity: 1;
            width: 8cm;
            height: 8cm;
            z-index: -1000;
        }

        #titulo,
        #contenido {
            margin: 0px 25px;
        }

        #titulo2 {
            font-weight: bold;
            margin: 0px 30px;
            font-size: 1em;
            font-family: sans-serif;
            text-align: center;
        }

        .styled-table {
            border-collapse: collapse;
            margin: 1px 0px 0px;
            font-size: 14px;
            font-family: sans-serif;
            min-width: 400px;
            text-align: center;
            width: 100%;
        }

        .styled-table thead tr {
            background-color: #343a40;
            color: #ffffff;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #343a40;
        }

        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #343a40;
        }

        .firmas {
            position: absolute;
            bottom: 60px;
            left: 19px;
            width: 710px;
            text-align: center;
        }

        h2,
        h6 {
            margin: 0;
        }

        table img {
            display: block;
            margin: auto;
        }
    </style>
</head>

<body>
    <header>
        <table border="0" width="100%">
            <tr style="text-align: center;">
                <td width="20%">
                    <img src="data:image/png;base64,<?php echo $imagColegio ?>"
                        alt="Escudo Centro Educativo Mutual La Paz" width="100" height="100">
                </td>
                <td width="60%">
                    <h2 style="color: #000;">COOPERATIVA EDUCACIONAL "EL KENKO" R.L.</h2>
                    <h6 style="color: #000;">CENTRO EDUCATIVO "MUTUAL LA PAZ" <br>SIE-40730090 R.M. 2657<br>DISTRITO EL
                        ALTO-2 </h6>

                </td>
                <td width="20%">
                    <img src="data:image/png;base64,<?php echo $imagElAlto ?>" alt="Escudo de El Alto" width="100"
                        height="100">
                </td>
            </tr>
        </table>
    </header>

    <main>
        <div id="titulo2">
            <div class="big-size">Reporte de Lista de Automoviles</div>
        </div>
        <div id="contenido">
            <table class="styled-table" width="100%">
                <tr align="left">
                    <td colspan="2"><b>DATOS PERSONALES:</b></td>
                </tr>
                <tr align="left">
                    <td width="30%"><b>Nombre y Apellido:</b></td>
                    <td><?php echo $nombre ?> <?php echo $apellido ?></td>
                </tr>
                <tr align="left">
                    <td><b>CI:</b></td>
                    <td><?php echo $ci ?></td>
                </tr>
                <tr align="left">
                    <td><b>Teléfono:</b></td>
                    <td><?php echo $telefono ?></td>
                </tr>
                <tr align="left">
                    <td><b>Dirección:</b></td>
                    <td><?php echo $direccion ?></td>
                </tr>
            </table>
        </div>
      
        <?php if (!empty($datosguia)): ?>
            <table border="1" class="styled-table">
                <thead>
                    <tr></tr>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Correo Electronico</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>Fecha</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php $contador = 1; ?>
                    <?php foreach ($datosguia as $dato): ?>
                        <tr>
                            <td width="5%"><?= $contador++ ?></td>
                            <td width="10%"><?= esc($dato['nombre']) ?> <br> <b>Cargo:</b> <?= esc($dato['cargo']) ?></td>
                            <td width="10%"><?= esc($dato['correoelectronico']) ?></td>
                            <td width="10%"><?= esc($dato['telefono']) ?></td>
                            <td width="10%"><?= esc($dato['direccion']) ?></td>
                            <td width="20%"><?= esc($dato['date']) ?></td>
                           
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay datos del estudiante disponibles.</p>
        <?php endif; ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>