<?php 
function connecter()
{ //php completion kit
$cnx= new PDO('mysql:host=localhost;dbname=bestprojet1', 
	"root", "");
return $cnx;
}
function ajouter_produit($nom,$prix,$chemin,$details,$categorie_id)
{
	$cnx=connecter();
$rp=	$cnx->prepare("insert into produit (nom,prix,chemin,details,categorie_id) values (?,?,?,?,?)");
$rp->execute(array($nom,$prix,$chemin,$details,$categorie_id));
}

function ajouter_categorie($nom,$chemin)
{
	$cnx=connecter();
$rp=	$cnx->prepare("insert into categorie (nom,chemin) values (?,?)");
$rp->execute(array($nom,$chemin));

}



function supprimer($id,$table)
{
	$cnx=connecter();
$rp=	$cnx->prepare("delete from $table where id=?");

$rp->execute(array($id));
}


function modifier_produit($produit_id,$new_nom,$new_prix,$new_chemin,$categorie_id,$details)
{
	$cnx=connecter();
$rp=	$cnx->prepare("update produit set nom=?, prix=?, details=?,chemin=?,categorie_id=?  where id=?");

$rp->execute(array($new_nom,$prix,$details,$chemin,$categorie_id,$produit_id));
}

function modifier_categorie($categorie_id,$new_nom,$new_chemin)
{
	$cnx=connecter();
$rp=	$cnx->prepare("update categorie set nom=?, chemin=? where id=?");

$rp->execute(array($new_nom,$new_chemin,$categorie_id));
}
function get_all($table)
{
	$cnx=connecter();
$rp=	$cnx->prepare("select * from $table");

$rp->execute(array());
$data=$rp->fetchAll();
return $data;
}

//get by id
function get_by_id($id,$table)
{
	$cnx=connecter();
$rp=	$cnx->prepare("select * from $table where id =?");

$rp->execute(array($id));
$data=$rp->fetch();
return $data;
}

function  charger_fichier($infos){
$chemin="";
	extract($infos);
if(isset($name) && isset($tmp_name)){
$chemin="images/$name";
move_uploaded_file($tmp_name, $chemin);
}
return $chemin;
}



 ?>