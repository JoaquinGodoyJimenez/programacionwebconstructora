<h1>Datos proyecto</h1>

<form class="container-fluid" method="POST" action="alumnos.php?accion=<?php echo ($accion); ?>"
    enctype="multipart/form-data">
    <div class="row">
        <div class="col-2">
            <label for="id_proyecto" class="visually-hidden form-text">ID Proyecto:
            </label>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="id_proyecto" name="id_proyecto"
                value="<?php echo (isset($datos["id_proyecto"])) ? $datos["id_proyecto"] : ""; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label for="proyecto" class="visually-hidden">Proyecto:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="proyecto" name="proyecto"
                value="<?php echo (isset($datos["proyecto"])) ? $datos["proyecto"] : ""; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label for="descripcion" class="visually-hidden">Descripción:</label>
        </div>
    </div>
    <div class="row">

        <div class="col-2">
            <input required="required" type="text" class="" id="descripcion" name="descripcion"
                value="<?php echo (isset($datos["descripcion"])) ? $datos["descripcion"] : ""; ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <label for="fecha" class="visually-hidden">Fecha Inicio:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <input required="required" type="date" class="" id="fecha_inicio" name="fecha_inicio"
                value="<?php echo (isset($datos["fecha_inicio"])) ? $datos["fecha_inicio"] : ""; ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <label for="fecha" class="visually-hidden">Fecha Fin:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <input required="required" type="date" class="" id="fecha_fin" name="fecha_fin"
                value="<?php echo (isset($datos["fecha_fin"])) ? $datos["fecha_fin"] : ""; ?>">
        </div>
    </div>

    <div class="row">
        <p></p>
    </div>

    <div class="row">
        <div class="col-2">
            <label for="departamento" class="visually-hidden">ID Departamento:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="id_departamento" name="id_departamento"
                value="<?php echo (isset($datos["id_departamento"])) ? $datos["id_departamento"] : ""; ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <label for="archivo" class="visually-hidden">Archivo:</label>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <input type="file" name="archivo" />
        </div>
    </div>

    <div class="row">
        <p></p>
    </div>


    <div class="row">
        <div class="col-12">
            <input type="submit" class="btn btn-primary mb-3" name="guardar" value="Guardar">
        </div>
    </div>

    <?php if ($accion == "actualizar"): ?>
        <input type="hidden" name="id_proyecto_old" value="<?php echo $datos["id_proyecto"]; ?>" />
    <?php endif; ?>
</form>