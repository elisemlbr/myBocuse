<?php
try
{
    
    $bdd = new PDO("mysql:host=localhost;dbname=my.bocuse;charset=utf8", "root", "root", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>

<div class="main_container_recette">
    <form class="formulaire_recette">

        <h2 class="title">Ajouter une recette</h2>
        <table class="tableau_recette">

            <tr>
                <td><label class="label">Nom de la recette</label></td>
                <td><input class="nom_recette" id="name" type="text" name="" required></td>
            </tr>
            <tr>
                <td><label class="label">Date</label></td>
                <td><input class="date_recette" id="date" type="date" name="" required></td>
            </tr>
            <tr>
                <td><label class="label">Description de la recette </label></td>
                <td><textarea class="description" type="text" id='textarea' name="" required></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" id="confirm_recette" value="Confirm" /> </td>
            </tr>
        </table>

    </form>
</div>

<?php
    if(isset($_POST['titre']) && isset($_POST['recette'])){
    // $titre = strip_tags(trim($_POST['titre']));
        $date = $_POST['date'];
        $test = $_SESSION['id'];
        $titre = $_POST['titre'];                           
        $recette = $_POST['recette'];
        $addRecette = $bdd->prepare("INSERT INTO recette (id_recette,user_recette, date_recette, titre, recette) VALUES (NULL, ?, ?, ?, ?)");
        $addRecette->execute(array($test,$date,$titre, $recette));
    }
?>
