<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="Semantic/semantic.css">
	<link rel="stylesheet" href="Semantic/semantic.min.css" />
	<link rel="stylesheet " type="text/css" href="css.css">
	<link rel="stylesheet " type="text/css" href="css.css">
	<script type="text/javascript" src="Semantic/semantic.min.js"></script>
	<title></title>
</head>
<body>
	<section class="margem">
		<section class="calc"><h1>Calculadora</h1></section>
		<section class="separa"></section>
		<form action="funcao.php" method="post">
			<section class="ip">
				<div class="ui input"><h4>Ip:</h4>
		 			 <input type="text" name="ip">
				</div>
			</section>
			<section class="ip">	
				<div class="ui input"><h4>Mascara:</h4>
		 			 <input type="number" min="25" max="32" name="mascara" >
				</div>
			</section>
			<section class="masc">
				<button type="submit" class="ui button">Enviar</button>
			</section>
		</form>
	</section>
</body>
</html>