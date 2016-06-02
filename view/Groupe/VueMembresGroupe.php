<div class="fond_mongroupe">
  <div id="image_de_fond">
    <?php $nomgroupe=str_replace(' ', '-', $datagroupe['nom']);?>
  <img src="<?php echo image('Groupes/Bannière/'.$nomgroupe.'.jpg')?>"/>
  </div>
    <div id="haut_mongroupe">
      <img src="<?php echo image('Groupes/Profil/'.$nomgroupe.'.jpg')?>"/>
      <h1><?php echo $datagroupe['nom']?></h1>
      <div id="menu_mongroupe">
        <nav>
          <ul style='margin-top:15px;'>
            <a href="<?php  goToPage('informationsgroupe',['id'=>$datagroupe['id'], 'id_publication'=>'1'])?>" id="non_selectionne"><li><?php echo lang('Informations') ?></li></a>
            <a href="<?php  goToPage('publicationsgroupe',['id'=>$datagroupe['id'], 'id_publication'=>'1'])?>" id="non_selectionne"><li><?php echo lang('Publications') ?></li></a>
            <a href="<?php  goToPage('evenementsgroupe',['id'=>$datagroupe['id'], 'id_evenement'=>'1'])?>" id="non_selectionne"><li><?php echo lang('Evènements') ?></li></a>
            <a href="<?php  goToPage('membresgroupe',['id'=>$datagroupe['id']])?>" id="selectionne"><li><?php echo lang('Membres') ?></li></a>
            <?php if($isMembre==false):?>
            <li id="abonnement" style="margin-top:-10px;">
              <form class="" action="" method="post">
                <input  type="submit" name="abonnement" value="Rejoindre" style='cursor:pointer;'>
              </form>
            </li>
          <?php elseif($isLeader==true): ?>
            <li id="abonnement" style="margin-top:-10px; margin-left:60px; padding:4px;">
              <a href="<?php goToPage('createevenement',['id'=>$datagroupe['id']])?>"><?php echo lang("Créer un événement") ?></a>
            </li>
            <?php else: ?>
              <li id="desabonnement" style="margin-top:-10px;">
              <form class="" action="" method="post">
                <input type="submit" name="abonnement" value="Désinscrire" style='cursor:pointer;'>
              </form>
              </li>
            <?php endif;?>
          </ul>
        </nav>
      </div>
  </div>

  <div id="corps_mongroupe">
    <?php foreach ($membre as $key => $value):?>
        <div id="<?php echo $i=count($membre) ?>" class="case_membre radius_mongroupe forme_case">
          <img src="<?php echo image('Groupes/sport3.jpg')?>" />
          <a href=""><h1><?php echo $value['pseudo']?></h1></a>
          <?php if($isLeader==true):
            if(($value['leader_groupe'])!=1):?>
          <form style="float:right; margin-right:30px;" class="" action="" method="post">
            <label style="display:inline-block;" for="deletebutton" class="deletebutton">&#10006;</label>
            <input type="hidden" name="id_utilisateur" value="<?php echo $value['id_utilisateur']?>">
            <input id="deletebutton" type="submit" name="deleteUser" value="delete" style="display:none;">
          </form>
        <?php endif;
      endif;?>
        </div>
        <?php
      endforeach;
        ?>

  </div>
