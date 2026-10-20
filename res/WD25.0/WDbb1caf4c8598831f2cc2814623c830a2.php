<?php
//25.0.2.0 IHM/Champ/Bouton/ChampLien.php GF
//VersionVI: 01A250083n
//(c) 2005-2012 PC SOFT - Release
 if (!defined('__INC__IHM/Champ/Bouton/Bouton.php')) { define('__INC__IHM/Champ/Bouton/Bouton.php',true); include_once(WB_INCLUDE_PATH.'WDb803931b911b68ac7d3350d4536b2d76.php'); } class CChampLien extends CBouton { function CChampLien() { parent::CBouton(); $this->URL = ''; } function& GetType() { return getRef(16); } function F4a917fa4() { return 16; } } ?>