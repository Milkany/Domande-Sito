<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>    
</head>
<body>
<?php
session_start();




$mysqli=new mysqli("localhost","root","","siluan");
if($mysqli->connect_errno){
    die("Errore di connessione al db.".$mysqli->connect_error);
}
$codi=$_POST['email'];
$pass=$_POST['password'];



$stmt=$mysqli->prepare("SELECT * FROM utenti WHERE nomeutente=? and pwd=?");
$stmt->bind_param("ss",$codi,$pass);
/*ESECUZIONE DEL QUERY*/
$result=$stmt->execute();
/*BLIND RESULTS VARIABLE*/


$stmt->fetch();
//HO AGGIUNTO UN ECHO SUL fetch() DI stmt E FUNZIONA  
echo $stmt->fetch();


if($stmt->num_rows>0){
    //ACCESSO
   // echo "ciao";
    header("location: ../app/app.php");
    //exit;
}else{
    //ACCESSO NEGATO
    echo "no.";
}


?>
 
</body>
</html>
