<?php 
  if(!isset($_GET["seleciona"]))
     $_GET["seleciona"] = null;
  if($_GET["seleciona"] <= 2016 && $_GET["seleciona"] >= 2011){
     $ano = $_GET["seleciona"];
     $f = fopen("dados-violencia-domestica.csv", "r");
     $dados=fgetcsv($f);
  while($dados){
     $ano = (int) $ano; 
     $ind = $ano - 2010;
      echo "<tr><td>$dados[0]</td><td>$dados[$ind]</td><tr>";
     $dados=fgetcsv($f);
  }
  fclose($f);    
	}
?>