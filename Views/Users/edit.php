<h1>Editar Usuario</h1>

<form action="users/edit" method="POST">
	<input type="hidden" name="id" value="<?php echo $user["id"]; ?>">
	<p>First name: <input type="text" name="nombre" value="<?php echo $user["nombre"]; ?>"></p>
	<p>Last name: <input type="text" name="seg_nom" value="<?php echo $user["seg_nom"]; ?>"></p>
	<p>Email: <input type="text" name="email" value="<?php echo $user["email"]; ?>"></p>
	<p>Username: <input type="text" name="Group_id" value="<?php echo $user["Group_id"]; ?>"></p>
	<p>Password: <input type="password" name="password" value="<?php echo $user["password"]; ?>"></p>
	<p><input type="submit" value="Save"></p>
</form>