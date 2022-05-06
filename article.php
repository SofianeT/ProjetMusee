<?php 
    session_start();
    require('actions/oeuvre/showArticleContentAction.php'); 
    require('actions/oeuvre/postAnswerAction.php');
    require('actions/oeuvre/showAllAnswersOfQuestionAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
<link rel="stylesheet" href="index.css">
    
    <?php include 'includes/navbar.php'; ?>
    <br><br>

    <div class="container">


        <?php 
            if(isset($errorMsg)){ echo $errorMsg; }


            if(isset($question_publication_date)){
                ?>
                <section class="show-content">
                    <h3><?= $question_title; ?></h3>
                    <hr>
                    <p><?= $question_content; ?></p>
                    <hr>
                    <small><?= '<a href="profile.php?id='.$question_id_author.'">'.$question_pseudo_author . '</a> ' . $question_publication_date; ?></small>
                </section>
                <br>
                <section class="show-answers">

                    <form class="form-group" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Réponse :</label>
                            <textarea name="answer" class="form-control"></textarea>
                            <br>
                            <button class="btn btn-primary" type="submit" name="validate">Répondre</button>
                        </div>
                    </form>

                    <?php 
                        while($answer = $getAllAnswersOfThisQuestion->fetch()){
                            ?>
                            <div class="card">
                                <div class="card-header">
                                    <a href="profile.php?id=<?= $answer['id_auteur']; ?>">
                                        <?= $answer['pseudo_auteur']; ?>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <?= $answer['contenu']; ?>
                                  
                                </div> 
                                <?php 
                                 if(isset($_SESSION['auth'] ) && $_SESSION['role'] == 'admin'){
                                         ?>
                                    <p><a href="actions/oeuvre/ddeleteOeuvreAction.php?id=<?= $answer['id']; ?>" style="color:brown; text-decoration:none ; "> Supprimer la réponse </a> </p>
                                      <?php
                                         }
                                    ?>
                            </div>
                            
                            <br>
                            <?php
                        }
                    ?>

                </section>
                
                <?php
            }
        ?>

    </div>
    <button id="myBtn"><a href="#top" style="color: white">TOP</a></button>

</body>
</html>