<div class="fond_mongroupe">
  <div id="image_de_fond">
    <img src="<?php echo image('Users/Bannière/'.$pseudouser.'.jpg')?>" alt="La photo n'a pas encore été ajoutée."/>
  </div>
  <div id="haut_mongroupe">
    <div class="imgprofilsize">
      <img src="<?php echo image('Users/Profil/'.$pseudouser.'.jpg')?>" alt="La photo n'a pas encore été ajoutée."/>
    </div>
    <h1><?php echo $dataUser['pseudo'] ?></h1>
    <div id="menu_mongroupe">
      <nav>
        <ul style='margin-top:15px;'>
        </ul>
      </nav>
    </div>
  </div>


  <div class="profil profilUnUtilisateur" style="margin-bottom:100px;">

    <div class="sesInfos fond" style="margin-bottom:20px;">
      <h1 class="titre"><?php echo lang('Ses Informations personnelles') ?></h1>
      <label for="">
        <?php if( date("m")==date("m",strtotime($dataUser['naissance'])) && date("d")==date("d",strtotime($dataUser['naissance'])) ) : ?>
          <img class="iconeBirthday" src="<?php echo image('Users/anniversaire.png')?>" alt="" />
        <?php endif; ?>
        Pseudo :
        <?php echo isset($dataUser['pseudo']) ? $dataUser['pseudo'] : "<i>Non précisé</i>"?>
      </label>
      <label for=""><?php echo lang('Prénom')?> : <?php echo isset($dataUser['prenom']) ? $dataUser['prenom'] : "<i>Non précisé</i>"?></label>
      <label for="">Email : <?php echo isset($dataUser['email']) ? $dataUser['prenom'] : "<i>Non précisé</i>"?></label>
      <label for=""><?php echo lang('Ville')?>: <?php echo isset($nomville) ? $nomville : "<i>Non précisée</i>"?></label>
      <a href="<?php echo goToPage('messageprive')?>">
        <label class="fa fa-envelope" style="margin:0px auto; text-align:center;width:100%; padding:5px; margin-bottom:10px;" for=""><span style="font-family:Verdana;margin:10px; cursor:pointer; border:1px black solid; border-radius:5px; width:50%; padding:5px; background-color:rgb(156, 234, 255);"><?php echo lang('Le contacter')?> </span></label>
      </a>
  </div>


  <div class="sesGroupes fond">
    <h1 class="titre"><?php echo lang('Ses Groupes')?></h1>
    <?php if(empty($groupUser)): ?>
      <?php $vide=true; ?>
    <?php endif ?>
    <?php foreach ($groupUser as $key => $value) :
      if($value['public']==1 || !$vide) :  ?>
      <a href="<?php goToPage('informationsgroupe', ['id'=>$value['id_groupe']])?>">
        <div class="infos_groupe">
          <h2><?=$value["nom_groupe"] ?></h2>
          <h4><?php echo lang('Adresse')?> : <?php echo !empty($nomville) ? $value["adresse"] : 'Non précisée.' ?></h4>
          <h4>Sport : <?=$value["nom_sport"]  ?></h3>
          <h4><?php echo lang('Nombre max de membres')?> : <?=$value["nbmax_sportifs"]  ?></h4>
        </div>
      </a>
    <?php else: ?>
      <p style="padding:10px;">
        <?php echo lang('Aucun groupe public trouvé.'); ?>
      </p>
    <?php endif;?>
  <?php endforeach ?>

  </div>
  <div class="cote_mesgroupes radius_mongroupe forme_case" style="width:80%; margin:20px auto;text-align:center; display:block;">
    <div class="titre">
      <h1><?php echo lang('Photos des groupes auxquels il est inscrit.');?></h1>
    </div>
    <div class="sports_mesgroupes" style='padding:20px;'>
      <?php if(!empty($array)): ?>
        <?php CreateSlider($array, 'Fade', '100%', '400px'); ?>
      <?php else: ?>
        <p style="padding:10px;">
          <?php echo lang('Aucun groupe public trouvé.'); ?>
        </p>
      <?php endif; ?>
      </div>
    </div>
  </div>

</div>
