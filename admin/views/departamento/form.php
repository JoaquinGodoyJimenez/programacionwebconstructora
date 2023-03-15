<h1>
  <?php echo ($action == 'edit') ? 'Modificar ' : 'Nuevo ' ?>Departamento
</h1>
<form method="POST" action="departamento.php?action=<?php echo $action; ?>">
  <div class="mb-3">
    <label class="form-label">Nombre del Departamento</label>
    <input type="text" name="data[departamento]" class="form-control" placeholder="Departamento"
      value="<?php echo isset($data[0]['departamento']) ? $data[0]['departamento'] : ''; ?>" required minlength="3" maxlength="50" />
  </div>
  <div class="mb-3">
    <?php if ($action == 'edit'): ?>
      <input type="hidden" name="data[id_departamento]"
        value="<?php echo isset($data[0]['id_departamento']) ? $data[0]['id_departamento'] : ''; ?>">
    <?php endif; ?>
    <input type="submit" name="enviar" value="Guardar" class="btn btn-primary" />
  </div>
</form>