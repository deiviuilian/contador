<?php
class CarregaAmbiente
{
	function __toString()
	{
		$ambArray = explode('/', $_SERVER["REQUEST_URI"]); //JOGA ENDEREÇO PRA DENTRO DE UM ARRAY
		array_shift($ambArray); // REMOVE O PRIMEIRO VALOR DO ARRAY (SESADV238)
		$retorno = array_shift($ambArray); // JOGA O VALOR DA POSIÇÃO DO AMBIENTE PARA VÁRIAVEL $retorno
		return $retorno; //retornar (Intranet ou intranet_dev)
	}
}
