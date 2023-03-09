<?php
print_r($data);

?>
<h1>Departamentos</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Departamento</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($data as $key => $departamento): ?>
    <tr>
      <th scope="row"><?php echo $departamento['id_departamento'] ?></th>
      <td>Mark</td>
    </tr>
  </tbody>
</table>