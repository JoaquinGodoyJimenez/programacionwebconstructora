<h1>
    <?php echo ($action == 'edit') ? 'Modificar' : 'Nuevo'; ?> Proyecto
</h1>

<form class="container-fluid" method="POST" action="proyecto.php?action=<?php echo ($action); ?>"
    enctype="multipart/form-data">

    <div class="row">
        <div class="col-2">
            <label for="proyecto">Proyecto:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="proyecto" name="data[proyecto]"
                value="<?php echo isset($data[0]['proyecto']) ? $data[0]['proyecto'] : ''; ?>" minlength="3"
                maxlength="200">
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label for="descripcion">Descripción:</label>
        </div>
    </div>
    <div class="row">

        <div class="col-2">
            <input required="required" type="text" class="" id="descripcion" name="data[descripcion]"
                value="<?php echo isset($data[0]['descripcion']) ? $data[0]['descripcion'] : ''; ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <label for="fecha_inicio">Fecha Inicio:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <input required="required" type="date" class="" id="fecha_inicio" name="data[fecha_inicio]"
                value="<?php echo isset($data[0]['fecha_inicio']) ? $data[0]['fecha_inicio'] : ''; ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <label for="fecha_fin">Fecha Fin:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <input required="required" type="date" class="" id="fecha_fin" name="data[fecha_fin]"
                value="<?php echo isset($data[0]['fecha_fin']) ? $data[0]['fecha_fin'] : ''; ?>">
        </div>
    </div>

    <div class="row">
        <p></p>
    </div>

    <div class="row">
        <div class="col-2">
            <label for="id_departamento">Departamento:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_departamento]" required="required">
                <?php
                $selected = " ";
                foreach ($dataDepartamentos as $key => $depto):
                    if ($depto['id_departamento'] == $data[0]['id_departamento']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $depto['id_departamento']; ?>" <?php echo $selected; ?>>
                        <?php echo $depto['departamento'] ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <label for="archivo">Archivo adjunto:</label>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
        <?php if ($action == 'edit'): ?>
        <div class="alert alert-primary" role="alert">
        <a href="<?php echo $data[0]['archivo']?>" target="_blank">Descargar el adjunto actual</a>
        </div>
        <?php endif;?>
            <input type="file" name="archivo" class="form-control"
                value='<?php echo isset($data[0]['archivo']) ? $data[0]['archivo'] : ''; ?>' />
        </div>
    </div>

    <div class="row">
        <p></p>
    </div>


    <div class="row">
        <div class="col-12">
            <input type="submit" class="btn btn-primary mb-3" name="enviar" value="Guardar">
        </div>
    </div>

    <?
    if ($action == 'edit'): ?>
        <input type="hidden" name="data[id_proyecto]"
            value="<?php echo isset($data[0]['id_proyecto']) ? $data[0]['id_proyecto'] : ''; ?>" class="" />
    <? endif; ?>
</form>