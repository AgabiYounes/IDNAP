
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
	<link rel="icon" type="image/png" href="img/logo2.png" />
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/style-registration.css" rel="stylesheet" />
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>


	<title>Livraison | IDN Algérie Poste</title>
</head>

<body>
		<?php echo $success; ?>
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-8 col-sm-offset-2">

		            <div class="wizard-container">

		                <div class="card wizard-card" data-color="orange" id="wizardProfile">
		                    <form action="#" method="POST">
		                    	<div class="wizard-header text-center">
		                        	<h3 class="wizard-title">La Livraison</h3>
									<p class="category" id="confidentiel">Ce servicce n'est disponnible que pour les colis qui n'ont pas était délivré!.<br>
										Sinon nous vous supposons le service de <a href="inscriptionReexpeditionCtrl.php">la réexpédition</a> !</p>
		                    	</div>

							
		                       
		                            <div class="tab-pane" id="posteRestante">
		                                <div class="row">
		                                   
		                                    <div class="col-sm-7 col-sm-offset-1">
		                                    	
		                                    

		                                    <div class="form-group">
              										<label>Id du colis que vous voulez Modifier<small>(obligatoire)</small></label>
              										<select name="idColis" class="form-control">
              											<?php
															$idnap=getIdnap($_SESSION['client']);
															$table=getColis($idnap);
															$i=0;

															while ($donnee= $table->fetch()){		?>

		                                                <option value= <?php echo strip_tags($donnee['idColis']); $i++; ?>  > <?php echo strip_tags($donnee['idColis']); $i++; ?> </option>
		                                                <?php  } $table->closeCursor();  ?>
		                                            </select>
              												</div>


              								<div class="form-group">
              													<label>Nouvelle date de reception <small>(obligatoire)</small></label>
              													<input name="dateRecep" type="date" class="form-control" placeholder="01/02/2018" required>
              												</div>

		                                   <div class="form-group">
              												<label>Nouvelle de adresse de reception <small>(Obligatoire)</small></label>
              												<select name="commune" class="form-control">
              											<?php
															$table1=getAdresses();

															while ($donnee1= $table1->fetch()){		?>

		                                                <option value=<? echo strip_tags($donnee1['0']);  ?> > <?php echo strip_tags(utf8_encode(getAdressInfoStr($donnee1['0']))); ?> </option>
		                                                <?php  } $table->closeCursor();  ?>
		                                            </select>
		                                            <p>Vous n'avez pas trouvé votre adresse ?<br> vous pouvez en <a href="InsertAddressCtrl.php">ajouter</a> autant que vous voulez!</p> 
	              											</div>
              											
											<div class="form-group">
              									<input name="lu" type="checkbox" class="form-control line" required>
              									<label class="line">Je confirme d'avoir lu les informations sur ce service et ses tarifs.</label>
              								</div>
		                                
		                            <div class="pull-right l20">
		                                <input type='submit' class='btn btn-finish btn-fill btn-warning btn-wd' name='finish' value='Valider' />
		                            </div>
</div>
</div>


		                            </div>
		                        </div>
		                        <div class="wizard-footer">
		                            
		                            <div class="clearfix"></div>
		                        </div>
		                    </form>
		                </div>
		            </div>
		        </div>
	    	</div>
		</div>


</body>
</html>