<?php
//16.0.76.0 Phpconst.php GF 
//VersionVI: 01A250083n
//(c) 2005-2010 PC SOFT  - Release
/**
 * Définit les constantes qui seront remplacées par leur valeur (ici définie) lors de la phase d'obfuscation
 *
 * @category PcSoft
 * @package OPTIM
 *
 */
//Permet de ne pas prendre en compte les constantes définies nativement par PHP 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
/////////////////////////////////////////////////// IS_A_XXX //////////////////////////////////////////////////////////////////////////////////// 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
define('0'	,0x00); 		//0000 0000 0000 0000 
define('1'	,0x01); 		//0000 0000 0000 0001 
define('2'	,0x02); 		//0000 0000 0000 0010 
define('4'	,0x04); 		//0000 0000 0000 0100 
define('8'	,0x08); 		//0000 0000 0000 1000 
define('16'	,0x10); 		//0000 0000 0001 0000 
define('32',0x20); 		//0000 0000 0010 0000 
define('64'	,0x40); 		//0000 0000 0100 0000 
define('128'	,0x80); //0000 0000 1000 0000 
define('256'		,0x100); 		//0000 0001 0000 0000 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
/////////////////////////////////////////////////// OPERATEURS ////////////////////////////////////////////////////////////////////////////////// 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
// 0x (00)Opérateur décalé (00)Option, ex: commutable, (00) opérateur 
define('1'		,0x000001); //1 
/////////////// ATTENTION !!! LA PLUS GRANDE VALEUR DES OPERATEURS DOIT TOUJOURS ETRE INFERIEURE AU PLUS PETIT MASQUE ///////////// 
//Option : propriété manipulée par Interface 
define('256'		,0x000100);	//0001 
//exemple > et < 
define('512'		,0x000200); //0010 
define('768'			,0x000300); //0011 
//Attention 2048 est applicable 
//en plus des autres options 
// + * / % ! ~ ~= ~~ & && | || ^ null [[]] << >> +[] 
define('2048'		,0x000800); //1000 
define('3072'		,0x000C00); //1100 
//Categorie : propriété manipulée par CTypeComparable 
define('4096'			,0x001000); //exemple + - 
define('8192'				,0x002000); //[ ] [,] 
define('12288'				,0x003000); // / * % 
define('16384'				,0x004000); // [[]] 
define('20480'				,0x005000); // [[b]] 
define('24576'				,0x006000); // < > <= >= == != =?= 
define('28672'			,0x007000); // -= 
define('32768'			,0x008000); // -- 
define('36864'			,0x009000); // && 
define('40960'			,0x00A000); // ~~ 
define('45056'				,0x00B000); // : 
define('255',0x0000FF);
define('3840'	,0x000F00);
define('61440',0x00F000);
define('16711680'	,0xFF0000);
define('48'		,48); //cf 0x000000 taille des masques 
//////////////////////////// Opérateurs //////////////////////////////// 
define('18432'				,0  | 2048  | 16384);
define('16386'				,2  | 16384); //2048 cf declaration dans le switch des Substr 
define('44036'					,4  | 3072 | 40960); //dans le switch d'operateurs 
define('44038'				,6  | 3072 | 40960); //dans le switch d'operateurs 
define('18440'			,8  | 2048  | 16384);
define('18442'				,10 | 2048 | 16384);
define('16396'			,12 | 16384); //cf 2048 optimisé dans le switch des substr 
define('16398'			,14 | 16384); //pas 2048 car utilise le 3eme param de Operateur() 
define('14608'			,16 | 2048 | 12288 | 256);
define('14354'				,18 | 2048 | 12288);
define('14356'				,20 | 2048 | 12288);
define('6166'					,22 | 2048 | 4096); //pas commutatif cf \"a\" + \"b\" != \"b\" + \"a\" (chaines) 
define('6168'					,24 | 2048 | 4096 );
define('43290'		,26 | 2048 | 40960 | 256);
define('43292'	,28 | 2048 | 40960 | 256);
define('16414'			,30 | 16384); // | 2048 optimisé dans le ->operateurGroupeChaine 
define('40992'					,32 | 40960); // | 2048 optimisé dans le -> operateurGroupeCompAvancee 
define('24866'				,34 | 24576 | 256); //2048 cf Compare 
define('24868'				,36 | 24576 | 256); //2048 cf Compare 
define('2646566'					,38 | 24576 | 512  | (40 << 48) ); //44=2515496  		//2048 cf Compare 
define('2515496'					,40 | 24576 | 512  | (38 << 48) ); //42=2646566  		//2048 cf Compare 
define('2908714'				,42 | 24576 | 512  | (44 << 48) ); //40=2777644); //2048 cf Compare 
define('2777644'				,44 | 24576 | 512  | (42 << 48) ); //38=2908714); //2048 cf Compare 
define('41006'			,46 | 40960); //2048 code avec rebond sur procédures 
define('38960'					,48 | 2048 | 36864);
define('22834'					,50 | 2048 | 20480 | 256);
define('22836'					,52 | 2048 | 20480 | 256);
define('22838'			,54 | 2048 | 20480 | 256);
define('39224'					,56 | 2048 | 36864 | 256);
define('39226'					,58 | 2048 | 36864 | 256);
define('8252'					,60 | 8192);
define('8254'				,62 | 8192);
define('22848'					,64 | 2048 | 20480  | 256);
define('22594'					,66 | 2048 | 20480);
define('14404'				,68 | 2048 | 12288);
define('22598'	,70 | 2048 | 20480);
define('22600'	,72 | 2048 | 20480);
define('20554'			,74 | 20480);
define('20556'		,76 | 20480);
define('20558'		,78 | 20480);
define('20560',80 | 20480);
define('20562'		,82 | 20480);
define('20564'			,84 | 20480);
define('45142'					,86 | 45056);
///////////////////// Opérateurs internes //////////////////////////// 
//utile pour les fonctions TableauXXX 
//GF 02/07/09 Grave: ces opérateurs n'étaient pas noter comme d'affectation, du coup les modifications n'étaient pas reportées 
define('8281'				,88 | 1 | 8192);
define('8283'				,90 | 1 | 8192);
//permet de centraliser >, <, >=, <=, == et != en un 
define('26716'				,92 | 2048 | 24576);
/////////////////// ATTENTION !!! LES OPERATEURS VONT DE 2 EN 2 CAR LES IMPAIRS SONT CEUX D'AFFECTATION //////////////////// 
///////////////////// Opérateurs d'affectations //////////////////////////// 
define('95'			,94| 1);
define('32865'					,96| 32768 | 1);
define('32867'					,98| 32768 | 1);
define('28773'			,100| 28672 | 1);
define('28775'			,102| 28672 | 1);
/////////// ATTENTION !!! LA PLUS GRANDE VALEUR DES OPERATEURS DOIT TOUJOURS ETRE INFERIEURE AU PLUS PETIT MASQUE /////////// 
///////////////////// Nouveaux Opérateurs WX16 //////////////////////////// 
define('16488'	,104 | 16384); // | 2048 optimisé dans le ->operateurGroupeChaine 
define('16490',106 | 16384); // | 2048 optimisé dans le ->operateurGroupeChaine 
///////////////////// Opérateurs d'affectations internes (cf Expression et SousType) //////////////////////////// 
define('20555',		1 | 20554);
define('20557',		1 | 20556);
define('20559',		1 | 20558);
define('20561',1 | 20560);
define('20563',	1 | 20562);
define('20565',			1 | 20564);
define('8253',					1 | 8252);
define('8255',				1 | 8254);
define('18433',			1 | 18432);
define('16387',			1 | 16386);
define('18441',			1 | 18440);
define('18443',			1 | 18442);
define('16397',		1 | 16396);
define('16399',			1 | 16398);
define('45143',					1 | 45142);
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
///////////////////////////////////////////////////// OPTIM ///////////////////////////////////////////////////////////////////////////////////// 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
//1ere ligne personnalisée dans les combos 
define('0',0);
define('1',1);
//Comparaison dans les pour tout fichier 
define('0',         0);
define('1',           1);
define('2',   2);
define('4',            4);
define('8',            8);
define('16',       16);
define('32',       32);
define('64',	       64);
//Constantes du champ Captcha 
define('0',0);					// Autorise les minuscules : abcdefghjkmnprstuvwxyz (pas de i, l, o et q) 
define('1',1);					// Autorise les majuscules : BCDEFGHJKMNPRSTUVWXYZ (pas de A, I, L, O et Q) 
define('2',2);					// Autorise les chiffres : 0123456789 
define('3',3);
define('0' , 
				0);	
