<h1>
  <?php echo ($action == 'edit') ? 'Modificar ' : 'Nuevo ' ?>Proyecto
</h1>
<form method="POST" action="proyecto.php?action=<?php echo $action; ?>">
  <div class="mb-3">
    <label class="form-label">Nombre del Proyecto</label>
    <input type="text" name="data[proyecto]" class="form-control" placeholder="Proyecto"
      value="<?php echo isset($data[0]['proyecto']) ? $data[0]['proyecto'] : ''; ?>" required minlength="3" maxlength="50" />
  </div>
  <div class="mb-3">
    <label class="form-label">Descripción</label>
    <input type="text" name="data[descripcion]" class="form-control" placeholder="Descripcion"
      value="<?php echo isset($data[0]['descripcion']) ? $data[0]['descripcion'] : ''; ?>" required minlength="3" maxlength="50" />
  </div>
  <div class="mb-3">
    <label class="form-label">Fecha inicial</label>
    <input type="date" name="data[fecha_inicial]" class="form-control"
      value="<?php echo isset($data[0]['fecha_inicial']) ? $data[0]['fecha_inicial'] : ''; ?>" requiered/>
  </div>
  <div class="mb-3">
    <label class="form-label">Fecha final</label>
    <input type="date" name="data[fecha_final]" class="form-control"
      value="<?php echo isset($data[0]['fecha_final']) ? $data[0]['fecha_final'] : ''; ?>" requiered/>
  </div>
  <div class="mb-3">
    <?php if ($action == 'edit'): ?>
      <input type="hidden" name="data[id_proyecto]"
        value="<?php echo isset($data[0]['id_proyecto']) ? $data[0]['id_proyecto'] : ''; ?>">
    <?php endif; ?>
    <input type="submit" name="enviar" value="Guardar" class="btn btn-primary" />
  </div>
</form>