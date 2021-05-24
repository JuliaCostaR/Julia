<?php

	include 'lib/app.php';

	$link = bancoConecta();

	$sql = <<<EOT

        SELECT 
            Name, Population
        FROM 
            country
        WHERE
            CountryCode = "BRA"
EOT;
?>

<h1>Cidades Brasileiras e suas Populações</h1>

<table class="table table-striped table-sm table-bordered">
	<thead>
		<tr>
			<th scope="col">Nome</th>
			<th scope="col">População</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach(executaSelect($link,$sql) as $linha) { ?> 
			<tr>
				<td><?=$linha['Name']?></td>
				<td><?=$linha['Population']?></td>
			</tr>
		<?php } /*foreach*/ ?>
	</tbody>
</table>
