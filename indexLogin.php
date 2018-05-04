<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
		<form method="POST" action="controller/UsuarioController.php">
			<table border="2" bgcolor="skyblue">
				<tr>
					<td><label>Usuario</label></td>
					<td><input type="text" name="username"></td>
				</tr>
				<tr>
					<td><label>Password</label></td>
					<td><input type="password" name="password"></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="login" value="Logeo"></td>
				</tr>
				
			</table>
		</form>
</body>
</html>