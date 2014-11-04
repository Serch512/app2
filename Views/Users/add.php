<h1>Agregar Usuario</h1>

<form action="Users/add" method="POST">
	<p>First name: <input type="text" name="nombre"></p>
	<p>Last name: <input type="text" name="seg_nom"></p>
	<p>Email: <input type="text" name="email"></p>
    <p>Edad: <input type="text" name="edad"></p>
    <p>Password: <input type="text" name="password"></p>
	<!-- <p>Grupo: 
    <select name="group_id">
    	<?php foreach($groups as $group){ ?>
    	<option value="<?php $group['id']; ?>"><?php $group['Group']; ?></option>
        <?php }?>
    </select>
    </p> -->
    
	<p><input type="submit" value="Save"></p>
</form>