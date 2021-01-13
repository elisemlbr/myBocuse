<?php

session_start();

try
{

    $bdd = new PDO('mysql:host=localhost;dbname=my.bocuse;charset=utf8', 'root', 'root');

}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="./style.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet"> 
    
    <title>My.Bocuse</title>
    
    <link rel="icon" href="./img/favicon.ico" type="image/png" />
</head>

<body>
<?php 
    
    if(isset($_POST['email'])&& isset($_POST['pwd'])){
     
        $request = $bdd->prepare('SELECT id,email ,pass, first_name,last_name,statut FROM mybocuse WHERE email=?');
        $request->execute([
            strip_tags(trim($_POST['email'])),
        ]);
        $data = $request ->fetch();
            if($data['pass'] === $_POST['pwd']){
                $_SESSION['id'] = $data['id'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['pass'] = $data['pass'];
                $_SESSION['prenom'] = $data['first_name'];
                $_SESSION['nom'] = $data['last_name'];
                $_SESSION['statut'] = $data['statut'];
            }
            else if(['pass'])
            $request->closeCursor();
        }

        if(!empty($_SESSION)){
            include('./Files_proteges/header_login_page.php'); 
            include('./Files_proteges/login_page.php');


            // include('./Files_proteges/logout.php');
        }
        else {
            // Header 
            include('./Files_proteges/header_formulaire.php'); 
            // Main 
            include('./Files_proteges/formulaire.php');
        }
    

include('./Files_proteges/footer.php')
?>


  
</body>

</html>