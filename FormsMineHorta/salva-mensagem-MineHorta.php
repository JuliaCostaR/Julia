<?php
	error_reporting(E_ALL & ~ E_NOTICE);
    $data = $_POST["data"];
    $firma = $_POST["firma"];
    $ender = $_POST["endereco"];
    $compl = $_POST["compl"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $cep = $_POST["cep"];
    $cnpj = $_POST["cnpj"];
    $insc = $_POST["insc"];
    $tels = $_POST["tels"];
    $celular = $_POST["celular"];
    $email = $_POST["email"];
    $obs = $_POST["obs"];

    if(empty($firma))
    {
        echo "<b>O campo firma deve ser preenchido. </b>";
        include "form-fale-conosco-MineHorte.php";
        die;
    }
    if(validaCNPJ($cnpj)== false)
    {
        echo "<b>O valor do campo CNPJ não parece ser um CNPJ.</b>";
        include "form-fale-conosco-MineHorte.php";
        die;
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        echo "<b>O valor do campo email não parece ser um email.</b>";
        include "form-fale-conosco-MineHorte.php";
        die;
    }
	if(empty($tels)&&empty($celular)&&empty($email))
    {
        echo "<b>Pelo menos 1 contato (telefone, celular ou email) deve ser preenchido. </b>";
        include "form-fale-conosco-MineHorte.php";
        die;
    }
	
	function validaCNPJ($cnpj = null) {
        if(empty($cnpj)) {
        return false;
        }
        $cnpj = preg_replace("/[^0-9]/", "", $cnpj);
        $cnpj = str_pad($cnpj, 14, '0', STR_PAD_LEFT);
        if (strlen($cnpj) != 14) {
        return false;
        }
        else if ($cnpj == '00000000000000' || 
            $cnpj == '11111111111111' || 
            $cnpj == '22222222222222' || 
            $cnpj == '33333333333333' || 
            $cnpj == '44444444444444' || 
            $cnpj == '55555555555555' || 
            $cnpj == '66666666666666' || 
            $cnpj == '77777777777777' || 
            $cnpj == '88888888888888' || 
            $cnpj == '99999999999999') {
            return false;
        } else {   
            $j = 5;
            $k = 6;
            $soma1 = "";
            $soma2 = "";
            for ($i = 0; $i < 13; $i++) {
                $j = $j == 1 ? 9 : $j;
                $k = $k == 1 ? 9 : $k;
                $soma2 += ($cnpj{$i} * $k);
                if ($i < 12) {
                    $soma1 += ($cnpj{$i} * $j);
                }
                $k--;
                $j--;
            }
            $digito1 = $soma1 % 11 < 2 ? 0 : 11 - $soma1 % 11;
            $digito2 = $soma2 % 11 < 2 ? 0 : 11 - $soma2 % 11;
            return (($cnpj{12} == $digito1) and ($cnpj{13} == $digito2));
        }
    }
    $f = fopen("mensagens.csv","a");
    fputcsv($f, array($data, $firma, $ender, $compl, $bairro, $cidade, $estado, $cep, $cnpj, $insc, $tels, $celular, $email, $obs));
    fclose($f);

    // redirecionamento
    header('location: obrigado-MineHorte.php');

?>
