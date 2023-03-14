<h1>Departamento</h1>
<form method = "POST" action = "departamento.php?actions=<?php echo $action; ?>">
    <label class = "form-labbel">Nombre del departamento</label>
    <input type = "text" class = "form-control" name = "data[departamento]" placeholder = "Departamento" value = "<?php echo isset($data[0]['departamento'])?$data[0]['departamento'] :''; ?>">
    <div class = "mb-3">
        <input type = "submit" class = "btn btn-primary" name = "enviar" value = "Guardar">
    </div>
</form>