<?php
    require "Conexion/conexion.php";

    $consulta   = "SELECT * FROM `glpi_tickets`";
    $query      = mysqli_query($sql,$consulta);
    //$array      = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Document</title>
    <style>
        thead{
            text-align: center;
        }
        tbody{
            text-align: center;
        }
        form{
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="col-5">
    <table class="table">
        <thead>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>PROYECTO</th>
            <th>FECHA</th>
        </thead>
        <tbody>
            <?php foreach($query as $row){ ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['proyecto']; ?></td>
                <td><?php echo $row['date']; ?></td>
            </tr>
        </tbody>
            <?php } ?>
    </table>
    <form action="index.php" method="POST">
        <input type="text" name="proyecto" id="proyecto" placeholder="proyecto">
        <input type="text" name="ticket" id="ticket" placeholder="ticket">
        <input class="btn btn-success" type="submit" value="Agregar">
        <!--<button class="btn btn-primary" type="submit" name="btnAccion" value="Agregar">Agregar</button>-->
    </form>
    <?php
        if (isset($_POST['proyecto'])) {
            $proyecto = $_POST['proyecto'];
            $ticket = $_POST['ticket'];

            $sentencia = "UPDATE `glpi_tickets` SET proyecto='$proyecto' WHERE id=$ticket";

            if ($sql->query($sentencia) == true) {
                echo "<div><form action=''><h3>Se Registro en el campo Proyecto: $proyecto en el ticket: $ticket</h3></form></div>";
            }else{
                die("Error al insertar datos: ". $sql->error);
            }
        }
    ?>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>

<?php
    mysqli_close($sql);
?>