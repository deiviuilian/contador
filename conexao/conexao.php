<?php	
    try {
        $conn = pg_connect("host=localhost dbname=contador user=postgres password=Dev040404@");
      
        if (!$conn) {
            echo json_encode(array('type' => 'error', 'message' => 'Não foi possível conectar ao servidor PostGreSQL'));
            exit;
        } 
  
    } catch (Exception $e) {
        $msg = $e->getMessage();
        echo json_encode(array('type' => 'error', 'message' => 'Erro de conexão: ' . str_replace("'", "", $msg)));
        exit;
    }
?>