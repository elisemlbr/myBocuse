<!-- Page une fois loggé -->
<main class="dashboardmain">
    <div class="pointage1">
        <?php   echo 'Bienvenu ', $_SESSION['statut'],' ',$_SESSION['prenom'],' ',$_SESSION['nom'];


    if($_SESSION['statut'] === 'chef'){
        // echo "bonjour CHEF ! ";   <--- Peut afficher des choses en plus
    }

?>

    </div>
    <section class="pointage">
        <div class="pointage1">
            <h2>Pointage</h2>
            <div class="pointage2">
                <div class="heurepointage">
                    <h3>Start</h3>
                    <button id="bouton_pointage"> 9:00</button>
                </div>
                <div class="heurepointage">
                    <h3>End</h3>
                    <button id="bouton_pointage">17:00</button>
                </div>
            </div>
        </div>
    </section>
    
                <div class="boxRecette">
                
                
                <?php
                $reponse = $bdd->query('SELECT * FROM recette ORDER BY dateR');
                while($donnees = $reponse->fetch())
                {
                ?>
                <div class="boxTitre">

                <div ><?php echo $donnees['dateR'] ?></div>
                <div ><?php echo $donnees['titre'] ?></div>
                <div ><?php echo $donnees['contenu'] ?></div>
                </div>
                <?php
                }         
                $reponse->closeCursor(); // Termine le traitement de la requête
                ?>
   

             </div>
            </div>
    <section class="calendrier">
        <h2>Calendrier</h2>

    </section>
<?php include('./Files_proteges/creation_recette.php'); ?>



</main>
