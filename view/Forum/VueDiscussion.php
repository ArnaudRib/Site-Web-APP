<div class="AllForum bodybackground">

  <?php if($error!=''):?>
    <div class="errorbox blackborder radius" style="text-align:center; margin:20px auto;">
      <?php echo $error;?>
    </div>
  <?php endif; ?>
  <?php if($succes!=''): ?>
    <div class="successbox blackborder radius" style='margin:20px auto; padding:10px;'>
      <?php echo $succes;?>
    </div>
  <?php endif; ?>

  <div class="forum">
    <h2 class="forums" style="text-align:center;"><?php echo $topic['titre']?> > <?php echo $discussion['titre']?> </h2>

    <div class="padding10 bleu">
      <div class="post-auteur">
        Auteur : <?php echo $discussion['creator'];?>
      </div>
      <div class="post-sujet">
        Sujet: <?php echo $discussion['titre']?>
      </div>
    </div>
    <hr class="HR1">


<?php $i=1; ?>
<?php if(empty($messages)): ?>
  <div class="infobox" style="text-align:center; margin:20px auto; width:80%;">
    Aucun message n'a encore été posté dans cette section.
  </div>
<?php else: ?>
  <?php foreach ($messages as $key => $value): ?>
    <?php $creator=str_replace(' ', '-', $value['creator']) ?>
    <article class="post">
      <div class="conv-pseudo">
        <a href="<?php goToPage('profilUnUtilisateur', ['pseudo'=>$value['creator']])?>" class="pseudo"><?php echo $value['creator']?></a>
        <img class="avatar" src="<?php echo image('Users/Profil/'.$creator.'.jpg')?>" />
        <p class="nombre-message">Messages: <?php echo $nbTotalMessageUsers[$value['id_utilisateur']]?>
      </div>
      <div class="conv-contenu">
        <h2 class="titre-post">Titre: <?php echo $value['titre']?></h2>
        <p class="date-post">« <span class="gras">Réponse #<?php echo $i?></span> <?php echo diffDate($value['date_creation'])?> »</p>
        <hr class="hr-post">
        <p class="contenu"><?php echo $value['texte']?></p>
        <?php if (isset($value['date_modification'])): ?>
          <p class="modification" style="display:inline-block;">
            « Modifié: <?php echo diffDate($value['date_modification'])?> par <?php echo $pseudouser[$value['id_user_modification']]?> »
          </p>
        <?php endif; ?>

        <?php if($_SESSION['user']['id']==$value['id_utilisateur']): ?>
          <form action="" method="post" style="display:inline-block; float:right;">
            <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
            <input type="hidden" name="titre" value="<?php echo $value['titre'] ?>">
            <input type="hidden" name="reponse" value="<?php echo $value['texte'] ?>">
            <div class="blockImg2" style="display:block; float:right;">
              <input class="deletebutton2" type="submit" name="Delete" value="Effacer">
            </div>
            <div class="blockImg" style="display:block; float:right;">
              <input class="modifybutton2" type="submit" name="Modify" value="Modifier">
            </div>
          </form>
        <?php endif; ?>
      </div>

      <?php if(isset($modification) && $id_modif==$value['id']): ?>
        <form id="form-reponse" action="" method="post">
          <input type="hidden" name="id_message" value="<?php echo $id_modif ?>">
          <div class="titreanswer">
            <label for="inputform">Titre</label>
            <input id='inputform' class="inputforum" type="text" name="titre" placeholder="Titre" value="<?php echo $titre_modif ?>">
          </div>
          <div class="textanswer">
            <label for="areaanswer">Corps du message</label>
            <textarea id='areaanswer' class="form-text" form="form-reponse" name="reponse" placeholder="Veuillez insérer votre réponse ici"><?php echo $reponse_modif ?></textarea>
          </div>
          <input class="bouton-poster" style="width:auto;" type="submit" name="ModifyMessage" value="Modifier le message">
        </form>
      <?php endif; ?>

    </article>


    <?php $i+=1; ?>
  <?php endforeach; ?>
<?php endif; ?>
    <?php if(isLogged() && !isset($modification)): ?>
    <div class="repondre">
      <form id="form-reponse" action="" method="post">
        <div class="AnswerSpace">
          <div class="titreanswer">
            <label for="inputform">Titre</label>
            <input id='inputform' class="inputforum" type="text" name="titre" placeholder="Titre" value="<?php if(isset($error)){if(!empty($_POST)){ echo $_POST['titre'];}} ?>">
          </div>
          <div class="textanswer">
            <label for="areaanswer">Corps du message</label>
            <textarea id='areaanswer' class="form-text" form="form-reponse" name="reponse" placeholder="Veuillez insérer votre réponse ici"><?php if(isset($error)){if(!empty($_POST)){ echo $_POST['reponse'];}}?></textarea>
          </div>
          <input class="bouton-poster bleu" type="submit" name="PostMessage">
        </div>
      </form>
    </div>
    <?php endif;?>


    <?php if(!isLogged()): ?>
      <div class="repondre">
        <div class="AnswerSpace" style='text-align:center;padding:30px;'>
          Veuillez vous connecter pour pouvoir poster un message.
        </div>
      </div>
    <?php endif;?>
  </div>
</div>
