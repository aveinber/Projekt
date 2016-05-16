<?php 

require_once("functions.php");
global $kontrollitud;
yhendu();

$mode="pealeht";							
if (isset($_GET['mode']) && $_GET['mode']!=""){
	$mode=htmlspecialchars($_GET['mode']);
	}				

include_once("view/ylemine.html");

switch($mode){	

case "registreeru":
	include("view/signup.html");
break;		
	
case "regan":
    include("view/signup.html");
break;

case "regatud":
    regatud();
break;						

case "fotohaldus":
	fotohaldus();
break;

case "kombehaldus":
	kombehaldus();
break;

case "pildid":
    include("view/login1.html");	
break;

case "kombed":
    include("view/login2.html");	
break;

case "kontrollin1":
	kontrollin1();
break;

case "kontrollin2":
	kontrollin2();
break;

case "kuvakombed":
	kuva_komme();
break;


default:

include("view/pealeht.html");
}
include_once("view/alumine.html");
?>
