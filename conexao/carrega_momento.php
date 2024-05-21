<?php
	require_once 'Conexao.php';

    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST["nome"]; 
        $momento = $_POST["momento"];	
	
        $sql = "SELECT data, hora, minutos FROM tab_contador
        WHERE nome = '".pg_escape_string($conn,$nome)."' 
        AND momento = '".pg_escape_string($conn,$momento)."'";
        $resultado = pg_query($conn, $sql);

        if (!$resultado) {
            throw new Exception('Erro na consulta: ' . pg_last_error($conn));
        }

        $rs = pg_fetch_assoc($resultado);
       
        $date = new DateTime($rs['data']);
        $dateformat = $date->format('d/m/Y');           

        $dados =  "|".$dateformat/*1*/."|".$rs["hora"]/*2*/."|".$rs["minutos"]/*3*/;
        echo $dados;
    }