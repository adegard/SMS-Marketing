<?php

/* SMS REST API TO AUTO-SEND SMS ~ @Arnaud DEGARDIN  - https://github.com/adegard/      */

	require('skebby-gw2.php');
	
	// secret key to mitigate abuse of spamming using mailer api
if ($_GET['APIKEY']!="***INSERT CREDENTIALS HERE***") die("ERROR - invalid API secret key");

// address SMS recipient by name if recipient name provided
if ($_GET['SENDNAME']=="")
	$text = "Salve," . " ";
else
	$text = "Salve " . $_GET['SENDNAME'] . "," . " ";

// your catch-all email in case recipient email not provided
if ($_GET['TEL']=="")
	$tel = "3966666666666"; //ONLY FOR TRIALS
else
	$tel = $_GET['TEL'];

///////////////// SEND  SMS ///////////////
//       https://***server folder ***/sendsmsapi.php?APIKEY=***YOUR API***&SENDNAME=***NAME***&TEL=***NUMBER***
//i.e. :
//		 https://www.mysite.com/sendsmsapi.php?APIKEY=SSDHFDI7438JJJHK&SENDNAME=Paul&TEL=3901228756

	$method = 'classic';
	$recipients ='39'.$tel;
	$text .= "Ho trovato il suo annuncio su ilcercabadanti. Siamo un agenzia di badante in tutta Italia. Se la interessa le possiamo fare un preventivo. Mi dica quando la posso richiamare in orari di ufficio. Intanto puo consultare il nostro sito: Badante-NoProblem.com grazie, Valentina.	";
	$sender_number = '3966666666'; //must be a registeres number
	$sender_string = '';
	$charset = 'UTF-8';	// Collect data for SMS


	// IMPORTANTE:
	// INSERISCI QUI LE TUE CREDENZIALI SKEBBY
	define('SKEBBY_USERNAME','myusername');  //change with your credentials
	define('SKEBBY_PASSWORD','mypassword'); //change with your credentials

			
	$result = skebbyGatewaySendSMS(SKEBBY_USERNAME, SKEBBY_PASSWORD, $recipients, $text, $method, $sender_number, $sender_string, $charset);
	

?>
