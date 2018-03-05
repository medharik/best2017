<?php 
include 'fonctions.php';
$data=get_all();
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title></title>
 </head>
 <body oncontextmenu="return true">
 <table align="center" width="80%" border="1">
 	<tr>
 		<td>id</td>
 		<td>libelle</td>
 		<td>prix</td>
 		<td>actions</td>
 	</tr>
 	<?php foreach ($data as $ligne): ?>
 		<tr>
 		<td><?php echo $ligne['id'] ?></td>
 		<td><?php echo $ligne['libelle'] ?></td>
 		<td><?php echo $ligne['prix'] ?></td>
 		<td><a href="delete.php?id=<?php echo $ligne['id'] ?>"       onclick="return confirm('supprimer?')">Supprimer</a></td>
 	</tr>
 	<?php endforeach ?>
 	


 </table>
 </body>
 </html>