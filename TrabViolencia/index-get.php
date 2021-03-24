<?php
		<b>Escolha o ano desejado para a procura:</b>
    $ano = array("2011", "2012", "2013", "2014", "2015", "2016");
    foreach($ano as $ano) {
        echo "<a href=\"dados-violencia-get.php?seleciona=$ano\">$ano</a> ";
    }
    $cidade = null;
?>