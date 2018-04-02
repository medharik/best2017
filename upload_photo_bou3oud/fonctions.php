<?php 
function connecter()
{ //php completion kit
$cnx= new PDO('mysql:host=localhost;dbname=db2019', "root", "");
return $cnx;
}
function ajouter_produit($libelle,$prix,$chemin)
{
	$cnx=connecter();
$rp=	$cnx->prepare("insert into produit (libelle,prix,chemin) values (?,?,?)");

$rp->execute(array($libelle,$prix,$chemin));
}

function supprimer_produit($produit_id)
{
	$cnx=connecter();
$rp=	$cnx->prepare("delete from produit where id=?");

$rp->execute(array($produit_id));
}

function modifier_produit($produit_id,$new_libelle,$new_prix)
{
	$cnx=connecter();
$rp=	$cnx->prepare("update produit set libelle=?, prix=? where id=?");

$rp->execute(array($libelle,$prix,$produit_id));
}

function get_all()
{
	$cnx=connecter();
$rp=	$cnx->prepare("select * from produit");

$rp->execute(array());
$data=$rp->fetchAll();
return $data;
}


 ?>