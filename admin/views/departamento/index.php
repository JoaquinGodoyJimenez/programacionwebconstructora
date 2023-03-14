<h1>Departamentos</h1>
<a href="departamento.php?action=new" class = "btn btn-success">Nuevo</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Departamento</th>
      <th>Opciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($data as $key => $departamento): ?>
    <tr>
      <th scope="row"><?php echo $departamento['id_departamento']; ?></th>
      <td><?php echo $departamento['departamento']; ?></td>
      <td>
        <div class="btn-group" role="group" aria-label="Basic example">
          <a class="btn btn-primary" href="departamento.php?action=edit&id=<?php echo $departamento['id_departamento'] ?>">Modificar</a>
          <a class="btn btn-danger" href="departamento.php?action=delete&id=<?php echo $departamento['id_departamento'] ?>">Eliminar</a>
        </div>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>