// Les différents algo de dessin 
// Attention ne pas supprimer de mode. Pour désactiver un mode utiliser m_bAutorise dans sa description 
define('-1', -1);			// Choisi un mode au hasard parmis autres modes (enfin les autres modes autorisés) 
define('0', 0);					// Dessine les lettres avec une déformation du plan 
define('1',1);
define('0', 0);
define('-1', -1);
define('0', 0);	// Le mode actif en cas d'erreur 
/**
 * @internal Portage $/WebDev7/Execution/WDxxxPage/Interface/CompoPageConst.h
 */
// Informations pour CertificatClientInfo 
//enum eCERTIFICATCLIENTINFO 
// Variable dans IIS 
$eCERTIFICATCLIENTINFO=0;
define('0',$eCERTIFICATCLIENTINFO++);		// CERT_COOKIE			Unique ID for the client certificate, returned as a string. This can be used as a signature for the whole client certificate. 
define('1',$eCERTIFICATCLIENTINFO++);	// CERT_SERIALNUMBER	Serial number field of the client certificate. 
define('2',$eCERTIFICATCLIENTINFO++);		// CERT_ISSUER			Issuer field of the client certificate (O=MS, OU=IAS, CN=user name, C=USA). 
define('3',$eCERTIFICATCLIENTINFO++);		// CERT_SUBJECT			Subject field of the client certificate. 
// Les deux éléments suivants sont un deux informations de CERT_FLAGS (SSL_CLIENT_VERIFY en Apache) 
define('4',$eCERTIFICATCLIENTINFO++);		// CERT_FLAGS			bit0 is set to 1 if the client certificate is present.  
define('5',$eCERTIFICATCLIENTINFO++);		//						bit1 is set to 1 if the certification authority of the client certificate is invalid (that is, it is not in the list of recognized certification authorities on the server). 
//						If bit 1 of CERT_FLAGS is set to 1, indicating that the certificate is invalid, IIS version 4.0 and later will reject the certificate. Earlier versions of IIS will not reject the certificate. 
define('6',$eCERTIFICATCLIENTINFO++);
define('0',0);
unset($eCERTIFICATCLIENTINFO);
// Sous informations pour CertificatClientInfo 
//enum eCERTIFICATCLIENTSOUSINFO 
define('-1', -1);								// Toutes les informations 
define('0' , 0);									// Composante C 
$eCERTIFICATCLIENTSOUSINFO = 0;
define('1',++$eCERTIFICATCLIENTSOUSINFO);			// Composante ST 
define('2',++$eCERTIFICATCLIENTSOUSINFO);			// Composante L 
define('3',++$eCERTIFICATCLIENTSOUSINFO);			// Composante O 
define('4',++$eCERTIFICATCLIENTSOUSINFO);			// Composante OU 
define('5',++$eCERTIFICATCLIENTSOUSINFO);			// Composante CN 
define('6',++$eCERTIFICATCLIENTSOUSINFO);			// Composante T 
define('7',++$eCERTIFICATCLIENTSOUSINFO);			// Composante I 
define('8',++$eCERTIFICATCLIENTSOUSINFO);			// Composante G 
define('9',++$eCERTIFICATCLIENTSOUSINFO);			// Composante S 
define('10',++$eCERTIFICATCLIENTSOUSINFO);			// Composante D 
define('11',++$eCERTIFICATCLIENTSOUSINFO);		// Composante UID 
define('12',++$eCERTIFICATCLIENTSOUSINFO);		// Composante EMAIL 
define('13',++$eCERTIFICATCLIENTSOUSINFO);
define('0',0);
define('-1',-1);
unset($eCERTIFICATCLIENTSOUSINFO);
//Informations de défilements du champ image 
$eOPTIONSCHAMPIMAGE = 0;
define('0',$eOPTIONSCHAMPIMAGE++);
define('1',$eOPTIONSCHAMPIMAGE++);
define('2',$eOPTIONSCHAMPIMAGE++);
unset($eOPTIONSCHAMPIMAGE);
//Attzntion, ne pas utiliser. l'astuce est que ces valeurs d'exec correspondent aux valeurs de la html pour les 3 premiers niveaux, ce qui simplifie le code 
//$IMAGE_WEB_TYPE = 0; 
//define('Statique'					,$IMAGE_WEB_TYPE++);		// image statique (=juste le fichier) 
//define('Dynamique'					,$IMAGE_WEB_TYPE++);		// image dynamique (le nom de fichier peut changer) 
//define('Generee'					,$IMAGE_WEB_TYPE++);		// image générée (=par conversion en JPEG) 
//define('SourceBaseDeDonneMemo'		,$IMAGE_WEB_TYPE++);      	// \"depuis une base de donnée (mémo)\" = Generee 
//define('SourceBaseDeDonneChaine'	,$IMAGE_WEB_TYPE++);      	// \"depuis une base de donnée (chaine)\" =   Dynamique 
//unset($IMAGE_WEB_TYPE); 
//Type d'image 
$eTYPEIMAGE = 0;
define('0'				,$eTYPEIMAGE++);	//Statique 
define('1'			,$eTYPEIMAGE++);	//Nom d'image dynamique 
define('2'				,$eTYPEIMAGE++);	//Image dynamique 
define('3'			,$eTYPEIMAGE++);	//Image dynamique en mode semi-statique 
unset($eTYPEIMAGE);
// Option pour ImageXxx 
$eDEFILEMENT = 0;
define('0'				,$eDEFILEMENT++);			// ImageLanceDefilement 
define('1'			,$eDEFILEMENT++);			// ImageLanceDefilement 
define('2'				,$eDEFILEMENT++);			// ImageLanceDefilement 
define('3'				,$eDEFILEMENT++);			// ImageArreteDefilement 
define('4'				,$eDEFILEMENT++);			// ImagePremier 
define('5'			,$eDEFILEMENT++);			// ImagePrecedent 
define('6'				,$eDEFILEMENT++);			// ImageSuivant 
define('7'				,$eDEFILEMENT++);			// ImageDernier 
define('8'					,$eDEFILEMENT++);
// Plage acceptable pour ImageLanceDéfilement 
define('2'			,2);
define('0'			,0);
unset($eDEFILEMENT);
//planning 
// Valeurs par défaut des membres présent dans un seul des deux produits 
define('',		false);
define('60',		60);
define('3',		3);
define('20',	20);
// Derniere herue d'un jour en texte HHMMSS 
define(''235959'',	'235959');
// exécution du Pcode d'un agenda. 
// renvoie FAUX si le Pcde a Fermé la fneetre 
//< nFlag> : 0 ou 1 | 2 
// <pbRepriseSaisieThis> : OUT, NULL  autorsié. Indique si on fa fiat un RepriseSaisie() sur le champ lui meme dans le code 
define('0',		    0x000);
define('1', 0x001);
define('2', 0x002);
//vue planning 
// GP 16/06/2010 : Définition de flags. Ils sont destinées à la vue WIN32 mais utilisé dans le code du champ planning qui mélangue des parts 
// de code avec la vue WIN32. Pour pouvoir compiler en Linux, il faut la définition des flags autre part. 
// => Je les définis ici 
// <nFlag> : 1 ou 2 
define('1',	 1);  // pour les jour 
define('2',		 2);  // pour les heures 
//	+Cumulatif 
define('64',		0x40);  // position absolue pour le scrolling : ne tiens pas compte du scrolling et renvoien coord \"relative au la zone de dessin des RDV\") 
define('128',	0x80);  // renvoie en dehors pour les heures non visible (par défaut elle sont forcées aux bornes) 
//vue agenda 
define(''m_sID'',		'm_sID');
define(''m_sID'',		('m_sID'));
define(''m_nRessource'',		'm_nRessource');
define(''m_nRessource'',		('m_nRessource'));
define(''m_sTitre'',			'm_sTitre');
define(''m_sTitre'',			('m_sTitre'));
define(''m_cFondContenu'',	'm_cFondContenu');
define(''m_cFondContenu'',	('m_cFondContenu'));
define(''m_cFondTitre'',		'm_cFondTitre');
define(''m_cFondTitre'',		('m_cFondTitre'));
define(''m_cBord'',			'm_cBord');
define(''m_cBord'',			('m_cBord'));
define(''m_oDateDebut'',		'm_oDateDebut');
define(''m_oDateDebut'',		('m_oDateDebut'));
define(''m_oDateFin'',		'm_oDateFin');
define(''m_oDateFin'',		('m_oDateFin'));
define(''m_sContenu'',		'm_sContenu');
define(''m_sContenu'',		('m_sContenu'));
define(''m_sImage'',			'm_sImage');
define(''m_sImage'',			('m_sImage'));
define(''m_nImportance'',	'm_nImportance');
define(''m_nImportance'',	'm_nImportance');
define(''m_bRepetee'',		'm_bRepetee');
define(''m_bRepetee'',		'm_bRepetee');
//vue planning 
define(''m_nRessource'',	'm_nRessource');
define(''m_nRessource'',	('m_nRessource'));
define(''m_sNomAffiche'',	'm_sNomAffiche');
define(''m_sNomAffiche'',	('m_sNomAffiche'));
// Ce qu'il faut faire en fonction de la ressource d'un rendez vous 
//enum eRES_RESSOURCE_RENDEZVOUS 
define('0',0);	// Ajoute le RDV mais sans ressource 
define('1',1);	// Ajoute le RDV avec l'ID de ressource 
define('2',2);// n'ajoute pas le RDV
//vue champ agenda commun 
define('60',		60);
define('48',	48);
define('20',		20);
define('20',	((int)20));
// Les différentes manière de voir les ressources 
//enum eRESSOURCE_NOM 
define('0',0);		// Le nom \"complet\" de la ressource : le nom tel que donné a PlanningAjouteRessource/PlanningInsereRessource 
define('1',1);		// Le nom \"affiché\" de la ressource : le nom sans le GLien 
define('2',2);		// Le nom \"logique\" de la ressource : le nom affiché si la valeur n'a pas de GLien, la valeur du GLien sinon 
//GetTabEvenementEntre2Date : <nFlag> : 0 ou cobinaison de 1 / 2 
define('0',		    0x000);  // revoie les évènement bruts 
define('1',		0x001);  // découpe les évènemnets répétés en n occurrences  (1 occurrences par jour). 
define('2', 	0x002);  // découpe les évènemnets sur plusieurs jours en n occurrences  (1 occurrences par jour). 
define('4',			0x004);  // pour Fonction WL. Ne pas renvoyer les RDV répétés dont la répétition ne tompe pas sur le jour.	 
define('-1'			,	-1); // handle de position invalide 
define('-1'		,	-1);// Position pour sauver une valeur pour les Dino
define('0',			 	0);  // echec de l'opération. 
define('1',		 		1);  // on a trouvé une position HF valide pour <nNumElemModif> 
define('2', 		2);  // on a réussi a se repositionner déja et sans HPOS (ex : via HLitRecherche) 
define('1',		0x01); 	// MAJ de l'affichage 
define('2',	0x02); 	// Pas d'exection du PCode de sélection. 
define('4',		0x04); 	// Ne pas recalculer les totaux automatiques. 
define('8',		0x08); 	// Réexécuter la requete (si la table/liste est liée à une requete) 
define('16',		0x10); 	// Passer le flag \"NOREFRECH\" au Acces Natifs (demande HS) 
define('32',		0x20); 	// Table : Pour modif du filtre, ne pas sortir de saiise 
define('64',			0x40); 	// Pour ..FichierParcouru=xxxx (rendre des erreurs de nom non fatales pour CCQ#176325) 
define('100',100);
define('101',101);
define('102',102);
define('103',103);
define('104',104);
define('0', 0);
define('1',   	1);
/**
 * @internal Portage $/WebDev7/Execution/PHP/Portage/Calendrier/MotCle.h
 */
