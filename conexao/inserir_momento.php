<?php	

	require_once 'conexao.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST["nome"]; 
        $momento = $_POST["momento"];		
        $data = $_POST["data"]; 
        $hora = $_POST["hora"];	 
        $minuto = $_POST["minuto"];	  
        
        if (isset($_POST["nome"])) {
            $negociador = $_POST["nome"];	

            $sql = "SELECT COUNT(*) AS count FROM tab_contador WHERE nome = '".pg_escape_string($conn,$nome)."' AND momento = '".pg_escape_string($conn,$momento)."'";
            $resultado = pg_query($conn, $sql);        
        
            if (!$resultado) {
                $response = array(
                    'type' => 'error',
                    'message' => 'Erro ao verificar existência do momento: ' . pg_last_error($conn)
                );
                echo json_encode($response);
                exit;
            }
            
            $result = pg_fetch_assoc($resultado);
            $count = $result['count'];

            if($count > 0){            
                try{
                    $sql = "UPDATE tab_contador SET
                    data = '".pg_escape_string($conn,$data)."',
                    hora = '".pg_escape_string($conn,$hora)."',
                    minutos =  '".pg_escape_string($conn,$minuto)."',
                    atualizadoem = NOW()
                    WHERE nome = '".pg_escape_string($conn,$nome)."' AND momento = '".pg_escape_string($conn, $momento)."'";	
                
                    $result = pg_query($conn, $sql);               
                
                    if ($result) {
                        $response = array(
                            'type' => 'success',
                            'message' => 'Já existe este Momento salvo para esta pessoa! Momento atualizado!'
                        );
                    } else {
                        $response = array(
                            'type' => 'error',
                            'message' => 'Erro ao atualizar o momento: ' . pg_last_error($conn)
                        );
                    }
                    
                } catch(Exception $e) {
                    $response = array(
                        'type' => 'error',
                        'message' => 'Momento não atualizado!',
                        'details' => $e->getMessage()
                    );
                }
            }else{	  
        
                try{
                    $sql = "INSERT INTO tab_contador (nome,momento,data,hora,minutos,criadoem) 
                    VALUES ('".pg_escape_string($conn, $nome)."',
                    '".pg_escape_string($conn, $momento)."',
                    '".pg_escape_string($conn, $data)."',
                    '".pg_escape_string($conn, $hora)."',
                    '".pg_escape_string($conn, $minuto)."',
                    NOW())";		
                
                    $result = pg_query($conn, $sql);            
                
                    if ($result) {
                        $response = array(
                            'type' => 'success',
                            'message' => 'Momento inserido com Sucesso!',
                        );
                    } else {
                        $response = array(
                            'type' => 'error',
                            'message' => 'Erro ao inserir os dados: ' . pg_last_error($conn)
                        );
                    }           

                } catch (Exception $e) {
                    $response = array(
                        'type' => 'error',
                        'message' => 'Momento não inserido!',
                        'details' => $e->getMessage()
                    );
                
                    // Exibir a consulta SQL e detalhes do erro para depuração
                    echo '<pre>' . $sql . '</pre>';
                    echo $e->getMessage();
                    echo $e->getLine();
                }
            }

            pg_close($conn);
            // Retornar a resposta
            echo json_encode($response);       
        } else {
            $response = array(
                'type' => 'error',
                'message' => 'Nome não fornecido!'
            );
            echo json_encode($response);
        }
    } else {
        $response = array(
            'type' => 'error',
            'message' => 'Requisição inválida!'
        );
        echo json_encode($response);
    }
?>