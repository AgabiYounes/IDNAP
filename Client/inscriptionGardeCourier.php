<!--
	Project Name: ID Numérique Algerie Poste
	Version: 1.0.0
	Author: Agabi Rayane Younes, Arar Mohamed Akram
	Date : 22-04-2018
-->
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


	<title>Inscription au service de la garde du courier | IDN Algérie Poste</title>
</head>

<body>
<?php echo $success; ?>
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-8 col-sm-offset-2">

		            <div class="wizard-container">

		                <div class="card wizard-card" data-color="orange" id="wizardProfile">
		                    <form action="inscriptionGardeCourierCtrl.php" method="POST">
		                    	<div class="wizard-header text-center">
		                        	<h3 class="wizard-title">La Garde des couriers</h3>
									<p class="category" id="confidentiel">Veuillez remplir les champs si dessous afin de s'y inscrire.</p>
		                    	</div>

							
		                       
		                            <div class="tab-pane" id="posteRestante">
		                                <div class="row">
		                                   
		                                    <div class="col-sm-7 col-sm-offset-1">
		                                    	
		                                 

		                                    

              								<div class="form-group">
              													<label>Date de fin du contrat <small>(obligatoire)</small></label>
              													<input name="dateFin" id="dateFin" type="date" class="form-control" placeholder="01/10/2018" min="20-07-2018" required>
              								</div>

		                                   <div class="form-group">
              												<label>Numéro de Compte CCP <small>(Obligatoire)</small></label>
              												<input name="ccp" type="number" class="form-control" placeholder="xxxxxxxx" required>
              											</div>
              								<div class="form-group">
              									<input name="lu" type="checkbox" class="form-control line" required>
              									<label class="line">Je confirme d'avoir lu les informations sur ce service et ses tarifs.</label>
              								</div>
              											

		                                
		                            <div class="pull-right l20">
		                                <input type='submit' class='btn btn-finish btn-fill btn-warning btn-wd' name='finish' value='Valider' />
		                            </div>
		                            <br><br> <div class="text-center">
						<a class="txt2" href="accueilClient.php" style="margin-left: 90px;">
							Acceuil
						</a> 
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
