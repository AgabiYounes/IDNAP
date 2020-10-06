<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
		<link rel="icon" type="image/png" href="images/icons/favicon.png"/>

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width" />
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<script src="http://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/paper-bootstrap-wizard.js" type="text/javascript"></script>
	<script src="js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
	<script src="js/jquery.validate.min.js" type="text/javascript"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">


	<link rel="icon" type="image/png" href="img/logo2.png" />
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/style-registration.css" rel="stylesheet" />
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>

	<script type="text/javascript">
		function lettersonly(input){
			var regex=/[^a-z]/gi;
			input.value=input.value.replace(regex,"");
		}
	</script>

	<title>Inscription | IDN Algérie Poste</title>
</head>
<? 
	if(isset($_COOKIE['success'])){
		echo $_COOKIE['success'];
		unset($_COOKIE['success']);
	} 
?>
<body>

	    <div class="container">
	        <div class="row">
		        <div class="col-sm-8 col-sm-offset-2">

		            <div class="wizard-container">

		                <div class="card wizard-card" data-color="orange" id="wizardProfile">
		                    <form action="#" method="POST">
		                    	<div class="wizard-header text-center">
		                        	<h3 class="wizard-title">Créez votre identité dés maintenant </h3>
									<p class="category" id="confidentiel">Ces informations sont confidentielles</p>
		                    	</div>

								<div class="wizard-navigation">
									<div class="progress-with-circle">
									     <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 21%;"></div>
									</div>
									<ul>
			                            <li>
											<a href="#about" data-toggle="tab">
												<div class="icon-circle">

												</div>
												Informations générales
											</a>
										</li>
                    <li>
                      <a href="#more-about" data-toggle="tab">
                        <div class="icon-circle">
                        </div>
                          Informations detaillées
                      </a>
                    </li>
			              <li>
											<a href="#address" data-toggle="tab">
												<div class="icon-circle">
												</div>
												adresse
											</a>
										</li>
			             </ul>
								</div>
		                        <div class="tab-content">
		                            <div class="tab-pane" id="about">
		                            	<div class="row">
											<h5 class="info-text"> Veuillez remplir tous les champs</h5>
											<div class="col-sm-12">
												<div class="form-group">
													
													<label>Prénom | <small>Ecrire "Entreprise" s'il s'agit d'une entreprise</small> * </label>
													<input name="firstname" type="text" class="form-control" placeholder="Prénom..." id="form_firstname" onkeyup="lettersonly(this)">
													<span class="error_form" id="firstname_error_message" style:"color: #FF0052;"></span>
												</div>
												<div class="form-group">
													
													<label>Nom | <small>Nom d'entreprise s'il s'agit d'une entreprise </small> * </label>
													<input name="lastname" type="text" class="form-control" placeholder="Nom..." id="form_lastname" onkeyup="lettersonly(this)">
													<span class="error_form" id="lastname_error_message"></span>
												</div>
											</div>
											<div class="col-sm-12">
												<div class="form-group">
													<label>Email <small>(obligatoire)</small></label>
													<input name="email" type="email" class="form-control" placeholder="exmple@exemple.com" id="form_email">
													<span class="error_form" id="email_error_message"></span>
												</div>
												<div class="form-group">
													
												<label>Mot de passe <small>(obligatoire)</small></label>
												<input name="password" type="password" class="form-control" placeholder="********" id="form_password">
												<span class="error_form" id="password_error_message"></span>
											</div>
											<div class="form-group">
												
												<label>Répétez le Mot de passe <small>(obligatoire)</small></label>
												<input name="passwordrep" type="password" class="form-control" placeholder="********" id="form_retype_password">
												<span class="error_form" id="retype_password_error_message"></span>
											</div>
											</div>
										</div>
		                            </div>
                                <div class="tab-pane" id="more-about">
                                  <div class="row">
                                    <h5 class="info-text"> Veuillez remplir tous les champs</h5>
              												
              												<div class="col-sm-12">
                                      							<div class="form-group">
              													<label>Date de naissance <small></small></label>
              													<input name="date_naissance" type="date" class="form-control" placeholder="01/01/1900" min="1938-06-20" max="2000-06-20" required>
              												</div>
              												

              												<div class="form-group">
              													<label>Lieu de naissance <small></small></label>
              													<select name="lieu_naissance" class="form-control" required>
              														<option value=""></option>
              											<?php
															$table=getWilayas();

															while ($donnee= $table->fetch()){		?>

		                                                <option value=<? echo strip_tags($donnee['IDW']);  ?> > <?php echo strip_tags(utf8_encode($donnee['NomWilaya'])); ?> </option>
		                                                <?php  } $table->closeCursor();  ?>
		                                            </select>
              												</div>
																

																<div class="form-group">
              													<label>Type du client <small></small>*</label>

              													<select name="type" class="form-control" required>
              														<option value="Personne">Personne</option>
              														<option value="Entreprise">Entreprise </option>
              														
              													</select>
              												</div>
              												<div class="form-group">
              													<label>Sexe <small>(obligatoire)</small></label><br>
              												<select name="sexe" class="form-control" required>
              													<option value="Homme">Homme</option>
              													<option value="Femme">Femme</option>
              													<option value="ND">non-déterminé</option>

              												</select>
              												</div>

              												<div class="form-group">
              													<label>N° téléphone *</label>
              													<input name="mobile_number" type="number" class="form-control" placeholder="0550505050" maxlength="10" minlength="10" id="form_tel" required>
              													<span class="error_form" id="tel_error_message"></span>
              												</div>

              												<div class="form-group">
              													<label>Numéro de Compte CCP</label>
              													<input name="ccp" type="number" class="form-control" placeholder="xxxxxxxx" id="form_ccp">
              													<span class="error_form" id="ccp_error_message"></span>
              												</div>

              											    <div class="form-group">
																<label>Numéro d'identité numérique <small>"0000000000" s'il s'agit d'une entreprise</small>*</label>
																<input name="ncib" type="number" class="form-control" placeholder="xxxxxxxx" id="form_ncib" required>
																<span class="error_form" id="ncib_error_message"></span>
															</div>
																
																
                                    </div>
                                  </div>
                                </div>
		                            <div class="tab-pane" id="address">
		                                <div class="row">
		                                    <div class="col-sm-12">
		                                        <h5 class="info-text"> Veuillez saisir votre adresse physique </h5>
		                                    </div>
		                                    <div class="col-sm-7 col-sm-offset-1">
		                                    	<div class="form-group">
		                                            <label>Adresse</label>
		                                            <input type="text" name="address" class="form-control" placeholder="Cité des oliviers" required>
		                                        </div>
		                                    </div>
		                                    <div class="col-sm-3">
		                                        <div class="form-group">
		                                            <label>N°</label>
		                                            <input type="number" name="streetNumber" class="form-control" placeholder="242" required>
		                                        </div>
		                                    </div>
		                                    <div class="col-sm-5 col-sm-offset-1">
		                                        <div class="form-group">
		                                            <label>Commune</label>

													<select name="Commune" class="form-control" required>
              											<?php
															$table2=getCommunes();

															while ($donnee2= $table2->fetch()){		?>

		                                                <option value=<? echo strip_tags($donnee2['CodePostal']);  ?> > <?php echo strip_tags($donnee2['CodePostal']).' - '.strip_tags(utf8_encode($donnee2['NomBureau'])); ?> </option>
		                                                <?php  } $table2->closeCursor();  ?>
		                                            </select>

		                                        </div>
																						
		                                    </div>
		                                    <div class="col-sm-5">
		                                        <div class="form-group">
		                                            <label>Wilaya</label><br>
		                                          <select name="wilaya" class="form-control" required>
              											<?php
															$table1=getWilayas();

															while ($donnee1= $table1->fetch()){		?>

		                                                <option value=<? echo strip_tags($donnee1['IDW']);  ?> > <?php echo strip_tags($donnee1['IDW']).' - '.strip_tags(utf8_encode($donnee1['NomWilaya'])); ?> </option>
		                                                <?php  } $table1->closeCursor();  ?>
		                                            </select>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="wizard-footer">
		                            <div class="pull-right">
		                                <input type='button' class='btn btn-next btn-fill btn-warning btn-wd' name='next' value='Suivant' />
		                                <input type='submit' class='btn btn-finish btn-fill btn-warning btn-wd' name='finish' value='Valider' />
		                            </div>

		                            <div class="pull-left">
		                                <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Précedent' />
		                            </div>
		                            <div class="clearfix"></div>
		                        </div>
		                    </form>
		                    <div class="text-center p-t-136">
						<a class="txt2" href="index.php">
							Acceuil
						</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a class="txt2" href="loginCtrl.php">
							Login
						</a>
					</div>
		                </div>

		            </div>
		        </div>
	    	</div>
		</div>


</body>
</html>
