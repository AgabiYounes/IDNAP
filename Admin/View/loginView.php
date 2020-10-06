<!--
  Project Name: ID Numérique Algerie Poste
  Version: 1.0.0
  Author: Agabi Rayane Younes, Arar Mohamed Akram
  Date de debut du developpement : 15-02-2018
  Date de fin du developpement : 08-06-2018
-->
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>IDN Algérie Poste -Login</title>
  <link rel="icon" type="image/png" href="../public/img/logo.png" />
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <link href="../public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../public/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="../public/css/sb-admin.css" rel="stylesheet">

</head>

<body id="body-login">
  <div class="container" id="container-login">
    <div class="card card-login mx-auto mt-5" id="form-login">

      <div class="card-header">
        <h1>Se connecter</h1>
        <h4>Administrateur</h4>
      </div>
      <div class="card-body">
        <?= $info ?>
        <form action="#" method="POST" id="login-form">
          <div class="form-group">
            <label for="email-login" class="login-label">Nom d'utilisateur</label>
            <input class="form-control text-center" type="text" placeholder="Nom d'utilisateur" name="username" required maxlength="20">
          </div>
          <div class="form-group">
            <label for="password-login" class="login-label">Mot de passe</label>
            <input class="form-control text-center" type="password" placeholder="Mot de passe" name="password" required maxlength="20">
          </div>
          <input type="submit" class="btn btn-primary btn-block" id="submit-login">

        </form>

      </div>
    </div>
  </div>
  <script src="../public/vendor/jquery/jquery.min.js"></script>
  <script src="../public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../public/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
