<html>
  <head>
  <link rel="stylesheet" href="../../css/admin.css">
      <title>
	  AdminPage
	  </title>
	  <div id="admin_header">
		<b><p style="color:#185dc6;font-size:20px" align="center">PAGE DE L'ADMINSTRATEUR </p></b>
	  </div>
	  <div id="emptyspace">
	  
	  </div>
  </head>
 <body>
 <div id="inscription">
    <table id="login_table">
	     <?php  session_start(); if(isset($_SESSION['error_admin'])===true){ echo '<p style="color:#FA0831;">mot de passe ou identifiant non valid!!</p>';}?>
       <form action="verif.php" method="POST">
		  <tr>
			<td>
			  <b><p style="color:#185dc6;">Identifiant :</p></b>
			</td>
			<td>
						   <input type="text" name="ident"/>
			</td>
			
			</tr>
			
		  <tr>
		    
		    <td>
				<b><p style="color:#185dc6;">Mot de Passe :</p></b>
			</td>
			<td>
				<input type="password" name="mdp"/>
			</td>
		 </tr>
		<tr>
			<td>
			  <br>
			    <input type="submit" value="login" />
			</td>
		</tr>
	</form>
</table>
</div>
</body>
</html>	