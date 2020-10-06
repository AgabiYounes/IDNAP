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


	<title>Insertion d'une adresse | IDN Algérie Poste</title>
</head>

<body>
<? if(isset($COOKIE['success']))
{
	echo $COOKIE['success'];
}?>	
    <div class="container">
	        <div class="row">
		        <div class="col-sm-8 col-sm-offset-2">

		            <div class="wizard-container">

		                <div class="card wizard-card" data-color="orange" id="wizardProfile">
		                    <form action="#" method="POST">
		                    	<div class="wizard-header text-center">
		                        	<h3 class="wizard-title">Ajoutez adresse physique</h3>
		                    	</div>

							
		                       
		                            <div class="tab-pane" id="address">
		                                <div class="row">
		                                   
		                                    <div class="col-sm-7 col-sm-offset-1">
		                                    	<div class="form-group">
		                                            <label>Adresse</label>
		                                            <input type="text" name="address" class="form-control" placeholder="Cité des oliviers">
		                                        </div>
		                                    </div>
		                                    <div class="col-sm-3">
		                                        <div class="form-group">
		                                            <label>N°</label>
		                                            <input type="number" name="streetNumber" class="form-control" placeholder="242">
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
		                            <div class="pull-right l20">
		                                <input type='submit' class='btn btn-finish btn-fill btn-warning btn-wd' name='finish' value='Valider' />
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
