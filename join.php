<?php
session_start();

$name="";
$prenom="";
$pseudo="";
$email="";
$phone="";
$naissance="";
$adresse="";
$postal="";
$ville="";
$bio="";
$url="";
$pony="";

if(isset($_POST['submit'])) {

	if(trim($_POST['contactname']) == '') {
		$hasError = true;
	} else {
		$name = trim($_POST['contactname']);
	}

	if(trim($_POST['prenom']) == '') {
		$hasError = true;
	} else {
		$prenom = trim($_POST['prenom']);
	}

	if(trim($_POST['pseudo']) == '') {
		$hasError = true;
	} else {
		$pseudo = trim($_POST['pseudo']);
	}

	if(trim($_POST['email']) == '') {
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	if(trim($_POST['phone']) == '') {
		$hasError = true;
	} else {
		$phone = trim($_POST['phone']);
	}

	if(trim($_POST['naissance']) == '') {
		$hasError = true;
	} else {
		$naissance = trim($_POST['naissance']);
	}

	if(trim($_POST['adresse']) == '') {
		$hasError = true;
	} else {
		$adresse = trim($_POST['adresse']);
	}

	if(trim($_POST['postal']) == '') {
		$hasError = true;
	} else {
		$postal = trim($_POST['postal']);
	}

	if(trim($_POST['ville']) == '') {
		$hasError = true;
	} else {
		$ville = trim($_POST['ville']);
	}

	if(trim($_POST['bio']) == '') {
		$hasError = true;
	} else {
		$bio = trim($_POST['bio']);
	}

	if(trim($_POST['url'])) {
		$url = trim($_POST['url']);
	}

	if(trim($_POST['pony']) == '') {
		$hasError = true;
	} else {
		$pony = trim($_POST['pony']);
	}

	if (trim($_POST['captcha-code']) == '') {
		$hasError = true;
	} else {
		if (strtoupper($_POST['captcha-code'])!=$_SESSION['captcha']) {
			$hasError = true;
			$wrongCaptcha = true;
		}
	}

	// HoneyPot
	if (trim($_POST['secret-key']) != '') {
		$hasError = true;	// Champ qui doit rester vide
	}

	//If there is no error, send the email
	if(!isset($hasError)) {
		$emailTo = 'contact@heuzef.com';
		$body = "
		Nom : $name $prenom ($pseudo) \n\n
		Email : $email \n\n
		Tel : $phone \n\n
		Date de naissance : $naissance \n\n
		Adresse : $adresse $postal $ville \n\n
		Bio : $bio \n\n
		URL : $url \n\n
		Pony : $pony \n\n
		";
		$headers = 'From: BronyCUB <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		mail($emailTo, "[BronyCUB] INSCRIPTION", $body, $headers);
		$emailSent = true;
	}
}
?>

<?php include 'header.php'; ?>
	<div class="container-fluid">
		<div class="row">
		 <div class="col-md-2">
		</div>

		 <div class="col-md-8">
			<img src="./img/title_join_min.png" alt="logo_bronycub" class="img-responsive" /><br />
			<form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="contactform" class="form-horizontal well" enctype="multipart/form-data">
				<?php if(isset($hasError)) { ?>
				<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>Certains champs ne sont pas remplis avec des informations valides.</div>
				<?php echo $erreur; ?></p>
				<?php } ?>

				<?php if(isset($emailSent) && $emailSent == true) { ?>
				<div class="alert alert-dismissable alert-success"><button type="button" class="close" data-dismiss="alert">×</button>
					<h3>Message bien reçu !</h3>
					<iframe width="853" height="480" src="//www.youtube.com/embed/KgOAo_u187A?autoplay=1" frameborder="0" allowfullscreen></iframe>
				</div>
				<br />
				<br />
				<?php } ?>

				<div class="form-group">
					<label for="contactname" class="col-lg-1 control-label">Nom</label>
					<div class="col-lg-4"><input type="text" name="contactname" id="contactname" class="form-control" id="contactname" placeholder="Nom" aria-required="true" value="<?php echo $name; ?>" ></div>
					<label for="prenom" class="col-lg-1 control-label">Pr&eacute;nom</label>
					<div class="col-lg-4"><input type="text" name="prenom" id="prenom" class="form-control" id="prenom" placeholder="Pr&eacute;nom" aria-required="true" value="<?php echo $prenom; ?>" ></div>
				</div>
				<div class="form-group">
					<label for="email" class="col-lg-1 control-label">Email</label>
					<div class="col-lg-4"><input type="text" name="email" id="email" class="form-control" id="email" placeholder="Email" aria-required="true" value="<?php echo $email; ?>" ></div>
					<label for="phone" class="col-lg-1 control-label">T&eacute;l&eacute;phone</label>
					<div class="col-lg-4"><input type="text" name="phone" id="phone" class="form-control" id="phone" placeholder="T&eacute;l&eacute;phone" aria-required="true" value="<?php echo $phone; ?>" ></div>
				</div>
				<br />
				<div class="form-group">
					<label for="pseudo" class="col-lg-1 control-label">Pseudo</label>
					<div class="col-lg-4"><input type="text" name="pseudo" id="pseudo" class="form-control" id="pseudo" placeholder="Pseudo Gravatar" aria-required="true" value="<?php echo $phone; ?>" ></div>
					<div class="col-lg-5"><div class="alert alert-info"><i class="fa fa-arrow-left fa-1x"></i>&nbsp;&nbsp;&nbsp;<strong>Important : </strong>votre pseudo sera synchronis&eacute; avec votre <a href="http://fr.gravatar.com" target="_blank">Gravatar</a> !</div></div>
				</div>
				<br />
				<div class="form-group">
					<label for="naissance" class="col-lg-1 control-label">Naissance</label>
					<div class="col-lg-4"><input type="text" name="naissance" id="naissance" class="form-control" id="naissance" placeholder="Date de naissance" aria-required="true" value="<?php echo $naissance; ?>" ></div>
					<label for="adresse" class="col-lg-1 control-label">Adresse</label>
					<div class="col-lg-4"><input type="text" name="adresse" id="adresse" class="form-control" id="adresse" placeholder="Adresse" aria-required="true" value="<?php echo $adresse; ?>" ></div>
				</div>
				<div class="form-group">
					<label for="ville" class="col-lg-1 control-label">Ville</label>
					<div class="col-lg-4"><input type="text" name="ville" id="ville" class="form-control" id="ville" placeholder="Ville" aria-required="true" value="<?php echo $ville; ?>" ></div>
					<label for="postal" class="col-lg-1 control-label">CP</label>
					<div class="col-lg-4"><input type="text" name="postal" id="postal" class="form-control" id="postal" placeholder="Code postal" aria-required="true" value="<?php echo $postal; ?>" ></div>
				</div>
				<br />
				<div class="form-group">
					<label for="bio" class="col-lg-1 control-label">Pr&eacute;sentation</label>
					<div class="col-lg-9"><textarea rows="5" name="bio" id="bio" rows="6" class="form-control" role="textbox" aria-required="true" placeholder="Ecrivez quelques lignes &agrave; propos de vous"><?php echo $bio; ?></textarea></div>
				</div>
				<br />
				<div class="form-group">
					<label for="url" class="col-lg-1 control-label">WWW <span class="label label-default">facultatif</span></label>
					<div class="col-lg-9"><textarea rows="5" name="url" id="url" rows="6" class="form-control" role="textbox" placeholder="Listez ici vos liens vers vos r&eacute;seaux sociaux, sites internets, etc ..."><?php echo $url; ?></textarea></div>
				</div>
				<div class="form-group">
					<label for="captcha" class="col-lg-3 control-label">Code de sécurité</label>
					<img id="captcha-img" src="captcha/captcha.php" alt="Captcha image" style="width: 100px; border:2px dotted black; margin-left:15px;"/>
					<div class="col-lg-4">
						<input type="text" name="captcha-code" id="captcha" class="form-control" placeholder="Recopiez le code de sécurité" aria-required="true" />
						<input style="display: none;" type="text" name="secret-key" id="honeypot" class="form-control" placeholder="Ce champ doit être vide" aria-required="false" />
<?php if (isset($wrongCaptcha) && $wrongCaptcha==true) { echo '<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>Code incorrect !</div>'; } ?>
					</div>
				</div>
				<div class="form-group">
					<label for="ville" class="col-lg-3 control-label">Who is best Pony ?</label>
					<div class="col-lg-4"><input type="text" name="pony" id="pony" class="form-control" id="pony" placeholder="Vos poneys pr&eacute;f&eacute;r&eacute;s ?" aria-required="true" value="<?php echo $pony; ?>"  ></div>
					<div class="col-lg-4">
					<input type="submit" value="BROHOOF /)" name="submit" id="submitButton" class="btn btn-info btn-large" title="Envoyer !" />
					</div>
				</div>
			</form>
		</div>

		 <div class="col-md-2">
		</div>
		</div>
	</div>

<?php include 'footer.php'; ?>
