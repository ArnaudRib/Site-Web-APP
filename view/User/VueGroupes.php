<div class="fond_mongroupe">
  <div id="image_de_fond">
    <img src="<?php echo image('Users/.png')?>"/>
  </div>
  <div id="haut_mongroupe">
    <img src="<?php echo image('Users/.png')?>"/>
    <h1><?php echo $_SESSION['user']['pseudo'] ?></h1>
    <div id="menu_mongroupe">
      <nav>
        <ul style='margin-top:15px;'>
          <a href="<?php  goToPage('profil')?>" id="non_selectionne"><li>Informations personnels</li></a>
          <a href="<?php  goToPage('groupesUtilisateur')?>" id="selectionne"><li>Mes Groupes</li></a>
          <a href="<?php  goToPage('planningUtilisateur')?>" id="non_selectionne"><li>Planning</li></a>
          <a id="creergroupe" href="<?php goToPage('creationgroupe')?>" ><li>Créer un groupe</li></a>
      </ul>
    </nav>
  </div>
</div>

  <div id="mes_groupes" class="profil">

    <div class="cote_mesgroupes radius_mongroupe forme_case">
      <div class="titre">
        <h1>Trier par sport :</h1>
      </div>
      <div class="sports_mesgroupes">
        <ul>
          <?php foreach ($sports as $key => $value) :?>
          <li><?=$value ?></li>
        <?php endforeach; ?>
        </ul>
      </div>
    </div>
    <?php foreach ($dataGroupUser as $key => $value) :?>
      <div id="publication" class="radius_mongroupe forme_case">
        <div class="titre">
          <h1><?=$value['nom'] ?></h1>
          <h2><?=$value['date_creation'] ?></h2>
          <h2><?=$value['nom_leader'] ?></h2>
          <h2><?=$value['nbmax_sportifs'] ?></h2>
        </div>
        <p><?=$value['description'] ?></p>
      </div>
    <?php endforeach?>
  </div>

</div>
