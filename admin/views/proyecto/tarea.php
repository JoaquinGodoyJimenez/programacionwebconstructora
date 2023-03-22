<h1 class="text-center">Tareas del proyecto:
    <?php echo $data[0]['proyecto']; ?>
</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <p><a class="btn btn-success" href="proyecto.php?action=newtask&id=<?php echo $data[0]['id_proyecto'];?>"  role="button">Ingresar una nueva tarea</a>
            </p>
        </div>
    </div>
    <table class="table table-responsive table-bordered">
        <thead>
            <tr>
                <th scope="col-md-1">#</th>
                <th scope="col-md-1">Tarea</th>
                <th scope="col-md-1">% Avance</th>
                <th scope="col-md-2">Operación</th>
            </tr>
        </thead>
        <tbody>
            <?php $nReg = 0;
            foreach ($data_tarea as $key => $tarea):
                $nReg++; ?>
                <tr>
                    <td scope="row">
                        <?php echo $tarea["id_tarea"] ?>
                    </td>
                    <td scope="row">
                        <?php echo $tarea["tarea"] ?>
                    </td>
                    <td scope="row">
                        <?php echo $tarea["avance"] ?>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="proyecto.php?action=deletetask&id=<?php echo $data[0]["id_proyecto"]; ?>&id_tarea=<?php echo $tarea["id_tarea"];?>"
                                type="button" class="btn btn-danger">Eliminar</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <th>
                    Se encontraron
                    <?php echo $nReg ?> registros.
                </th>
            </tr>
        </tbody>
    </table>