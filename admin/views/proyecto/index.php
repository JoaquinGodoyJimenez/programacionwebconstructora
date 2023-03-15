
<h1>Proyectos</h1>
<a href="proyecto.php?action=new" class="btn btn-success">Nuevo</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col" class="col-md-1">id</th>
      <th scope="col" class="col-md-3">Proyecto</th>
      <th scope="col" class="col-md-3">descripcion</th>
      <th scope="col" class="col-md-1">Fecha inicial</th>
      <th scope="col" class="col-md-1">Fecha final</th>
      <th scope="col" class="col-md-3">Opciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($data as $key => $proyecto): ?>
    <tr>
      <th scope="row"><?php echo $proyecto['id_proyecto']; ?></th>
      <td><?php echo $proyecto['proyecto']; ?></td>
      <td><?php echo $proyecto['descripcion']; ?></td>
      <td><?php echo $proyecto['fecha_inicial']; ?></td>
      <td><?php echo $proyecto['fecha_final']; ?></td>
      <td>
          <div class="btn-group" role="group" aria-label="Menu Renglon">
            <a class="btn btn-primary" href="proyecto.php?action=edit&id=<?php echo $proyecto['id_proyecto']?>">Modificar</a>
            <a class="btn btn-danger" href="proyecto.php?action=delete&id=<?php echo $proyecto['id_proyecto']?>">Eliminar</a>
          </div>
      </td> 
    </tr>
    <?php endforeach; ?>
  </tbody>
  <tr>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col">Se encontraron <?php echo sizeof($data); ?> registros.</th>
    </tr>
</table>