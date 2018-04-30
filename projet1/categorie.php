<?php 
include 'fonctions.php';
extract($_POST);
extract($_GET);
$btn="ajouter";
if(isset($_FILES['chemin'])){
 $chemin= charger_fichier($_FILES['chemin']);
}
// si chemin
// si on veut ajouter
if(isset($nom) && !empty($nom) && isset($chemin) && !empty($chemin) && !isset($id)) {
  ajouter_categorie($nom, $chemin);
  header("location:categorie.php?add=ok");
}
//si suppression
if (isset($ids)) {
  supprimer($ids, "categorie");
}
//si consultation
if (isset($idc)) {
  $categorie_consulter=get_by_id($idc, "categorie");

}

//si edition 
if (isset($idm)) {
  $categorie_modifier=get_by_id($idm, "categorie");
  $btn="modifier";

}
//si modif

if(isset($nom) && !empty($nom) && isset($chemin) && !empty($chemin) && isset($id)) {
modifier_categorie($id, $nom, $chemin);
  header("location:categorie.php?upd=ok");
}


$categories=get_all("categorie");
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Catégories</title>
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
    <!-- menu admin -->
<nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">ESPACE ADMIN</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">ACCUEIL</a></li>
            <li><a href="#about">Catégories</a></li>
            <li><a href="#contact">Produits</a></li>
           
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
           
            <li class="active"><a href="./">Déconnexion<span class="sr-only"></span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<!-- form -->
<div class="container">
  <?php if (isset($add) && $add=='ok'): ?>
  <div class="alert alert-succes">
      ajout effefctué avec succès
  </div>
  <?php endif ?>
<form class="form-horizontal" action="categorie.php" method="post" enctype="multipart/form-data">
<fieldset>
  <?php if (isset($categorie_modifier)): ?>
    <input type="hidden" name="id"
     value="<?php echo $categorie_modifier['id']    ?>">
  <?php endif ?>

<!-- Form Name -->
<legend>Categorie :</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nom">Nom:</label>  
  <div class="col-md-4">
  <input id="nom" name="nom" type="text" placeholder="" class="form-control input-md" required="" value="<?php if(isset($categorie_modifier)) echo $categorie_modifier['nom'] ?>"  >
    
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="chemin">Images de la catégories</label>
  <div class="col-md-4">
    <input id="chemin" name="chemin" class="input-file" type="file">
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <button id="" name="" class="btn btn-primary"><?php echo $btn; ?></button>
  </div>
</div>

</fieldset>
</form>
<?php if (isset($categorie_consulter)): ?>
  <div>
    <h2><?php echo $categorie_consulter['nom'] ?></h2>
<img src="<?php echo $categorie_consulter['chemin'] ?>" alt="" width="100">
  </div>

<?php endif ?>

<hr>

<table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Photo</th>
                <th>action</th>
              </tr>
            </thead>
            <tbody>

<?php foreach ($categories as $c): ?>
  <tr>
                <td><?php echo $c['id']; ?></td>
                <td><?php echo $c['nom']; ?></td>
                <td><img src="<?php echo $c['chemin']; ?>" alt="" class="img-responsive" style="width: 100px  "></td>
                <td>
                  <a href="categorie.php?ids=<?php echo $c['id']; ?>" class="btn btn-danger" onclick="return confirm('voulez vous vraiment supprimer cet élément?')">Supprimer</a>
                  <a href="categorie.php?idm=<?php echo $c['id']; ?>" class="btn btn-warning">Modifier</a>
                  <a href="categorie.php?idc=<?php echo $c['id']; ?>" class="btn  btn-info">Consulter</a>

                </td>
              </tr>

<?php endforeach ?>
              



             
            </tbody>
          </table>

</div>

<!-- tableau -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>