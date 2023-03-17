
<h1>Proyecto</h1>
<a href="proyecto.php?action=new" class="btn btn-success">Nuevo</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col" class="col-md-1">#</th>
      <th scope="col" class="col-md-1">Departamento</th>
      <th scope="col" class="col-md-1">Proyecto</th>
      <th scope="col" class="col-md-1">Descripcion</th>
      <th scope="col" class="col-md-1">Fecha inicial</th>
      <th scope="col" class="col-md-1">Fecha fin</th>
      <th scope="col" class="col-md-2">Opciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($data as $key => $proyecto): ?>
    <tr>
      <th scope="row"><?php echo $proyecto['id_proyecto']; ?></th>
      <th scope="row"><?php echo $proyecto['departamento']; ?></td>
      <td><?php echo $proyecto['proyecto']; ?></td>
      <td><?php echo $proyecto['descripcion']; ?></td>
      <td><?php echo $proyecto['fecha_inicial']; ?></td>
      <td><?php echo $proyecto['fecha_final']; ?></td>
      
      <td>
          <div class="btn-group" role="group" aria-label="Menu Renglon">
          <a class="btn btn-dark" href="proyecto.php?action=task&id=<?php echo $proyecto['id_proyecto']; ?>">Tareas</a>
            <a class="btn btn-primary" href="proyecto.php?action=edit&id=<?php echo $proyecto['id_proyecto']; ?>">Modificar</a>
            <a class="btn btn-danger" href="proyecto.php?action=delete&id=<?php echo $proyecto['id_proyecto']; ?>">Eliminar</a>
        </div>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
  <tr>
      <th scope="row"></th>
      <th scope="row"></th>
      <th scope="row"></th>
      <th scope="row"></th>
      <th scope="row"></th>
      <th scope="row">Se encontraron <?php echo sizeof($data); ?>  registros<th>
  </tr>
</table>
