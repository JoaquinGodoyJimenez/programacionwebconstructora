<h1 class="text-center">Proyectos</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <p><a class="btn btn-success" href="proyecto.php?accion=crear" role="button">Ingresar un proyecto nuevo</a>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-responsive table-bordered">
                <thead>
                    <tr>
                        <th scope="col">id proyecto</th>
                        <th scope="col">nombre del proyecto</th>
                        <th scope="col">descripción</th>
                        <th scope="col">fecha de inicio</th>
                        <th scope="col">fecha de fin</th>
                        <th scope="col">id departamento</th>
                        <th scope="col">archivo</th>
                        <th scope="col">operación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos as $key => $proyecto): ?>
                        <tr>
                            <td>
                                <?php echo $proyecto["id_proyecto"] ?>
                            </td>
                            <td>
                                <?php echo $proyecto["proyecto"] ?>
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
                                <?php echo $proyecto["id_departamento"] ?>
                            </td>
                            <td>
                                <?php echo $proyecto["archivo"] ?>
                            </td>
                            <td>
                                <a class="btn btn-primary"
                                    href="proyecto.php?accion=actualizar&id_proyecto=<?php echo $proyecto["id_proyecto"] ?>"
                                    role="button">Editar</a>
                                <a class="btn btn-danger"
                                    href="proyecto.php?accion=borrar&id_proyecto=<?php echo $proyecto["id_proyecto"] ?>"
                                    role="button">Borrar</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>