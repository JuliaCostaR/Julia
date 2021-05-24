<?php

	include 'lib/app.php';

	$link = bancoConecta();

	$sql = <<<EOT

        SELECT 
            Name, LifeExpectancy, Population, GNP 
        FROM 
            country
        WHERE
            Continent = ‘South America’
        ORDER BY
        	LifeExpectancy	DESC
EOT;
?>

<h1>Paises Sul-Americanos e seus dados</h1>

<table class="table table-striped table-sm table-bordered">
	<thead>
		<tr>
			<th scope="col">Nome</th>
			<th scope="col">Expectativa de Vida</th>
			<th scope="col">População</th>
			<th scope="col">PIB</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach(executaSelect($link,$sql) as $linha) { ?> 
			<tr>
				<td><?=$linha['Name']?></td>
				<td><?=$linha['LifeExpectancy']?></td>
				<td><?=$linha['Population']?></td>
				<td><?=$linha['GNP']?></td>
			</tr>
		<?php } /*foreach*/ ?>
	</tbody>
</table>