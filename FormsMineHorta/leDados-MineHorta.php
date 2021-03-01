<?php
    $letras = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
    foreach($letras as $letra) {
        echo "<a href=\"leDados.php?seleciona=$letra\">$letra</a> -";
    }
?>

<table border="1"> 
<?php
    $letra = $_GET["seleciona"];
    $f = fopen("dados.csv", "r");
    $dados=fgetcsv($f);
	while($dados)
	{
        if(strpos($dados[0],$letra)===0) {
            $cor = "yellow";
        } else {
            $cor = "white";
        }
        echo "<tr bgcolor='$cor'><td>$dados[0]</td><td>$dados[1]</td><td>$dados[2]</td><tr>";
        $dados=fgetcsv($f);
	}
    fclose($f);
?>
</table>
