<?php
$clave = $_POST["clave"];
$WebService="https://www.dafi.com.mx/ConsultaRemota/Service.asmx?wsdl";
//parametros de la llamada
$parametros = array();
$parametros['claveFideicomiso'] = $clave;
//Invocación al web service
$WS = new SoapClient($WebService, $parametros);
//recibimos la respuesta dentro de un objeto
$result = $WS->ObtenerEstados($parametros);
//Mostramos el resultado de la consulta
$response=$result->ObtenerEstadosResult;
// $resultArray=  json_encode($response);
// var_dump($resultArray);   
// var_dump($response->{'Estado'});
foreach($response->{'Estado'} as $item){
    echo $item->{'ClaveEstado'};
    echo $item->{'Nombre'};
}    
print ('<br /><a href="index.php">Volver</a>');
?>