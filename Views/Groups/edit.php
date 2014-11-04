<h1>Modificar Grupo</h1>
<form action="Groups/edit" method="POST">
	<input type="hidden" name="id" value="<?php echo $group['id']?>">
	<p>Grupo: <input type="text" name="name" value="<?php echo $group['Group']?>"></p>
   	<p><input type="submit" value="Save"></p>
</form>