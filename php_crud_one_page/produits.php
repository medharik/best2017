<?php 
include 'fonctions.php';
extract($_GET);//extraire les infos du lien dans  variable
extract($_POST);//extraire les infos du form dans des variables

//si envoi libelle et prix
if (isset($libelle) && isset($prix)) {
  ajouter_produit($libelle, $prix);
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
    <h1>Liste des produits</h1>
<div class="container">
  
  <form class="form-horizontal" action="produits.php" method="post">
<fieldset>

<!-- Form Name -->
<legend>Nouveau produit :</legend>

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
  <span class="help-block">en DHs</span>  
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

<table class="table table-striped">
            <thead>
              <tr>
                <th>id</th>
                <th>Libellé</th>
                <th>Prix</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
             

<?php foreach ($produits as $p): ?>
   <tr>
                <td><?php echo $p['id'] ?></td>
                <td><?php echo $p['libelle'] ?></td>
                <td><?php echo $p['prix'] ?></td>
                <td></td>
              </tr>
<?php endforeach ?>

             
             
            </tbody>
          </table>


</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>