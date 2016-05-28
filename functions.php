<?php

function yhendu(){
	global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("Baasiga ei yhendu - ".mysqli_error());
	mysqli_query( $connection, "SET CHARACTER SET UTF8") or die("utf-8 pole saadaval - ".mysqli_error($connection));
}

function regatud(){
   	yhendu();
	global $connection;
	
	$nimi = mysqli_real_escape_string($connection, $_POST['username']);
    $parool = mysqli_real_escape_string($connection, $_POST['passwd1']);
    $query="INSERT INTO aveinber_kasutajad (nimi, parool) VALUES ('$nimi', '$parool')";
    if (!mysqli_query($connection,$query)) {
    die('Error: ' . mysqli_error($connection));
    }
    echo "Kasutaja korras, lisa komme või lisa pilt";
    mysqli_close($connection);
	}	

function fotohaldus(){
	$uploaddir = '/home/aveinber/public_html/VR2016/P00/laetud/';
    $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
	echo "<p>";
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "Üleslaadimine õnnestus.\n";
    } else {
    echo "Ei õnnestunud";
    } 
	/*echo "</p>";
    echo '<pre>';
    echo 'vajalik info:';
    print_r($_FILES);
    print "</pre>";*/
	global $connection;
	$nimi = mysqli_real_escape_string($connection, $uploadfile);
    $pealkiri = mysqli_real_escape_string($connection, $_POST['title']);
    $kirjeldus = mysqli_real_escape_string($connection, $_POST['description']);
    $pildistaja = mysqli_real_escape_string($connection, $_POST['author']);

    $query2="INSERT INTO aveinber_pildid (nimi, pealkiri, kirjeldus, pildistaja)
    VALUES ('$nimi', '$pealkiri', '$kirjeldus', '$pildistaja')";
    if (!mysqli_query($connection,$query2)) {
    die('Error: ' . mysqli_error($connection));
     }
     echo "info lisatud";
     mysqli_close($connection);	
	
	
	}
function kombehaldus(){
	global $connection;
	$kirjeldus1 = mysqli_real_escape_string($connection, $_POST['kirjeldus']);
    $kirjeldaja = mysqli_real_escape_string($connection, $_POST['kirjeldaja']);

    $query3="INSERT INTO aveinber_kombed (kirjeldus, kirjeldaja)
    VALUES ('$kirjeldus1', '$kirjeldaja')";
    if (!mysqli_query($connection,$query3)) {
    die('Error: ' . mysqli_error($connection));
     }
     echo "info lisatud";
     mysqli_close($connection);	
	
	
	}
	

function kontrollin1(){
	global $kontrollitud;
    $username1="0";
    $passwd="0";
    if (isset($_POST['username']) && $_POST['username']!="") {
      $username1=$_POST['username'];
    } 
    if(isset($_POST['passwd']) && $_POST['passwd']!=""){
    $passwd=$_POST['passwd'];
    } 
    yhendu();
    global $connection;
    $query2 = "SELECT * FROM aveinber_kasutajad" or die(mysqli_error($connection));
    $andmed = mysqli_query($connection, $query2);
    while($andmebaasist = mysqli_fetch_array($andmed)){
    if($username1 == $andmebaasist['nimi'] && $passwd == $andmebaasist['parool']){
    $kontrollitud="true";
    include_once ("view/pildid.html");
    break;
    }
	}
    if($kontrollitud!="true"){
    echo "Sisesta uuesti, midagi läks valesti";
    include_once ("view/login1.html");
    }	
}	
function kontrollin2(){
	global $kontrollitud;
    $username1="0";
    $passwd="0";
    if (isset($_POST['username']) && $_POST['username']!="") {
      $username1=$_POST['username'];
    } 
    if(isset($_POST['passwd']) && $_POST['passwd']!=""){
    $passwd=$_POST['passwd'];
    } 
    yhendu();
    global $connection;
    $query2 = "SELECT * FROM aveinber_kasutajad" or die(mysqli_error($connection));
    $andmed = mysqli_query($connection, $query2);
    while($andmebaasist = mysqli_fetch_array($andmed)){
    if($username1 == $andmebaasist['nimi'] && $passwd == $andmebaasist['parool']){
    $kontrollitud="true";
    include_once ("view/kombed.html");
    break;
    }
	}
    if($kontrollitud!="true"){
    echo "Sisesta uuesti, midagi läks valesti";
    include_once ("view/login2.html");
    }	
}	

function kuva_komme(){
	yhendu();
	global $connection;
	$andmed2= mysqli_query($connection, "select kirjeldus from aveinber_kombed");
	$kombed=array();
	while ($andmebaasist2=mysqli_fetch_assoc($andmed2)){
		$kombed[]=$andmebaasist2;		
		}
	
	/*echo "</p>";
    echo '<pre>';
    echo 'vajalik info:';
    print_r($kombed);
    print "</pre>";*/
	
	 include_once ("view/kombe_kuva.html");
	
	
	
}
//function pildid(){
	

//}
?>
