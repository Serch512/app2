<h2>GROUPS</h2>
<a href="Groups/add">Agregar Grupo</a>
<a href="Ssers">User</a>
<table border="1">
<tr>
<th> ID </th>
<th> Grupo </th>
<th> Opciones </th>
</tr>
<?php
foreach($groups as $group){
?>
<tr>
	<td><?php echo $group["id"];?></td>
	<td><?php echo $group["Group"];?></td>
    <td><a href="groups/edit/<?php echo $group['id']?>">Modificar</a> | <a href="groups/delete/<?php echo $group['id']?>">Eliminar</a></td>
<?php }#fin del foreach ?>
</table>