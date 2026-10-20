<?php
TYPE_Include(TYPEWL_STRUCTURE);
Res_Include('MonProjet-class.php',RES_CLASS_GLOBALES);
TYPE_Include(TYPEWL_CONNEXION);
WB_Include('WL/HF/HF.php');

function DeclMonProjet() { 


CreerType($GLOBALS['_serveur_dah'],'serveur_dah',TYPEWL_CONNEXION,array('serveur_dah',null));
if (isset($GLOBALS['MonProjet']))$GLOBALS['MonProjet']->WB_DeclareVarGlobale('serveur_dah','_serveur_dah');
Operateur(95,GetProp(GetGlobal('_serveur_dah'),'Provider'),getRef('WinDevMySQL'));
Operateur(95,GetProp(GetGlobal('_serveur_dah'),'Utilisateur'),getRef('bezeid'));
Operateur(95,GetProp(GetGlobal('_serveur_dah'),'MotDePasse'),getRef('meytour4Bezeid'));
Operateur(95,GetProp(GetGlobal('_serveur_dah'),'Serveur'),getRef('localhost'));
Operateur(95,GetProp(GetGlobal('_serveur_dah'),'BaseDeDonnees'),getRef('bezeid'));
HOuvreConnexion(VersPrimitif(GetGlobal('_serveur_dah')));

}
?>