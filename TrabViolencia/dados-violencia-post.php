<?php
    if(!empty($_POST["cidade"])){
        $cidade = $_POST["cidade"];
        $f = fopen("dados-violencia-domestica.csv", "r");
        $dados=fgetcsv($f);
        echo "<tr><td>$dados[0]</td><td>$dados[1]</td><td>$dados[2]</td><td>$dados[3]</td>
        <td>$dados[4]</td><td>$dados[5]</td><td>$dados[6]</td><td>Somatorio</td><tr>";
        while($dados){
           if($cidade == $dados[0] ){
                $soma = $dados[1] +$dados[2] +$dados[3] +$dados[4] +$dados[5] +$dados[6];
                echo "<tr><td>$dados[0]</td><td>$dados[1]</td><td>$dados[2]</td><td>$dados[3]</td><td>$dados[4]</td><td>$dados[5]</td><td>$dados[6]</td><td>$soma</td><tr>";
                break;
            }
            $dados=fgetcsv($f);
        }
        fclose($f);
    }
?>