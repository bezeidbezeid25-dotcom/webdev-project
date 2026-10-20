<?php
//#25.0.185.0 bz1
ob_start();define('UNICODE_PAGE_UTF8',false);
$gszId='bz1	PAGE_INDEX	20261020105422';
//-----------------------------------------------------------------------
// Include standard (définition des types, fonctions utilitaires)
//-----------------------------------------------------------------------
$CheminRepRes='./res/';
require_once($CheminRepRes.'WD25.0/WDFramework.php');
WB_Include('Architecture.php');
WB_Include('Interface.php');
WB_Include('HF.php');
IHM_Include('CSaisie');
IHM_Include('CBouton');
IHM_Include('CTableAjax');
IHM_Include('CSaisieNumerique');


Res_Include('MonProjet-class.php',RES_CLASS_GLOBALES);
WB_Include('WL/PAGE/Page.php');
WB_Include('HF.php');
WB_Include('WL/HF/HF.php');
WB_Include('IHM/Champ/Liste/Liste.php');
WB_Include('Engine.php');
// Equivalent de [%URL()%]
$gszURL='index.php';
$j=1;$i=1;
session_start();
// protection contre register_globals = on
unset($PAGE_INDEX);
if(SID!='')$gszURL.='?'.SID;

ChangeAlphabet(1,false);
ChangeNation(1,1);
$gtabCheminPage = array();
$gszCheminPageInverse='./';
$gtabCheminPage['PAGE_INDEX']=array(5=>array('NOM'=>'index','URL'=>'./'));

