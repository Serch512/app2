
<h2>USUARIOS</h2>
<a href="users/login">login</a>
<a href="users/add">Agregar usuario</a>

<a href="Groups">Grupos</a>
<table border="1">
	<tr>
		<th>ID</th>		
		<th>First name</th>		
		<th>Last Name</th>
		<th>edad</th>
		<th>email</th>
		<th>password</th>			
	</tr>
	
	<?php foreach($users as $user){ ?>
		<tr>
		<td><?php echo $user['id']; ?></td>
		<td><?php echo $user['nombre']; ?></td>
		<td><?php echo $user['seg_nom']; ?></td>
		<td><?php echo $user['edad']; ?></td>
		<td><?php echo $user['email']; ?></td>
		<td><?php echo $user['password']; ?></td>
		
		<td><a href="users/edit/<?php echo $user['id']; ?>">Editar</a></td>
		<td><a href="users/delete/<?php echo $user['id']; ?>">Eliminar</a></td>
		</tr>
		<?php } ?>
</table>