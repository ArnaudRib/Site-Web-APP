<div class="fond_mongroupe">
  <div id="image_de_fond">
    <?php $nomgroupe=str_replace(' ', '-', $datagroupe['nom']);?>
  <img src="<?php echo image('Groupes/Bannière/'.$nomgroupe.'.jpg')?>"/>
  </div>
    <div id="haut_mongroupe">
      <div class="imgprofilsize">
        <img src="<?php echo image('Groupes/Profil/'.$nomgroupe.'.jpg')?>"/>
      </div>
      <h1><?php echo $datagroupe['nom']?></h1>
      <div id="menu_mongroupe">
        <nav>
          <ul style='margin-top:15px;'>
            <a href="<?php  goToPage('informationsgroupe',['id'=>$datagroupe['id'], 'id_publication'=>'1'])?>" id="non_selectionne"><li><?php echo lang('Informations') ?></li></a>
            <a href="<?php  goToPage('publicationsgroupe',['id'=>$datagroupe['id'], 'id_publication'=>'1'])?>" id="non_selectionne"><li><?php echo lang('Publications') ?></li></a>
            <a href="<?php  goToPage('evenementsgroupe',['id'=>$datagroupe['id'], 'id_evenement'=>'1'])?>" id="selectionne"><li><?php echo lang('Evènements') ?></li></a>
            <a href="<?php  goToPage('membresgroupe',['id'=>$datagroupe['id']])?>" id="non_selectionne"><li><?php echo lang('Membres') ?></li></a>
           <?php if(!empty($_SESSION['user']['pseudo'])):
           if($isMembre==false):
          if($datagroupe['public']!="0"):
          if((intval($datagroupe['nbmax_sportifs']))-(intval($NBmembres['0']['COUNT(id)']))>0):?>
        <?php  if($isInvit==true):?>
            <li id="abonnement" style="margin-top:-10px; margin-left:40px;">
              <form class="" action="" method="post">
                <input  type="submit" name="abonnement" value="Accepter l'invitation" style='cursor:pointer;'></input>
              </form>
              </li>
              <li id="desabonnement" style="margin-top:-10px; margin-left:10px;">
              <form class="" action="" method="post">
                <input  type="submit" name="desiste" value=" X " style='cursor:pointer;'></input>
              </form>
              </li>
            <?php else:  ?>
              <li id="abonnement" style="margin-top:-10px;">
                <form class="" action="" method="post">
                  <input  type="submit" name="abonnement" value="<?php echo lang('Rejoindre')?>" style='cursor:pointer;'>
                </form>
              </li>
            <?php endif;?>
          <?php endif;?>
        <?php  endif; ?>
      <?php  elseif($isLeader==true):?>
          <li id="abonnement" style="margin-top:-10px; margin-left:60px; padding:4px;">
            <a href="<?php goToPage('createevenement',['id'=>$datagroupe['id']])?>"><?php echo lang("Créer un événement") ?></a>
          </li>
          <?php else:?>
            <li id="desabonnement" style="margin-top:-10px;">
            <form class="" action="" method="post">
              <input type="submit" name="desabonnement" value="<?php echo lang('Désinscire')?>" style='cursor:pointer;'>
            </form>
            </li>
          <?php endif;
          endif;?>
          </ul>
        </nav>
      </div>
  </div>

  <?php /*$taille=10; ?>
  <?php $hauteur=30+310*($taille); */?> <!-- REMPLACER $EVENEMNT PAR COUNT($EVENEMENT) plus tard qd requete. permet de setup la hauteur de la page. Evite pb ac footer -->
  <div id="corps_mongroupe" />
  <?php
  if($datagroupe['public']!="0"):
  if ($evenement!=NULL):
      foreach ($evenement as $key => $value):
        $nom_evenement=str_replace(' ', '-', $value['nom']); ?>
        <div id="<?php echo $i=count($evenement) ?>" class="case_mongroupeevenement radius_mongroupe forme_case">
          <img src="<?php echo image('Groupes/Evenements/'.$nom_evenement.'.jpg')?>"/>
          <div class="texteevenement">
            <h1><?php echo $value['nom']?></h1>
            <h2 style="font-size:15px; color:grey;"><?php echo lang('Début')?> : <?php echo $value['date_debut']?></h2>
            <h2 style="font-size:15px; color:grey;"><?php echo lang('Fin')?>  : <?php echo $value['date_fin']?></h2>

            <p><?php echo $value['description']?></p>
            <a style="display:inline-block;" href="<?php goToPage('unevenementgroupe',['id'=>$datagroupe['id'], 'id_evenement'=>$value['id']])?>"><?php echo lang("Plus d'info") ?></a>

            <?php if($isLeader):?>
              <form style="display:inline-block;" class="" action="" method="post">
                <input type="hidden" name="id_evenement" value="<?php echo $value['id']?>">
                <input type="hidden" name="nom" value="<?php echo $value['nom']?>">
                <input id="deletebutton" type="submit" class="buttonsupprimerevenement" name="deleteEve" value="Supprimer l'évènement" style="">
              </form>
            <?php else:?>

            <?php endif;?>
          </div>
        </div>
      <?php  endforeach;
    else:?>
      <div  class="publication forme_case radius_mongroupe">
        <h1><?php echo lang("Aucun événement") ?></h1>
      </div>
      <?php
    endif;
    else:
    if($isMembre==false):?>
      <div  class="publication forme_case radius_mongroupe">
        <h1><?php echo lang("Groupe privé. Evénements masqués.") ?></h1>
      </div>
      <?php else:
      if ($evenement!=NULL):
      foreach ($evenement as $key => $value):
        $nom_evenement=str_replace(' ', '-', $value['nom']); ?>
        <div id="<?php echo $i=count($evenement) ?>" class="case_mongroupeevenement radius_mongroupe forme_case">
          <img src="<?php echo image('Groupes/Evenements/'.$nom_evenement.'.jpg')?>"/>
          <div class="texteevenement">
            <h1><?php echo $value['nom']?></h1>
            <h2 style="font-size:15px; color:grey;"><?php echo $value['date_debut']?></h2>
            <p><?php echo $value['description']?></p>
            <a style="display:inline-block;" href="<?php goToPage('unevenementgroupe',['id'=>$datagroupe['id'], 'id_evenement'=>$value['id']])?>"><?php echo lang("Plus d'info") ?></a>

            <?php if($isLeader):?>
              <form style="display:inline-block;" class="" action="" method="post">
                <input type="hidden" name="id_evenement" value="<?php echo $value['id']?>">
                <input type="hidden" name="nom" value="<?php echo $value['nom']?>">
                <input id="deletebutton" type="submit" class="buttonsupprimerevenement" name="deleteEve" value="Supprimer l'évènement" style="">
              </form>
            <?php else:?>

            <?php endif;?>
          </div>
        </div>
      <?php  endforeach;
    else:?>
      <div  class="publication forme_case radius_mongroupe">
        <h1><?php echo lang("Aucun événement") ?></h1>
      </div>
      <?php
    endif;
    endif;
    endif;?>
  </div>
</div>