EnvSet('JOURSSEMAINE',array("lundi","mardi","mercredi","jeudi","vendredi","samedi","dimanche"));
EnvSet('MOIS',array("janvier","février","mars","avril","mai","juin","juillet","août","septembre","octobre","novembre","décembre"));
EnvSet('HCreationAutoActive',true);
EnvSet('FORMATDATESYSTEME','DD/MM/YYYY');
EnvSet('FORMATHEURESYSTEME','HH:MM');
EnvSet('UNITESTAILLESFICHIER',array("o","Ko","Mo","Go","To","Po"));
$_gszSEPDEVISE = "€";
$_gszSEPDEC = ",";
$_gszSEPMIL = " ";
//-----------------------------------------------------------------------
//  Restauration de contexte 
//-----------------------------------------------------------------------
RechargementPageSiBesoin('PAGE_INDEX');
$gTabVarSession = GetSessionVar();
$_bContextePageExiste = isset($gTabVarSession['PAGE_INDEX']);
$_bContexteProjetExiste = isset($gTabVarSession['MonProjet']);
if ($_bContexteProjetExiste) {
	// Le contexte du projet existe, on le restaure
	$MonProjet= $gTabVarSession['MonProjet'];
	$MonProjet->WB_RestaureContexte();
}
if ($_bContextePageExiste) {
	// Le contexte de la page existe, on le restaure
	$PAGE_INDEX= $gTabVarSession['PAGE_INDEX'];
	$PAGE_INDEX->WB_RestaureContexte();
$MaPage = &$PAGE_INDEX;
}
//-----------------------------------------------------------------------
// Déclaration de la page et de ses champs 
//-----------------------------------------------------------------------
// le 'if (isset())' gère le cas ou session.bug_compat_42 est à VRAI
if (!isset($PAGE_INDEX)) {
$PAGE_INDEX= new CPage(true);
$PAGE_INDEX->Nom = 'PAGE_index';
$PAGE_INDEX->NomPhysique = basename (  __FILE__ ,substr(__FILE__,-4));
$PAGE_INDEX->Alias = 'PAGE_INDEX';
$PAGE_INDEX->m_sNomPHP = 'PAGE_INDEX';
$PAGE_INDEX->Libelle = 'index';
$PAGE_INDEX->bUTF8 = true;
$PAGE_INDEX->bHTML5 = true;
$PAGE_INDEX->bAvecContexte = true;
$PAGE_INDEX->sFichierPalette = '.\\res\\GreyNix.wpc';
$PAGE_INDEX->Plan = 1;
$PAGE_INDEX->ImageFond = '';
$MaPage = &$PAGE_INDEX;
$A1_SAI_nom=&CreerChamp('CSaisie');$PAGE_INDEX->WB_AjouteChamp('SAI_nom','A1',$A1_SAI_nom,'A1_SAI_nom');
$A1_SAI_nom->SetATTMISEABLANC(true);
$A1_SAI_nom->SetChampFormate(false);
$A1_SAI_nom->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A1_SAI_nom->m_eBarreOutilsMode = 0;
$A1_SAI_nom->m_bLibelleRiche=true;

$A2_SAI_SansNom2=&CreerChamp('CSaisie');$PAGE_INDEX->WB_AjouteChamp('SAI_SansNom2','A2',$A2_SAI_SansNom2,'A2_SAI_SansNom2');
$A2_SAI_SansNom2->SetATTMISEABLANC(true);
$A2_SAI_SansNom2->SetChampFormate(false);
$A2_SAI_SansNom2->m_sBarreOutilsOptions = <<<EOT
{"FNA":{"nSeparateurs":1},"FHE":{"nSeparateurs":2},"GRA":{"nSeparateurs":1},"BAR":{"nSeparateurs":2},"COL":{"nSeparateurs":1},"COF":{"nSeparateurs":2},"AGA":{"nSeparateurs":1},"AJU":{"nSeparateurs":2},"LNU":{"nSeparateurs":1},"LPU":{"nSeparateurs":2},"RMO":{"nSeparateurs":1},"RPL":{"nSeparateurs":2},"EXP":{"nSeparateurs":1},"IND":{"nSeparateurs":2},"LNK":{"nSeparateurs":1},"IMG":{"nSeparateurs":2}}
EOT;
$A2_SAI_SansNom2->m_eBarreOutilsMode = 0;
$A2_SAI_SansNom2->m_bLibelleRiche=true;

$A3_BTN_Ajouter=&CreerChamp('CBouton');$PAGE_INDEX->WB_AjouteChamp('BTN_Ajouter','A3',$A3_BTN_Ajouter,'A3_BTN_Ajouter');
$A3_BTN_Ajouter->m_bLibelleRiche=true;

$A4_TABLE_User1=&CreerChamp('CTableAjax');$PAGE_INDEX->WB_AjouteChamp('TABLE_User1','A4',$A4_TABLE_User1,'A4_TABLE_User1');
$A4_TABLE_User1->m_bHauteurLigneVariable=true;
$A4_TABLE_User1->m_nNbColonnesOuAttributs=3;
$A4_TABLE_User1->SetMaxLignePage(15);
$A4_TABLE_User1->SetFirstIndex(0);
$A4_TABLE_User1->Visible=1;
$A4_TABLE_User1->Etat=0;
$A4_TABLE_User1->nModeSelection=1;

$A5_COL_IDuser1=&CreerChamp('CSaisieNumerique');$PAGE_INDEX->WB_AjouteChamp('COL_IDuser1','A5',$A5_COL_IDuser1,'A5_COL_IDuser1');
$A4_TABLE_User1->AjouteColonne('A5_COL_IDuser1','COL_IDuser1','A5', 5601, 0,'user1','IDuser1');
$A4_TABLE_User1->TabColonnes[1]->ChampFormat->Masque='+9 999 999 999 999 999 999';
$A4_TABLE_User1->TabColonnes[1]->Visible=1;
$A4_TABLE_User1->TabColonnes[1]->Etat=0;
$A4_TABLE_User1->TabColonnes[1]->bColonneLien=0;
$A4_TABLE_User1->TabColonnes[1]->SetTriable(true);
$A4_TABLE_User1->TabColonnes[1]->SetAvecLoupe(true);
$A4_TABLE_User1->TabColonnes[1]->m_bAvecFiltre=true;
$A4_TABLE_User1->TabColonnes[1]->m_eDeplaceInsere = 4;
$A4_TABLE_User1->TabColonnes[1]->m_sBulle='';
$A5_COL_IDuser1->m_eAction=6;
$A5_COL_IDuser1->m_sPageAction='';
$A5_COL_IDuser1->m_bLibelleRiche=true;

$A6_COL_Nom=&CreerChamp('CSaisie');$PAGE_INDEX->WB_AjouteChamp('COL_Nom','A6',$A6_COL_Nom,'A6_COL_Nom');
$A4_TABLE_User1->AjouteColonne('A6_COL_Nom','COL_Nom','A6', 5600, 1,'user1','nom');
$A4_TABLE_User1->TabColonnes[2]->Visible=1;
$A4_TABLE_User1->TabColonnes[2]->Etat=0;
$A4_TABLE_User1->TabColonnes[2]->bColonneLien=0;
$A4_TABLE_User1->TabColonnes[2]->SetTriable(true);
$A4_TABLE_User1->TabColonnes[2]->SetAvecLoupe(true);
$A4_TABLE_User1->TabColonnes[2]->m_bAvecFiltre=true;
$A4_TABLE_User1->TabColonnes[2]->m_eDeplaceInsere = 4;
$A4_TABLE_User1->TabColonnes[2]->m_sBulle='';
$A6_COL_Nom->m_eAction=6;
$A6_COL_Nom->m_sPageAction='';
$A6_COL_Nom->m_bLibelleRiche=true;

$A7_COL_Tel=&CreerChamp('CSaisieNumerique');$PAGE_INDEX->WB_AjouteChamp('COL_Tel','A7',$A7_COL_Tel,'A7_COL_Tel');
$A4_TABLE_User1->AjouteColonne('A7_COL_Tel','COL_Tel','A7', 5601, 2,'user1','tel');
$A4_TABLE_User1->TabColonnes[3]->ChampFormat->Masque='+999 999 999';
$A4_TABLE_User1->TabColonnes[3]->Visible=1;
$A4_TABLE_User1->TabColonnes[3]->Etat=0;
$A4_TABLE_User1->TabColonnes[3]->bColonneLien=0;
$A4_TABLE_User1->TabColonnes[3]->SetTriable(true);
$A4_TABLE_User1->TabColonnes[3]->SetAvecLoupe(true);
$A4_TABLE_User1->TabColonnes[3]->m_bAvecFiltre=true;
$A4_TABLE_User1->TabColonnes[3]->m_eDeplaceInsere = 4;
$A4_TABLE_User1->TabColonnes[3]->m_sBulle='';
$A7_COL_Tel->m_eAction=6;
$A7_COL_Tel->m_sPageAction='';
$A7_COL_Tel->m_bLibelleRiche=true;



//-----------------------------------------------------------------------
//  Initialisation de la valeur des champs
//-----------------------------------------------------------------------
$A1_SAI_nom->Couleur = 0x000000;
$A1_SAI_nom->CouleurInitiale = 0x000000;
$A1_SAI_nom->CouleurFond = 0xFFFFFF;
$A1_SAI_nom->CouleurFondInitiale = 0xFFFFFF;
$A1_SAI_nom->Libelle = function_exists("construireTexteRiche_A1_SAI_nom") ? null : 'nom';
$A1_SAI_nom->Masque = '0';
$A1_SAI_nom->m_nHauteur = 36;
$A1_SAI_nom->m_nLargeur = 250;
$A1_SAI_nom->m_nOpacite = 100;
$A1_SAI_nom->m_nCadrageHorizontal = -1;
$A1_SAI_nom->m_nCadrageVertical = 1;
$A1_SAI_nom->m_Police->m_bGras = false;
$A1_SAI_nom->m_Police->m_bItalique = false;
$A1_SAI_nom->m_Police->m_bSouligne = false;
$A1_SAI_nom->m_Police->m_sNom = 'Roboto, Helvetica, Arial, sans-serif';
$A1_SAI_nom->m_Police->m_nTaille = '14px';
$A1_SAI_nom->m_nX = 107;
$A1_SAI_nom->m_nY = 100;
$A1_SAI_nom->m_clCouleurJauge = 0x000000;
$A1_SAI_nom->BoutonCalendrier = 0;
$A1_SAI_nom->EtatInitial = 0;
$A1_SAI_nom->VisibleInitial = 1;
$A1_SAI_nom->YInitial = 0;
$A1_SAI_nom->NombreColonne = 0;
$A1_SAI_nom->BulleTitre = '';
$A1_SAI_nom->JetonActif = false;
$A1_SAI_nom->JetonListeSeparateur = '';
$A1_SAI_nom->JetonAutoriseDoublon = false;
$A1_SAI_nom->JetonSupprimable = true;

$A1_SAI_nom->SetLiaisonFichier('user1', 'nom');

$A1_SAI_nom->lierVM('PAGE_index','SAI_nom','A1_SAI_nom');
$A2_SAI_SansNom2->Couleur = 0x000000;
$A2_SAI_SansNom2->CouleurInitiale = 0x000000;
$A2_SAI_SansNom2->CouleurFond = 0xFFFFFF;
$A2_SAI_SansNom2->CouleurFondInitiale = 0xFFFFFF;
$A2_SAI_SansNom2->Libelle = function_exists("construireTexteRiche_A2_SAI_SansNom2") ? null : 'Champ de saisie';
$A2_SAI_SansNom2->Masque = '0';
$A2_SAI_SansNom2->m_nHauteur = 36;
$A2_SAI_SansNom2->m_nLargeur = 250;
$A2_SAI_SansNom2->m_nOpacite = 100;
$A2_SAI_SansNom2->m_nCadrageHorizontal = -1;
$A2_SAI_SansNom2->m_nCadrageVertical = 1;
$A2_SAI_SansNom2->m_Police->m_bGras = false;
$A2_SAI_SansNom2->m_Police->m_bItalique = false;
$A2_SAI_SansNom2->m_Police->m_bSouligne = false;
$A2_SAI_SansNom2->m_Police->m_sNom = 'Roboto, Helvetica, Arial, sans-serif';
$A2_SAI_SansNom2->m_Police->m_nTaille = '14px';
$A2_SAI_SansNom2->m_nX = 107;
$A2_SAI_SansNom2->m_nY = 153;
$A2_SAI_SansNom2->m_clCouleurJauge = 0x000000;
$A2_SAI_SansNom2->BoutonCalendrier = 0;
$A2_SAI_SansNom2->EtatInitial = 0;
$A2_SAI_SansNom2->VisibleInitial = 1;
$A2_SAI_SansNom2->YInitial = 0;
$A2_SAI_SansNom2->NombreColonne = 0;
$A2_SAI_SansNom2->BulleTitre = '';
$A2_SAI_SansNom2->JetonActif = false;
$A2_SAI_SansNom2->JetonListeSeparateur = '';
$A2_SAI_SansNom2->JetonAutoriseDoublon = false;
$A2_SAI_SansNom2->JetonSupprimable = true;

$A2_SAI_SansNom2->SetLiaisonFichier('user1', 'tel');

$A2_SAI_SansNom2->lierVM('PAGE_index','SAI_SansNom2','A2_SAI_SansNom2');
$A3_BTN_Ajouter->Libelle = function_exists("construireTexteRiche_A3_BTN_Ajouter") ? null : 'ajouter';
$A3_BTN_Ajouter->JetonActif = false;


$A3_BTN_Ajouter->lierVM('PAGE_index','BTN_Ajouter','A3_BTN_Ajouter');
$A4_TABLE_User1->Couleur = 0x68635F;
$A4_TABLE_User1->CouleurInitiale = 0x68635F;
$A4_TABLE_User1->CouleurFond = 0xF5F5F5;
$A4_TABLE_User1->CouleurFondInitiale = 0xF5F5F5;
$A4_TABLE_User1->Valeur = '';
$A4_TABLE_User1->Libelle = ' user1';
$A4_TABLE_User1->m_nHauteur = 405;
$A4_TABLE_User1->m_nLargeur = 543;
$A4_TABLE_User1->m_nOpacite = 100;
$A4_TABLE_User1->m_Police->m_bGras = false;
$A4_TABLE_User1->m_Police->m_bItalique = false;
$A4_TABLE_User1->m_Police->m_bSouligne = false;
$A4_TABLE_User1->m_nX = 0;
$A4_TABLE_User1->m_nY = 195;
$A4_TABLE_User1->m_clCouleurJauge = 0x000000;
$A4_TABLE_User1->BoutonCalendrier = 0;
$A4_TABLE_User1->EtatInitial = 0;
$A4_TABLE_User1->VisibleInitial = 1;
$A4_TABLE_User1->YInitial = 0;
$A4_TABLE_User1->NombreColonne = 3;
$A4_TABLE_User1->BulleTitre = '';
$A4_TABLE_User1->JetonActif = false;
$A4_TABLE_User1->JetonListeSeparateur = '';
$A4_TABLE_User1->JetonAutoriseDoublon = false;
$A4_TABLE_User1->JetonSupprimable = false;


$A4_TABLE_User1->lierVM('PAGE_index','TABLE_User1','A4_TABLE_User1');
$A5_COL_IDuser1->Couleur = 0x68635F;
$A5_COL_IDuser1->CouleurInitiale = 0x68635F;
$A5_COL_IDuser1->Libelle = function_exists("construireTexteRiche_A5_COL_IDuser1") ? null : 'Identifiant de user1';
$A5_COL_IDuser1->Masque = '+9 999 999 999 999 999 999';
$A5_COL_IDuser1->m_nHauteur = 405;
$A5_COL_IDuser1->m_nLargeur = 281;
$A5_COL_IDuser1->m_nOpacite = 100;
$A5_COL_IDuser1->m_nCadrageHorizontal = 2;
$A5_COL_IDuser1->m_nCadrageVertical = -1;
$A5_COL_IDuser1->m_Police->m_bGras = false;
$A5_COL_IDuser1->m_Police->m_bItalique = false;
$A5_COL_IDuser1->m_Police->m_bSouligne = false;
$A5_COL_IDuser1->m_Police->m_sNom = 'Roboto, Helvetica, Arial, sans-serif';
$A5_COL_IDuser1->m_Police->m_nTaille = '14px';
$A5_COL_IDuser1->m_nX = 0;
$A5_COL_IDuser1->m_nY = 0;
$A5_COL_IDuser1->m_clCouleurJauge = 0x000000;
$A5_COL_IDuser1->BoutonCalendrier = 0;
$A5_COL_IDuser1->EtatInitial = 0;
$A5_COL_IDuser1->VisibleInitial = 1;
$A5_COL_IDuser1->YInitial = 0;
$A5_COL_IDuser1->NombreColonne = 0;
$A5_COL_IDuser1->BulleTitre = '';
$A5_COL_IDuser1->JetonActif = false;
$A5_COL_IDuser1->JetonListeSeparateur = '';
$A5_COL_IDuser1->JetonAutoriseDoublon = false;
$A5_COL_IDuser1->JetonSupprimable = true;


$A5_COL_IDuser1->lierVM('PAGE_index','COL_IDuser1','A5_COL_IDuser1');
$A6_COL_Nom->Couleur = 0x68635F;
$A6_COL_Nom->CouleurInitiale = 0x68635F;
$A6_COL_Nom->Libelle = function_exists("construireTexteRiche_A6_COL_Nom") ? null : 'nom';
$A6_COL_Nom->Masque = '0';
$A6_COL_Nom->m_nHauteur = 405;
$A6_COL_Nom->m_nLargeur = 100;
$A6_COL_Nom->m_nOpacite = 100;
$A6_COL_Nom->m_nCadrageVertical = -1;
$A6_COL_Nom->m_Police->m_bGras = false;
$A6_COL_Nom->m_Police->m_bItalique = false;
$A6_COL_Nom->m_Police->m_bSouligne = false;
$A6_COL_Nom->m_Police->m_sNom = 'Roboto, Helvetica, Arial, sans-serif';
$A6_COL_Nom->m_Police->m_nTaille = '14px';
$A6_COL_Nom->m_nX = 0;
$A6_COL_Nom->m_nY = 0;
$A6_COL_Nom->m_clCouleurJauge = 0x000000;
$A6_COL_Nom->BoutonCalendrier = 0;
$A6_COL_Nom->EtatInitial = 0;
$A6_COL_Nom->VisibleInitial = 1;
$A6_COL_Nom->YInitial = 0;
$A6_COL_Nom->NombreColonne = 0;
$A6_COL_Nom->BulleTitre = '';
$A6_COL_Nom->JetonActif = false;
$A6_COL_Nom->JetonListeSeparateur = '';
$A6_COL_Nom->JetonAutoriseDoublon = false;
$A6_COL_Nom->JetonSupprimable = true;


$A6_COL_Nom->lierVM('PAGE_index','COL_Nom','A6_COL_Nom');
$A7_COL_Tel->Couleur = 0x68635F;
$A7_COL_Tel->CouleurInitiale = 0x68635F;
$A7_COL_Tel->Libelle = function_exists("construireTexteRiche_A7_COL_Tel") ? null : 'tel';
$A7_COL_Tel->Masque = '+999 999 999';
$A7_COL_Tel->m_nHauteur = 405;
$A7_COL_Tel->m_nLargeur = 100;
$A7_COL_Tel->m_nOpacite = 100;
$A7_COL_Tel->m_nCadrageHorizontal = 2;
$A7_COL_Tel->m_nCadrageVertical = -1;
$A7_COL_Tel->m_Police->m_bGras = false;
$A7_COL_Tel->m_Police->m_bItalique = false;
$A7_COL_Tel->m_Police->m_bSouligne = false;
$A7_COL_Tel->m_Police->m_sNom = 'Roboto, Helvetica, Arial, sans-serif';
$A7_COL_Tel->m_Police->m_nTaille = '14px';
$A7_COL_Tel->m_nX = 0;
$A7_COL_Tel->m_nY = 0;
$A7_COL_Tel->m_clCouleurJauge = 0x000000;
$A7_COL_Tel->BoutonCalendrier = 0;
$A7_COL_Tel->EtatInitial = 0;
$A7_COL_Tel->VisibleInitial = 1;
$A7_COL_Tel->YInitial = 0;
$A7_COL_Tel->NombreColonne = 0;
$A7_COL_Tel->BulleTitre = '';
$A7_COL_Tel->JetonActif = false;
$A7_COL_Tel->JetonListeSeparateur = '';
$A7_COL_Tel->JetonAutoriseDoublon = false;
$A7_COL_Tel->JetonSupprimable = true;


$A7_COL_Tel->lierVM('PAGE_index','COL_Tel','A7_COL_Tel');


// fin de bloc pour 'if (isset())' qui gère le cas ou session.bug_compat_42 est à VRAI
}
if (!$_bContexteProjetExiste) {
	// Pas de contexte, il faut initialiser le conctexte globlal
	$MonProjet= new CProjet();
//  Ouverture de l'analyse 
	HOuvreAnalyse($CheminRepRes.'bz1.xdd');
	// on charge le code du projet, 
	if (	Res_Include('bz1-prj.php',RES_PROJET)) {DeclMonProjet(); }
	$MonProjet->InitProjet('bz1');
}
 else { 
	Res_Include('bz1-prj.php',RES_PROJET);
}
//-----------------------------------------------------------------------
// Implémentation des Traitements 
//-----------------------------------------------------------------------
//-----------------------------------------------------------------------
// Procédures locales de la page
//-----------------------------------------------------------------------
// Code d'initialisation de page
// Code de chaque affichage de page
//Clic sur BTN_Ajouter (serveur) :: (PCode de Clic sur %1!s!)
function& A3_BTN_Ajouter16()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_index','A3_BTN_Ajouter');
	global $A1_SAI_nom;
	global $A2_SAI_SansNom2;
	global $A4_TABLE_User1;
	
	
	if (VersBooleen(Operateur(39226,Operateur(24866,$A1_SAI_nom,getRef('')),Operateur(24866,$A2_SAI_SansNom2,getRef('')))))
	{
		Info(VersPrimitif(getRef('champ obligatoire')));
		return _return ($_PHP_VAR_RETURN_);
	}
	else 
	{
		EcranVersFichier(VersPrimitif('PAGE_index'), VersPrimitif(Fichier('user1')));
		HAjoute(getRef('user1'));
	}
	Operateur(95,$A1_SAI_nom,getRef(''));
	Operateur(95,$A2_SAI_SansNom2,getRef(''));
	VerifieMethodeEtAppel("CListe",'ListeAffiche','Clic sur BTN_Ajouter (serveur)',"Liste",$A4_TABLE_User1,getRef('P'));
	return _return ($_PHP_VAR_RETURN_);
}

