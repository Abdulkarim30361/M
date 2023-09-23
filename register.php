
<?php
include_once 'config/env.php';
include_once 'config/database.php';
include_once 'Model/Users.php';
include_once 'Model/usersDao.php';


$db= new DatabaseConnector();
$connexion= $db->getConnection();

/* pour verifier si le forilaire a été envoyé*/

if($_SERVER['REQUEST_METHOD']==='POST')
{
  $_nom = $_POST['nom'];
  $mail = $_POST['mail'];
  $role=$_POST['role'];
  $password=$_POST['password'];
  $passwordCrypter = password_hash($password,PASSWORD_DEFAULT);

  $Users= new User ();
  $Users->setName($nom);
  $Users->setMail($mail);
  $Users->setRole($role);
  $Users->setPassword($passwordCrypter);
  $UsersDao= new UsersDao($connexion);
  $Userstatut=$UsersDao->create($Users);
  if($statut)
    {
      echo 'enregistré avec succès';
    }
    else 

      echo 'échec';
    
}
/***********************************************/
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Formulaire d'enregistrement </title>
    <meta name="viewport" content="width=device-width,
      initial-scale=1.0"/>
    <link rel="stylesheet" href="register.css" />
  </head>
  <body>
    <div class="container">
      <h1 class="form-title">Formulaire d'inscription</h1>

      <form action="" method="Post">
        <div class="main-user-info">
          <div class="user-input-box">
            <label for="nom">Nom</label>
            <input type="text"
                    name="nom"
                    placeholder="Entrer votre nom"/>
          </div>
          
          <div class="user-input-box">
            <label for="mail">mail</label>
            <input type="mail"
                    name="mail"
                    placeholder="Entrer un Email"/>
          </div>
          <div class="user-input-box">
            <label for="role">Votre role</label>
            <input type="text"
                    name="role"
                    placeholder="Donner votre rôle"/>
          </div>
          <div class="user-input-box">
            <label for="password">Password</label>
            <input type="password"
                    name="password"
                    placeholder="Enter votre Password"/>
          
        </div>
      
         <!--
          </div>
         <!- <div class="user-input-box">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password"
                    id="confirmPassword"
                    name="confirmPassword"
                    placeholder="Confirm Password"/>
          </div>
          
          <div class="gender-details-box">
          <span class="gender-title">Gender</span>
         -- <div class="gender-category">
            <input type="radio" name="gender" id="male">
            <label for="male">Homme</label>
            <input type="radio" name="gender" id="female">
            <label for="female">Femme</label>
          </div>!>
        </div>--> 
        
        <div class="form-submit-btn">
          <input type="submit" value="S'enregistrer">
        </div>
      </form>
    </div>
  </body>
</html>
