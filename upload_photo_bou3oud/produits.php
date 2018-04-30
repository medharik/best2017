<?php 
include 'fonctions.php';
extract($_POST);//extraire les données du form $libelle,$prix
extract($_FILES['chemin']);//$name , $tmp_name
if(isset($name) && isset($tmp_name)){
$chemin="images/$name";
move_uploaded_file($tmp_name, $chemin);
}
if ( isset($libelle)  &&  isset($prix) && isset($chemin)) {
ajouter_produit($libelle, $prix, $chemin);
$message="ajout du produit $libelle est réussi";
}
$produits=get_all();
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="container">

<?php if (isset($message)): ?>
   <div class="alert alert-success" role="alert">
        <?php echo $message ?>
      </div>


 <?php endif ?> 

      <form class="form-horizontal" action="produits.php" method="post" enctype="multipart/form-data">
<fieldset>

<!-- Form Name -->
<legend>Produit:</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="libelle">Libellé : </label>  
  <div class="col-md-4">
  <input id="libelle" name="libelle" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="prix">Prix : </label>  
  <div class="col-md-4">
  <input id="prix" name="prix" type="text" placeholder="" class="form-control input-md" required="">
  <span class="help-block">en DHS</span>  
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="chemin">Photo :</label>
  <div class="col-md-4">
    <input id="chemin" name="chemin" class="input-file" type="file">
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <button id="" name="" class="btn btn-primary">Ajouter</button>
  </div>
</div>

</fieldset>
</form>

<hr>
<table class="table table-striped">
            <thead>
              <tr>
                <th>id</th>
                <th>Libellé</th>
                <th>Prix</th>
                <th>actions</th>
              </tr>
            </thead>
            <tbody>


<?php foreach ($produits as $p): ?>
   <tr>
                <td><?php echo $p['id'];?></td>
                <td><?php echo $p['libelle'];?></td>
                <td><?php echo $p['prix'];?></td>
                <td><img src="<?php echo $p['chemin'];?>" alt="" width="100"></td>
            
              </tr>

<?php endforeach ?>
             


            </tbody>
          </table>


    </div> <!-- fin container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>