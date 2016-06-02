<?php
require_once 'config/Vue.php';
require_once 'model/UserModele.php';

class UserController
{
  private $user;

  function __construct()
  {
    $this->user=new UserModele();
    $this->groupe=new GroupeModele();
  }


  public function connexion()
  {
    $message='';
    if (!empty($_POST['pseudo']) && !empty($_POST['mot_de_passe']) ) //Oublie d'un champ
    {
      //On check le mot de passe
      $data=$this->user->CheckUser()->fetch();
      if ($data['mot_de_passe'] == sha1($_POST['mot_de_passe'])) // Acces OK !
      {
        $_SESSION['user']=$data;
        header('Location: '.goToPage('Accueil').'?connexion=true');
      }
      else // Acces pas OK !
      {
        $message = '<p>Une erreur s\'est produite
        pendant votre identification.<br /> Le mot de passe ou le pseudo
        entré n\'est pas correcte.
        <br />Cliquez <a href="./">ici</a>
        pour revenir à la page d accueil, ou modifiez les informations saisies.</p>';
      }
    }

    $vue=new Vue("Connexion","User",['stylesheet.css']);
    $vue->loadpage(['message'=>$message]);
  }


  public function inscription()
  {
    $message='';
    if(!empty($_POST)){
      if (isset($_POST['pseudo']) || isset($_POST['mot_de_passe'])){
        if($_POST['mot_de_passe']==$_POST['mot_de_passe_confirmation']){
          $data1=$this->user->FreePseudo($_POST['pseudo']); // si pseudo non déjà utilisé.
          if(!$data1){
            $data=$this->user->InscriptionUser(); //si il y a une réponse, true + tableau de la réponse, sinon, false.
            if($data){
              $message= 'Inscription réussie!';
            }
          }else{
            $message= "Pseudo déjà utilisé!";
          }
        }else{
          $message= 'Mots de passe non correspondants.';
        }
      }else{
        $message= 'Un des champs est vide.';
      }
    }
    $vue=new Vue("Inscription","User",['stylesheet.css'], ['Verification.js']); // dans le fichier view/User, chercher Vue"Inscription", et load la page css stylesheet.css .
    $vue->loadpage(['message'=>$message]);
  }


  public function loadProfil()
  {
    $pseudouser=str_replace(' ', '-', $_SESSION['user']['pseudo']);
    if(!empty($_POST['modifyProfil'])){
      $verification = new Verification($_POST);
      $verificationPhoto = new Verification($_FILES);
      $verification->notEmpty('email', "Veuillez compléter le champ email.");
      $verification->notEmpty('nom', "Spécifiez votre nom de famille.");
      $verification->notEmpty('prenom', "Spécifiez votre prénom.");
      $verification->notEmpty('sexe', "Êtes-vous un homme ou une femme?");
      $verification->notEmpty('ville', "Choississez une ville.");
      $error.=$verification->error;

      if($verification->isValid()){
        if(!empty($_FILES['photo']['name']))
          $verificationPhoto->PhotoOk('photo', $pseudouser.'.jpg','Users/Profil', false);
        if(!empty($_FILES['couverture']['name']))
          $verificationPhoto->PhotoOk('couverture', $pseudouser.'.jpg','Users/Bannière', false);

        if(!$verificationPhoto->isValid()){
          $error.="Un problème s'est produit lors de l'ajout des photos.";
        }else{
          if(!empty($_FILES['photo']['name']))
             deletePhoto($pseudouser.'.jpg', 'Users/Profil', 'photo');
          if(!empty($_FILES['couverture']['name']))
             deletePhoto($pseudouser.'.jpg', 'Users/Bannière', 'couverture');
         /*upload images*/
         //
         $error.=uploadPhoto($pseudouser.'.jpg', 'Users/Profil', 'photo');
         $error.=uploadPhoto($pseudouser.'.jpg', 'Users/Bannière', 'couverture');
        }
        if(empty($error)){
          $ville=$this->groupe->getVilleByName($_POST['ville'])->fetch();
          $id_ville=$ville['id'];
          $this->user->modifierProfil($_SESSION['user']['pseudo'], $id_ville);
          $succes="Profil modifié avec succès!";
        }
      }
    }

    $id_ville=$_SESSION['user']['id_ville'];
    if(!empty($_SESSION['user']['id_ville'])){
      $ville=$this->groupe->getVilleById($id_ville)->fetch();
      $nomville=$ville['name'];
    }
    $_SESSION['user']=$this->user->getDataUser($_SESSION['user']['pseudo'])->fetch(); //refresh la session.
    $vue=new Vue("Profil","User",['stylesheet.css'], ['calendrier.js', 'modifier_profil.js', 'showphoto.js', 'RechercheGroupe.js']);
    $vue->loadpage(['nomville'=>$nomville, 'pseudouser'=>$pseudouser, 'error'=>$error, 'succes'=>$succes]);
  }

  public function LoadPlanningUser(){ // Mon planning
    $events = $this->user->getEvent();
    $vue=new Vue("Planning","User",['stylesheet.css'], ['calendrier.js']); // dans le fichier view/User, chercher Vue"Inscription", et load la page css stylesheet.css .
    $vue->loadpage(['events' => $events]);
  }

  public function LoadGroupesUser(){
    $vue=new Vue("Groupes","User",['stylesheet.css']); // dans le fichier view/User, chercher Vue"Inscription", et load la page css stylesheet.css .
    $sports = $this->user->getGroupesSportsUtilisateur();
    $dataGroupUser = $this->user->getDataGroupeUser();
    $vue->loadpage(['sports'=>$sports,'dataGroupUser'=>$dataGroupUser]);
  }

  public function LoadAUser($pseudo_user){ //Profil des autres
    $dataUser=$this->user->getDataUser($pseudo_user)->fetch();
    $vue=new Vue("ProfilUnUtilisateur","User",['stylesheet.css']); // dans le fichier view/User, chercher Vue"Inscription", et load la page css stylesheet.css .
    $vue->loadpage(['dataUser'=>$dataUser]);
  }


  public function deconnexion(){
    session_unset($_SESSION['user']);
    header('Location: connexion');
  }

}
