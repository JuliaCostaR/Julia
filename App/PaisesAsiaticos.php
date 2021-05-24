<?php

	include 'lib/app.php';

	$link = bancoConecta();

	$sql = <<<EOT

        SELECT 
            Name, LifeExpectancy, Population, GNP 
        FROM 
            country
        WHERE
            Continent = 'Asia'
        ORDER BY
        	LifeExpectancy
EOT;
?>

<h1>Paises Asiáticos e seus dados</h1>

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