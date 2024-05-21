<?php
require_once 'conexao.php';

try {
    $sql = "SELECT DISTINCT nome FROM tab_contador";
    $resultado = pg_query($conn, $sql);

    if (!$resultado) {
        throw new Exception('Erro na consulta: ' . pg_last_error($conn));
    }

    $nomes = array();
    while ($row = pg_fetch_assoc($resultado)) {
        $nomes[] = $row;
    }

    pg_close($conn);

    echo json_encode($nomes);
} catch (Exception $e) {
    $response = array(
        'type' => 'error',
        'message' => $e->getMessage()
    );
    echo json_encode($response);
    pg_close($conn);
}
?>
