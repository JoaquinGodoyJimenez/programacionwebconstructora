<h1>Proyecto</h1>
<form method="POST" action="proyecto.php?action=<?php echo $action; ?>" enctype="multipart/form-data">
<div class="mb-3">
  <div class="row">
    <div class="col">
      <label class="form-label">Proyecto</label>
      <input type="text" name="data[proyecto]" class="form-control" 
      placeholder="Proyecto" value="<?php echo isset($data[0]['proyecto'])
      ?$data[0]['proyecto']:''; ?>"  required>
    </div>
    <div class="col-1">
      &nbsp;
    </div>
    <div class="col">
      <label class="form-label">Descripcion</label>
      <input type="text" name="data[descripcion]" class="form-control" 
      placeholder="Descripcion" value="<?php echo isset($data[0]['descripcion'])
      ?$data[0]['descripcion']:''; ?>">
    </div>
  </div>
  <div class="row">
    <div class="col">
      <label class="form-label">Fecha inicio</label>
      <input type="date" name="data[fecha_inicial]" class="form-control" 
      placeholder="Fecha de inicio" value="<?php echo isset($data[0]['fecha_inicial'])
      ?$data[0]['fecha_inicial']:''; ?>">
    </div>
    <div class="col-1">
      &nbsp;
    </div>
    <div class="col">
      <label class="form-label">Fecha fin</label>
      <input type="date" name="data[fecha_final]" class="form-control" 
      placeholder="Fecha de fin" value="<?php echo isset($data[0]['fecha_final'])
      ?$data[0]['fecha_final']:''; ?>">
    </div>
  </div>
  <div class='row'>
    <div class="col">
      <label class='form-label'>Departamento</label>
      <select name='data[id_departamento]' class='form-control'  required>
      <?php 
      foreach($datadepartamentos as $key => $depto): 
      $selected = " ";
        if($depto['id_departamento']==$data[0]['id_departamento']):
          $selected = " selected";
        endif;
      ?>    
      
        <option value="<?php echo $depto['id_departamento'];?>" <?php echo $selected; ?>>
        <?php echo $depto['departamento'];?>
        </option>
      <?php endforeach; ?>
      </select>
      </div>
      <div class="col-1">
      &nbsp;
    </div>
      <div class="col">
      <label class="form-label">Proyecto</label>
      <input type="file" name="archivo" class="form-control" 
      placeholder="Proyecto" value="<?php echo isset($data[0]['proyecto'])
      ?$data[0]['proyecto']:''; ?>"  required minlength="3" maxlength="200">
    </div>
  </div> 
</div>


<div class="mb-3">
    <?php if($action=='edit'): ?>
        <input type="hidden" name="data[id_proyecto]" value="<?php echo $data[0]['id_proyecto']; ?>"/>
    <?php endif; ?>
<input type="submit" name="enviar" value="Guardar" class="btn btn-primary">    
</div>

</form>
