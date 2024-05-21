<?php
require_once 'ClassVerAmbiente.php';
class MontarHtml extends CarregaAmbiente{
	function __construct(){
		echo '		    
		';
	}

	function MontarHead($pag){
		$amb = new CarregaAmbiente;	
		switch ($pag) {	
			case "padrao":	
				include 'conexao/conexao.php';
						
				echo '
					<head>       
					<meta charset="utf-8">
					<meta http-equiv="X-UA-Compatible" content="IE=edge">
					<meta name="viewport" content="width=device-width, initial-scale=1"> 
					<title>CONTADOR</title>
					<link rel="icon" href="image/icon-timer.jpeg" type="image/jpeg">
					<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
					<link href="https://fonts.googleapis.com/css?family=Orbitron" rel="styleshee" type="text/css">
					<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
					<link rel="stylesheet" href="common/cute-alert-master/style.css">
					<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
					<link rel="stylesheet" href="common/bootstrap.css">
					<link rel="stylesheet" href="common/bootstrap.min.css">
					<link rel="stylesheet" href="css/style.css">';   
				echo'</head>';
			break;
		}
	}		

	function MontarScripts($pag){
		$amb = new CarregaAmbiente;
		echo'
			
		';	
		switch ($pag) {		
			case "padrao":		
				echo'
				<footer>        				
					<div class="footer-text">
						<p class="footer-text__source">
							Contador desenvolvido por 
							<img class="logoslabs" src="image/logodedev.png"></img>                   
						</p>
					</div>
				</footer>
				<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>    
				<script type="text/javascript" src="common/jquery.js"></script>  
				<script type="text/javascript" src="common/jquery.min.js"></script> 
				<script type="text/javascript" src="common/bootstrap.min.js"></script>
				<script type="text/javascript" src="common/bootstrap.js"></script> 
				<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>   
				<script type="text/javascript" src="common/cute-alert-master/cute-alert.js"></script>
				<script type="text/javascript" src="js/script.js"></script>    
				</body>
				</html>';
			break;
		}
	}
}