//-----------------------------------------------------------------------
// Codes d'initialisation des champ et de la page
//-----------------------------------------------------------------------
// Si c'est le 1er appel pour cette page (=pas de contexte)
if (!$_bContextePageExiste) {
	$MonProjet->SetPageCourante('PAGE_INDEX','PAGE_index');
$A4_TABLE_User1->SetSourceRemplissage("user1", "IDuser1", "", "", 1, "", 0);

// Code de déclaration des globales de page
function& PAGE_index0()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_index','PAGE_index');
	return _return ($_PHP_VAR_RETURN_);
}
// Appel le code de déclaration des globales de PAGE_index
	PAGE_index0();


$A4_TABLE_User1->InitRemplissage();


}
else
{
	$MonProjet->SetPageCouranteContexte('PAGE_INDEX','PAGE_index');
}
//-----------------------------------------------------------------------
//  Affectation des champ, recherche du Traitement à exécuter 
//-----------------------------------------------------------------------
if(!GereActions( $PAGE_INDEX)){
$_BTNACTION = TrouveBouton( $PAGE_INDEX );
if ($_BTNACTION=='A3') { 
//-------------------------------------------------------------------
//  PCodes de A3_BTN_Ajouter
//-------------------------------------------------------------------
	A3_BTN_Ajouter16();

}

}
if ( !bRenvoitCodeHTML($PAGE_INDEX,true)) exit();
?>
<!DOCTYPE html>
<!-- PAGE_index 20/10/2026 10:54 WEBDEV 25 25.0.204.0 --><html lang="fr" class="htmlstd html5">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $MaPage->GetLibelle(); ?></title><meta name="generator" content="WEBDEV">
<meta name="viewport" content="width=device-width">
<meta name="Description" lang="fr" content="<?php echo $MaPage->GetDescription(); ?>">
<meta name="keywords" lang="fr" content="<?php echo $MaPage->GetMotsCles(); ?>">
<meta http-equiv="x-ua-compatible" content="ie=edge"><?php echo $MaPage->GetHTMLEnteteHTML(); ?><style type="text/css">.wblien,.wblienHorsZTR {border:0;background:transparent;padding:0;text-align:center;box-shadow:none;_line-height:normal;-webkit-box-decoration-break: clone;box-decoration-break: clone; color:#4285f4;}.wblienHorsZTR {border:0 !important;background:transparent !important;outline-width:0 !important;} .wblienHorsZTR:not([class^=l-]) {box-shadow: none !important;}a:active{ color:#4285f4;}a:visited{ color:#000000;}</style><link rel="stylesheet" type="text/css" href="res/standard.css?10001b8230272">
<link rel="stylesheet" type="text/css" href="res/static.css?1000272504bd5">
<link rel="stylesheet" type="text/css" href="Phoenix250PhoenixGreyNix.css?100009abe42c3">
<link rel="stylesheet" type="text/css" href="bz1250PhoenixGreyNix.css?10000accc7dbc">
<link rel="stylesheet" type="text/css" href="palette-GreyNix.css?10000c91d7c34">
<link rel="stylesheet" type="text/css" href="PAGE_index_style.css?1000082d74476">
<style type="text/css">
body{ position:relative;line-height:normal;width:100%;margin:0 auto;width:100%;height:600px;position:relative; color:#5f6368;} body{font-family:Roboto, Helvetica, Arial, sans-serif;font-size:14px;}html,body {background-color:#f5f5f5;position:relative;}#page{position:relative; background-color:#f5f5f5;min-height:600px;height:auto !important; height:600px; min-width:980px;width:auto !important;width:980px;}
#b-A4{border-style:solid;border-width:1px;border-color:#dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}#lzA4{border-style:solid;border-width:1px;border-color:#dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}#ttA5,.ttA5{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}#ttA6,.ttA6,#ttA7,.ttA7{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}#tzclzA4{border-top:none;border-right:solid 1px #dadce0;border-bottom:none;border-left:solid 1px #dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}#tzdlzA4{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:solid 1px #dadce0;border-collapse:collapse;empty-cells:show;border-spacing:0;}.communbc-A5{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA5{width:324px;}.communbc-A6{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA6{width:98px;}.communbc-A7{border-top:none;border-right:solid 1px #dadce0;border-bottom:solid 1px #dadce0;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA7{width:98px;}.wbplanche{background-repeat:repeat;background-position:0% 0%;background-attachment:scroll;background-size:auto auto;background-origin:padding-box;}.wbplancheLibInc{_font-size:1px;}</style></head><body onload="<?php echo WB_AfficheInfo(); ?>;clWDUtil.pfGetTraitement('PAGE_INDEX',15,void 0)(event); "><form name="PAGE_INDEX" action="<?php echo $gszURL;?>" target="_self" onsubmit="return clWDUtil.pfGetTraitement('PAGE_INDEX',18,void 0)(event); " method="post" class="ancragecenter"><div class="h-0"><input type="hidden" name="WD_JSON_PROPRIETE_" value="<?php echo $PAGE_INDEX->pszGetPropSuppNavHTML(); ?>"/><input type="hidden" name="WD_BUTTON_CLICK_" value="A3"><input type="hidden" name="WD_ACTION_" value=""></div><table style="height:100%;width:980px"><tr style="height:100%"><td><table style="width:980px;height:600px"><tr style="height:600px"><td style="width:980px;min-width:980px"><div style="height:100%;min-width:980px;width:auto !important;width:980px;" class="lh0"><div  id="page" class="clearfix pos1"><div  class="pos2"><div  class="pos3"><div  class="pos4"><div  class="pos5"><TABLE style=" width:250px;border-collapse:separate;">
<TR><TD style=" width:250px;"><table id="czA1">
<tr><td style=" height:36px; width:250px;"><ul style=" width:250px;" class="wbLibChamp wbLibChampA1">
<li style=" height:36px;"><table style=" width:250px;height:36px;"><tr><td id="lzA1" class="Normal padding webdevclass-riche"><?php echo $A1_SAI_nom->pszGetLibelleHTML(); ?></td></tr></table></li><li><table style=" width:141px;border-spacing:0;height:36px;border-collapse:separate;border:0;outline:none;" id="bzA1"><tr><td style="border:none;" id="tzA1" class="valignmiddle"><INPUT TYPE="text" SIZE="14" NAME="A1" VALUE="<?php echo $A1_SAI_nom->GetValeurHTML(); ?>" id="A1" class="SAI A1 padding webdevclass-riche"></td></tr></table></li></ul></td></tr></table></TD></TR>
</TABLE></div></div><div  class="pos6"><div  class="pos7"><button type="button" onclick="if(clWDUtil.pfGetTraitement('PAGE_INDEX',18,void 0)()){_JSL(_PAGE_,'A3','_self','','');} " id="A3" class="BTN-Defaut wblien bbox padding webdevclass-riche" style="width:100%;height:auto;min-height:36px;width:auto;min-width:172px;width:172px\9;height:auto;min-height:36px;display:inline-block;">ajouter</button></div></div></div><div  class="pos8"><div  class="pos9"><TABLE style=" width:250px;border-collapse:separate;">
<TR><TD style=" width:250px;"><table id="czA2">
<tr><td style=" height:36px; width:250px;"><ul style=" width:250px;" class="wbLibChamp wbLibChampA2">
<li style=" height:36px;"><table style=" width:250px;height:36px;"><tr><td id="lzA2" class="Normal padding webdevclass-riche"><?php echo $A2_SAI_SansNom2->pszGetLibelleHTML(); ?></td></tr></table></li><li><table style=" width:141px;border-spacing:0;height:36px;border-collapse:separate;border:0;outline:none;" id="bzA2"><tr><td style="border:none;" id="tzA2" class="valignmiddle"><INPUT TYPE="text" SIZE="14" NAME="A2" VALUE="<?php echo $A2_SAI_SansNom2->GetValeurHTML(); ?>" id="A2" class="SAI A2 padding webdevclass-riche"></td></tr></table></li></ul></td></tr></table></TD></TR>
</TABLE></div></div><div  class="pos10"><div  class="pos11"><input type=hidden name="A4" value="<?php echo $A4_TABLE_User1->Valeur ?>"><input type=hidden name="A4_DEB" value="<?php echo $A4_TABLE_User1->GetFirstIndex()+1 ?>"><input type=hidden name="_A4_OCC" value="<?php echo $A4_TABLE_User1->GetNbEnregAffiche() ?>"><INPUT TYPE="hidden" SIZE="1" NAME="A4_FORMAT_0" VALUE="" onkeypress="return VerifSaisieNombre(event,'+9 999 999 999 999 999 999'); " onblur="reinitNombre(event,'+9 999 999 999 999 999 999');return VerifRegExp(this,'^^(\\+|\\-){0,1}(\\d|'+_WW_SEPMILLIER_+'){1,25}$'); " onfocus="var b=(this.value.length==0);initNombre(event,'+9 999 999 999 999 999 999');var s=this.value;if(b=(b&&(s.length>0)))this.value='';;if(b&&(this.value.length==0)){this.value=s;SetPositionCaret(this,0);} " id="A4_FORMAT_0" class="A4_FORMAT_0 wbgrise padding" DISABLED autocomplete="off"><INPUT TYPE="hidden" SIZE="1" NAME="A4_FORMAT_2" VALUE="" onkeypress="return VerifSaisieNombre(event,'+999 999 999'); " onblur="reinitNombre(event,'+999 999 999');return VerifRegExp(this,'^^(\\+|\\-){0,1}(\\d|'+_WW_SEPMILLIER_+'){1,11}$'); " onfocus="var b=(this.value.length==0);initNombre(event,'+999 999 999');var s=this.value;if(b=(b&&(s.length>0)))this.value='';;if(b&&(this.value.length==0)){this.value=s;SetPositionCaret(this,0);} " id="A4_FORMAT_2" class="A4_FORMAT_2 wbgrise padding" DISABLED autocomplete="off"><table id="ctzA4" style="border-spacing:0; width:543px;;" class="cellpadding0">
 <tr><td colspan=1  style="height:19px;" id="lzA4" class="aligncenter Normal-Centre padding">&nbsp;user1</td><td></td></tr><tr style="border:0;height:0;" id="ttA4"><td id="tzclzA4" style="width:100%;border-bottom-width:0"><div style="overflow:hidden;position:relative;width:526px;"><table id="A4_TITRES_POS" style=" width:100%;"><tr id="A4_TITRES"><td id="ttA5" style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;" class="Titre-Colonne padding webdevclass-riche"><div style="position:relative;overflow:hidden;" class="wbcolA5"><div id="A4_TITRES_0" style=""><table style="width:100%"><tr><td style="padding:0;border:0;box-shadow:none;height:19px;" class="Titre-Colonne ttA5"><?php echo $A5_COL_IDuser1->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal250_PhoenixGreyNix.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A4_TITRES_TRI_0" onclick="oGetObjetChamp('A4').OnTriColonne(0,event)" alt="none"><img src="res/TABLE_Search_Normal250_PhoenixGreyNix.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A4_TITRES_RECH_0" alt=""></div></td><td style="border-bottom:1px solid #dadce0" class="wbtablesep Titre-Colonne ttA5"><div onmousedown="oGetObjetChamp('A4').OnRedimCol(event,0,14)" style="width:1px;cursor:col-resize;;overflow:hidden;height:28px"><!-- --></div></td><td id="ttA6" style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;" class="Titre-Colonne padding webdevclass-riche"><div style="position:relative;overflow:hidden;" class="wbcolA6"><div id="A4_TITRES_1" style=""><table style="width:100%"><tr><td style="padding:0;border:0;box-shadow:none;height:19px;" class="Titre-Colonne ttA6"><?php echo $A6_COL_Nom->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal250_PhoenixGreyNix.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A4_TITRES_TRI_1" onclick="oGetObjetChamp('A4').OnTriColonne(1,event)" alt="none"><img src="res/TABLE_Search_Normal250_PhoenixGreyNix.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A4_TITRES_RECH_1" alt=""></div></td><td style="border-bottom:1px solid #dadce0" class="wbtablesep Titre-Colonne ttA6"><div onmousedown="oGetObjetChamp('A4').OnRedimCol(event,1,14)" style="width:1px;cursor:col-resize;;overflow:hidden;height:28px"><!-- --></div></td><td id="ttA7" style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;" class="Titre-Colonne padding webdevclass-riche"><div style="position:relative;overflow:hidden;" class="wbcolA7"><div id="A4_TITRES_2" style=""><table style="width:100%"><tr><td style="padding:0;border:0;box-shadow:none;height:19px;" class="Titre-Colonne ttA7"><?php echo $A7_COL_Tel->pszGetLibelleHTML(); ?></td></tr></table></div><img src="res/TABLE_Sorting_Normal250_PhoenixGreyNix.png" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none;" id="A4_TITRES_TRI_2" onclick="oGetObjetChamp('A4').OnTriColonne(2,event)" alt="none"><img src="res/TABLE_Search_Normal250_PhoenixGreyNix.png" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;" id="A4_TITRES_RECH_2" alt=""></div></td><td style="border-bottom:1px solid #dadce0" class="wbtablesep Titre-Colonne ttA7"><div onmousedown="oGetObjetChamp('A4').OnRedimCol(event,2,14)" style="width:1px;cursor:col-resize;;overflow:hidden;height:28px"><!-- --></div></td></tr>
<tr style="border:0;height:0;"><td style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;" class="wbcolA5"></td><td style="border:0;" class="wbtablesep Titre-Colonne ttA5"></td><td style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;" class="wbcolA6"></td><td style="border:0;" class="wbtablesep Titre-Colonne ttA6"></td><td style="border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;" class="wbcolA7"></td><td style="border:0;" class="wbtablesep Titre-Colonne ttA7"></td></tr></table></div></td><td></td></tr>
<tr><td id="tzdlzA4" style="width:100%;border-top-width:0;"><div style="overflow-x:auto;overflow-y:hidden;width:526px;height:353px;position:relative;z-index:1"><div style="position:relative;width:100%" id="A4_POS"><table id="A4_TB" style=" width:100%;height:353px;"><!-- { thead :  { contenu :  [  { debut : "<tr style=\"border:0;height:0;\" id=\"ttA4\">",contenu :  [ "<td id=\"ttA5\" style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"position:relative;overflow:hidden;\" class=\"wbcolA5\"><div id=\"A4_TITRES_0\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;box-shadow:none;height:19px;\" class=\"Titre-Colonne ttA5\"><?php echo $A5_COL_IDuser1->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal250_PhoenixGreyNix.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A4_TITRES_TRI_0\" onclick=\"oGetObjetChamp('A4').OnTriColonne(0,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal250_PhoenixGreyNix.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A4_TITRES_RECH_0\" alt=\"\"></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep Titre-Colonne ttA5\"><div onmousedown=\"oGetObjetChamp('A4').OnRedimCol(event,0,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:28px\">[%COMMENT%]</div></td>" , "<td id=\"ttA6\" style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"position:relative;overflow:hidden;\" class=\"wbcolA6\"><div id=\"A4_TITRES_1\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;box-shadow:none;height:19px;\" class=\"Titre-Colonne ttA6\"><?php echo $A6_COL_Nom->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal250_PhoenixGreyNix.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A4_TITRES_TRI_1\" onclick=\"oGetObjetChamp('A4').OnTriColonne(1,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal250_PhoenixGreyNix.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A4_TITRES_RECH_1\" alt=\"\"></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep Titre-Colonne ttA6\"><div onmousedown=\"oGetObjetChamp('A4').OnRedimCol(event,1,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:28px\">[%COMMENT%]</div></td>" , "<td id=\"ttA7\" style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;\" class=\"Titre-Colonne padding webdevclass-riche\"><div style=\"position:relative;overflow:hidden;\" class=\"wbcolA7\"><div id=\"A4_TITRES_2\" style=\"\"><table style=\"width:100%\"><tr><td style=\"padding:0;border:0;box-shadow:none;height:19px;\" class=\"Titre-Colonne ttA7\"><?php echo $A7_COL_Tel->pszGetLibelleHTML(); ?></td></tr></table></div><img src=\"res/TABLE_Sorting_Normal250_PhoenixGreyNix.png\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none;\" id=\"A4_TITRES_TRI_2\" onclick=\"oGetObjetChamp('A4').OnTriColonne(2,event)\" alt=\"none\"><img src=\"res/TABLE_Search_Normal250_PhoenixGreyNix.png\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none;\" id=\"A4_TITRES_RECH_2\" alt=\"\"></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep Titre-Colonne ttA7\"><div onmousedown=\"oGetObjetChamp('A4').OnRedimCol(event,2,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:28px\">[%COMMENT%]</div></td>", ] ,fin : "</tr>" } , { debut : "<tr style=\"border:0;height:0;\">",contenu :  [ "<td style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;\" class=\"wbcolA5\"></td><td style=\"border:0;\" class=\"wbtablesep Titre-Colonne ttA5\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;\" class=\"wbcolA6\"></td><td style=\"border:0;\" class=\"wbtablesep Titre-Colonne ttA6\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;padding-left:0;padding-right:0;border:0;\" class=\"wbcolA7\"></td><td style=\"border:0;\" class=\"wbtablesep Titre-Colonne ttA7\"></td>", ] ,fin : "</tr>" }  ]  } ,tbody :  { contenu :  [  { debut : " <tr class=\"Lignes-Impaires-Table padding\" id=\"A4_[%_INDICE_%]\" style=\"visibility:hidden;height:23px\">",contenu :  [ "<td onclick=\"oGetObjetChamp('A4').OnSelectLigne([%_INDICE_%],0,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A5\" class=\"alignright l-1 wbcolA5 communbc-A5 padding webdevclass-riche\"><div style=\"overflow-x:hidden\" class=\"wbcolA5\"><div id=\"A4_[%_INDICE_%]_0\" style=\"padding-right:2px;\"></div></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A4').OnRedimCol(event,0,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:20px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A4').OnSelectLigne([%_INDICE_%],1,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A6\" class=\"TXT-Normal wbcolA6 communbc-A6 padding webdevclass-riche\"><div style=\"overflow-x:hidden\" class=\"wbcolA6\"><div id=\"A4_[%_INDICE_%]_1\" style=\"padding-left:2px;\"></div></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A4').OnRedimCol(event,1,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:20px\">[%COMMENT%]</div></td>" , "<td onclick=\"oGetObjetChamp('A4').OnSelectLigne([%_INDICE_%],2,event)\" style=\" height:21px;border-left-width:0;border-top-width:0;\" id=\"c[%_INDICE_%]-A7\" class=\"alignright TXT-Normal wbcolA7 communbc-A7 padding webdevclass-riche\"><div style=\"overflow-x:hidden\" class=\"wbcolA7\"><div id=\"A4_[%_INDICE_%]_2\" style=\"padding-right:2px;\"></div></div></td><td style=\"border-bottom:1px solid #dadce0\" class=\"wbtablesep \"><div onmousedown=\"oGetObjetChamp('A4').OnRedimCol(event,2,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:20px\">[%COMMENT%]</div></td>", ] ,fin : "</tr>" }  ]  }  } --><tr><td></td></tr></table></div><table style="position:absolute;top:0;left:0;width:100%;border:solid 2px #dadce0;height:100%;visibility:hidden;z-index:100" id="A4_MASQUE"><tr><td class="aligncenter valignmiddle"><img src="res/TableAttente.gif" alt="none"></td></tr></table><table style="position:absolute;top:0;left:0;width:100%;height:100%;visibility:hidden;z-index:101" id="A4_MASQUETR"><tr><td class="aligncenter valignmiddle"><!-- --></td></tr></table></div></td><td style="width:17px;height:353px;vertical-align:top"><div style="width:15px;"><div style="position:absolute;overflow-x:hidden;width:17px;height:353px;"><div style="position:absolute;left:-5px;width:20px;height:353px;overflow-x:hidden;overflow-y:auto"><div style="width:1px;height:1px;overflow:hidden" id="A4_SB"></div></div></div></div></td></tr>
</table></div></div></div></div></div></td></tr></table></td></tr></table><?php function construireTexteRiche_A7_COL_Tel($j){ global $A7_COL_Tel,$A7_COL_Tel,$A4_TABLE_User1;$s="tel";return $s;}function construireTexteRiche_A6_COL_Nom($j){ global $A6_COL_Nom,$A6_COL_Nom,$A4_TABLE_User1;$s="nom";return $s;}function construireTexteRiche_A5_COL_IDuser1($j){ global $A5_COL_IDuser1,$A5_COL_IDuser1,$A4_TABLE_User1;$s="Identifiant de user1";return $s;}function construireTexteRiche_A2_SAI_SansNom2(){ global $A2_SAI_SansNom2,$A2_SAI_SansNom2;$s="Champ de saisie";return $s;}function construireTexteRiche_A1_SAI_nom(){ global $A1_SAI_nom,$A1_SAI_nom;$s="nom";return $s;} ?>
</form>
<script type="text/javascript">var _bTable16_=false;
</script>
<script type="text/javascript" src="./res/WWConstante5.js?3fffe1df6bbc0"></script>
<script type="text/javascript" src="./res/WDUtil.js?3ffff7bec47ef"></script>
<script type="text/javascript" src="./res/StdAction.js?3000086a81bba"></script>
<script type="text/javascript" src="./res/WDChamp.js?300013d33a4d7"></script>
<script type="text/javascript" src="./res/WDXML.js?30003510ff93c"></script>
<script type="text/javascript" src="./res/WDDrag.js?300067bec47ef"></script>
<script type="text/javascript" src="./res/WDAJAX.js?3000beaa0bb8f"></script>
<script type="text/javascript" src="./res/WDTableZRCommun.js?3000ca2b69f98"></script>
<script type="text/javascript" src="./res/WDTable.js?3000dee350c03"></script>
<script type="text/javascript" src="./res/WD.js?30028f70de49a"></script>
<script type="text/javascript">
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJ4X3Bjc29mdF9ub21fbG9naXF1ZSI6IlBBR0VfaW5kZXgiLCJ4X3Bjc29mdF90eXBlX2xvZ2lxdWUiOiI2NTUzOCIsInhfcGNzb2Z0X2lkX2Vuc2VtYmxlIjoiNTM5MjIwMTg4NjczNDUxNDEwOSIsIm1hcHBpbmdzIjoiQSJ9
//WW_PARAMETRES_INSTALLATION_DEBUT
var _WD_="/BZ1_WEB/";
//WW_PARAMETRES_INSTALLATION_FIN
var _WDR_="../";
var _NA_=5;
var _WW_SEPMILLIER_="<?php echo ($_gszSEPMIL) ?>";
var _WW_SEPDECIMAL_="<?php echo ($_gszSEPDEC) ?>";
var _PHPID_="<?php echo session_name() . '=' . session_id(); ?>";
var _PU_="index.php";
var _PAGE_=document["PAGE_INDEX"];
clWDUtil.DeclareChamp("A4",void 0,void 0,void 0,WDTable,["<?php echo $A4_TABLE_User1->pszGetAjaxInitInline(); ?>",0,23,2,4,1,["Lignes-Impaires-Table wbImpaire","Lignes-Impaires-Table wbPaire","Selection"],[["res/TABLE_Sorting_Normal250_PhoenixGreyNix.png","res/TABLE_Sorting_Increasing250_PhoenixGreyNix.png","res/TABLE_Sorting_Decreasing250_PhoenixGreyNix.png"],["res/TABLE_Search_Normal250_PhoenixGreyNix.png","res/TABLE_Search_Hover250_PhoenixGreyNix.png","res/TABLE_Search_Active250_PhoenixGreyNix.png"],["res/TABLE_Filter_Normal250_PhoenixGreyNix.png","res/TABLE_Filter_Hover250_PhoenixGreyNix.png","res/TABLE_Filter_Active250_PhoenixGreyNix.png"],["./res/TableDeplaceDroite.png","./res/TableDeplaceGauche.png"]],true],true,true);
<!--
var _COL={0:"#f5f5f5",5:"#4285f4",9:"#fff9c4",10:"#5f6368",15:"#5f6368",16:"#dadce0",21:"#ffffff",66:"#424242"};
function _GET_A5_1_I_C(){return NSPCS.NSValues.oAny2Natif(arguments[0]);}
function _SET_A5_1_I_C(){return arguments[0];}
function _GET_A7_1_I_C(){return NSPCS.NSValues.oAny2Natif(arguments[0]);}
function _SET_A7_1_I_C(){return arguments[0];}
clWDUtil.DeclareTraitementEx("PAGE_INDEX",true,[15,function(event){clWDUtil.pfGetTraitement("PAGE_INDEX",15,"_COM")(event);var __VARS0=new NSPCS.NSValues.CVariablesLocales(0,1);{void 0;}},void 0,true,18,function(event){window.NSPCS&&NSPCS.NSChamps.ms_oSynchronisationServeur.OnSubmit();return true;},void 0,true]);
clWDUtil.DeclareTraitementEx("PAGE_INDEX",true,[15,function(event){clWDUtil.DeclareChampInit();window.chfocus&&chfocus();},"_COM",false,16,function(event){},"_COM",false]);
//-->
</script>

<script type="text/javascript">function chfocus(){window.focus();if(_PAGE_["A1"]!=null)try{_PAGE_["A1"].focus();}catch(e){}}</script>
<script type="text/javascript">var bPCSFR=true;</script><script type="text/javascript" charset="windows-1252" src="res/WDLIB.JS?200074ff7db78"></script><script type="text/javascript" src="res/jquery-3.js?20000bf932ea2"></script><script type="text/javascript" src="res/jquery-ui.js?200066e49dabc"></script><script type="text/javascript" src="res/jquery-effet.js?20004086c54b4"></script><style type="text/css">.wbTooltip{font-weight:bold;color:#F5F5F5;text-align:left;vertical-align:middle;background-color:#616161;border-radius:2px;box-shadow:0 4px 5px 0 rgba(0,0,0,0.14),0 1px 10px 0 rgba(0,0,0,0.12),0 2px 4px 0 rgba(0,0,0,0.20);padding:3px 8px;}</style><script type="text/javascript">jQuery().ready(function(){$( document ).tooltip({ delay : 1000,	items: "[title]:not(iframe)", position : {my: 'left top+20',collision: 'flip'},	track : true, tooltipClass : "wbTooltip",open: function( event, ui ) { $('.wbTooltip').not($(ui.tooltip[0])).fadeOut(500); }});if (window.clWDUtil && window.$ && window.$.ui){function fNettoyageBulle(){$('.wbTooltip').fadeOut(500);	}if (clWDUtil.m_oNotificationsAjoutHTML){clWDUtil.m_oNotificationsAjoutHTML.AddNotification(fNettoyageBulle);}if (clWDUtil.m_oNotificationsFinAJAX){clWDUtil.m_oNotificationsFinAJAX.AddNotification(fNettoyageBulle);}} });</script><script type="text/javascript">if (bOpr) document.getElementsByTagName("head")[0].innerHTML+='\x3cstyle type="text/css"\x3e.wbtablesep{position:static !important;}\x3c/style\x3e';</script><?php echo $MaPage->GetHTMLFinPageHTML(); ?></body></html><?php $_PHP_VAR_TMP_1=ob_get_contents();ob_end_clean();echo _cp1252_to_utf8($_PHP_VAR_TMP_1); ?>