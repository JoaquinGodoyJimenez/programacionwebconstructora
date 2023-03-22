<h1 class="text-center">Departamentos</h1>
<a href="departamento.php?action=new" class="btn btn-success">Nuevo</a>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
            <th scope="col" class="col-md-1">Id</th>
            <th scope="col" class="col-md-8">Departamento</th>
            <th scope="col" class="col-md-3">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php $nReg = 0;
        foreach ($data as $key => $departamento):
            $nReg++; ?>
            <tr>
                <th scope="row">
                    <?php echo $departamento["id_departamento"] ?>
                </th>
                <th scope="row">
                    <?php echo $departamento["departamento"] ?>
                </th>
                <th>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="departamento.php?action=edit&id=<?php echo $departamento["id_departamento"] ?>"
                            type="button" class="btn btn-primary">Modificar</a>
                        <a href="departamento.php?action=delete&id=<?php echo $departamento["id_departamento"] ?>"
                            type="button" class="btn btn-danger">Eliminar</a>
                    </div>
                </th>
            </tr>
        <?php endforeach; ?>
        <tr>
            <th scope="col"></th>
            <th scope="col"></th>
            <th>
                Se encontraron
                <?php echo $nReg ?> registros.
            </th>
        </tr>
    </tbody>
</table>