<?php

	include 'lib/app.php';

	$link = bancoConecta();

	$sql = <<<EOT

        SELECT 
            Name
        FROM 
            country
        WHERE
            code in (
            	SELECT 	CountryCode
            	FROM 	countrylanguage
            	WHERE 	countrylanguage.Language ="Portuguese"
            )

EOT;
?>

<h1>Países que falam português</h1>

<table class="table table-striped table-sm table-bordered">
	<thead>
		<tr>
			<th scope="col">Nome</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach(executaSelect($link,$sql) as $linha) { ?> 
			<tr>
				<td><?=$linha['Name']?></td>
			</tr>
		<?php } /*foreach*/ ?>
	</tbody>
</table>
