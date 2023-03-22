<h1 class="text-center">Proyectos</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <p><a class="btn btn-success" href="proyecto.php?action=new" role="button">Ingresar un proyecto nuevo</a>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-responsive table-bordered">
                <thead>
                    <tr>
                        <th scope="col-md-1">Nombre</th>
                        <th scope="col-md-1">Departamento</th>
                        <th scope="col-md-1">Descripción</th>
                        <th scope="col-md-1">Fecha de inicio</th>
                        <th scope="col-md-1">Fecha de fin</th>
                        <th scope="col-md-1">Archivo</th>
                        <th scope="col-md-2">Operación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nReg = 0;
                    foreach ($data as $key => $proyecto):
                        $nReg++; ?>
                        <tr>
                            <td>
                                <?php echo $proyecto["proyecto"] ?>
                            </td>
                            <td>
                                <?php echo $proyecto["departamento"] ?>
                            </td>
                            <td>
                                <?php echo $proyecto["descripcion"] ?>
                            </td>
                            <td>
                                <?php echo $proyecto["fecha_inicio"] ?>
                            </td>
                            <td>
                                <?php echo $proyecto["fecha_fin"] ?>
                            </td>

                            <td>
                                <?php echo $proyecto["archivo"] ?>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="proyecto.php?action=task&id=<?php echo $proyecto["id_proyecto"] ?>"
                                        type="button" class="btn btn-dark">Tareas</a>
                                    <a href="proyecto.php?action=edit&id=<?php echo $proyecto["id_proyecto"] ?>"
                                        type="button" class="btn btn-primary">Modificar</a>
                                    <a href="proyecto.php?action=delete&id=<?php echo $proyecto["id_proyecto"] ?>"
                                        type="button" class="btn btn-danger">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    <tr>
                        <th scope="row"></th>
                        <th scope="row"></th>
                        <th scope="row"></th>
                        <th scope="row"></th>
                        <th scope="row"></th>
                        <th scope="row"></th>
                        <th>
                            Se encontraron
                            <?php echo $nReg ?> registros.
                        </th>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>