// Commandes pour les champs agenda/planning 
// GP 25/06/2010 : Plus de PCode de sélection serveur en WebDev : rend les drag-drop navigateurs inutilisables 
//#define szACTION_AGENDA_RDV_SELECTION			\"AGENDARDVSEL\" 
define(''AGENDARDVDEP'',		"AGENDARDVDEP");
define(''AGENDARDVRED'',				"AGENDARDVRED");
// GP 30/06/2010 : Plus de PCode de sélection de période serveur en WebDev : rend les sélection navigateur inutilisables (lag) 
//#define szACTION_AGENDA_PERIODE_SELECT		\"AGENDAPERSEL\" 
define(''AGENDARDVSUP'',			"AGENDARDVSUP");
define(''AGENDARDVAJO'',			"AGENDARDVAJO");
// GP 29/06/2010 : Plus de PCode de début de modification serveur en WebDev : rend la saisie inutilisable 
//#define szACTION_AGENDA_RDV_EDITION			\"AGENDARDVEDI\" 
define(''AGENDARDVEDT'',		"AGENDARDVEDT");
define(''AGENDAPERAFF'',		"AGENDAPERAFF");
define('-1',	-1);				// indice renvoyé lorsque l'élement n'a pas été trouvé dans le tableau 
/**
 * @internal Portage $/WinDev7/Execution/WDStd/autres/WDBuffer.h
 */
