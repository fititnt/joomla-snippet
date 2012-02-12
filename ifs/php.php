<html>
	<head></head>	
	<body>
		
		<!-- Visite http://fititnt.org/if.html para lista completa
  @todo Terminar isso. Ok, talvez não esse (fititnt, 2012-02-12 01:38)
  -->
  
		
		<?php
		define('CONDICAO', true);
		define('CONDICAO2', false);
		?>


		<h4>"If tipo 1" - Grandes Blocos de HTML (templates e afins)</h4>
		<?php if (CONDICAO) : ?>
			<!--Olá! :D Eu sou um HTML feliz -->
			<!--Caso a CONDICAO seja verdadeira, eu aparecerei na página! -->
		<jdoc:include type="modules" name="top" style="beezDivision" headerLevel="3" />
	<?php endif; ?>



</body>
</html>
