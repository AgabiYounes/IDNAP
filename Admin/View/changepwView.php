<?php ob_start(); ?>
<div class="content-wrapper">
  <div class="container-fluid">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="../index.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Changer le mot de passe du compte</li>
    </ol>
    <div class="container">
        <form  id="formchangepw" method="POST" action="#">
          <fieldset>
            <legend class="text-center">Changer le mot de passe du compte</legend>



              <div class="row">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4">
                  <?= $info ?>
              </div>
              </div>
          <div class="form-group row">
                <label class="col-sm-4 label-form">Ancien Mot de passe</label>
                <div class="col-sm-4">
              <input type="password" name="oldpasseword" class="form-control text-center" placeholder="********" id="old" required>
            </div>
          </div>
          <div class="form-group row">
                <label class="col-sm-4 label-form">Le nouveau mot de passe</label>
                  <div class="col-sm-4">
              <input type="password" name="newpassword" id="newpassword" class="form-control text-center" placeholder="*********" required>
            </div>
          </div>
          <div class="form-group row">
                <label class="col-sm-4 label-form">Confirmer le nouveau mot de passe</label>
                  <div class="col-sm-4">
                    <input type="password" name="confirmenewpassword" class="form-control text-center" placeholder="*********" id="confirmenewpassword" required>
                  </div>
          </div>
          <div class="row">
            <div class="col-sm-12 text-center div-submit ">
              <button type="submit" class="btn btn-outline-success" id="submit-notify">Valider</button>
            </div>
          </div>
          </fieldset>
        </form>
    </div>

  </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