// Méthodes de cryptage 
//enum eBUFFER_CRYPTMETHOD 
//{ 
define('0',0);		// pas de cryptage 
define('1',1);		// cryptage perso PCSOFT 
define('2',2);	// cryptage RC5 12 boucles 
define('3',3);	// cryptage RC5 16 boucles 
	
define('0' , 0);
define('3' , 3);
//}; 
/**
 * @internal Portage $/WinDev7/Execution/WDStd/wlluser.syn
 */
define('0', 0);
define('0',0);
define('1', 1);
define('2', 2);
define('3', 3);
define('67108864', 67108864);
define('67108864', 67108864);
define('0',0);
define('0',0);
define('65536',65536);
define('131072',131072);
define('131072',131072);
define('0', 0);
define('1', 1);
define('2',2);
define('3', 3);
define('20', 20);			// Nombre de blocs de 4 caractères par ligne de texte encodé 
// taille de la clé de cryptage 
define('16',	16);			// clé de 128 bits 
// Constantes le RC5 
define('8',		8);			// Taille en octets d'un bloc pour le cryptage RC5 
define('32',		32);		// Taille en bits d'un mot pour le cryptage RC5 
define('3084996963',			0xb7e15163);
define('2654435769',			0x9e3779b9);
// <nOptionDV> : 0 ou 1 (pour QW#199304 ) 
define('0',  0x00); // renvoie VRA SSI la date + heure est visible 
define('1',  0x01); // renvoie VRA SSI ln'imporet quel jour de la date est visible 
//Formulaire http 
/**
 * @internal Portage $/WinDev7/Execution/WDCom/HttpRobot.h
 */
define(''PC SOFT Framework'','PC SOFT Framework');
/**
 * @internal Portage $/WinDev7/Execution/WDCom/IHTTP.h
 */
//enum HTTPMethod 
define('1',1);
define('1', 1);
define('2',2);
define('3',3);
define('4',4);
define('4',4);
/**
 * @internal Portage $/WinDev7/Execution/WDCom/constant.h
 */
define(''application/x-www-form-urlencoded'','application/x-www-form-urlencoded');
define('65536',65536);
?>