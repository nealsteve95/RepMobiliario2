<?php
if (!isset($_GET['codigo'])) {
    header('Location: index2.php?mensaje=error');
    exit();
}

include ('modelo/conexion.php');
$codigo = $_GET['codigo'];


$sentencia = $bd->prepare("SELECT doc.nombre_documento, doc.tipo_documento, doc.id_agente, age.nombres, age.apellidos, age.telefono
FROM documentos doc
INNER JOIN agentes age ON age.id_agente = doc.id_agente
WHERE doc.id_agente = ?;");
$sentencia->execute([$codigo]);
$agentes = $sentencia->fetch(PDO::FETCH_OBJ);

    $curl = curl_init();
    
    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.green-api.com/waInstance1101816202/sendFileByUpload/c837fb6cbe3e476fb580c47b3ea9615e1dec82a4672744a08c",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => array(
        // cambio agentes y en vez de celular telefono
        'chatId' => "51".$agentes->telefono."@c.us",
        'caption' => 'Querido agente: '.strtoupper($agentes->nombres).' '.strtoupper($agentes->apellidos).' le hemos enviado los recursos necesarios para el nuevo proyecto. REVISAR',
        'file' => curl_file_create('imagenes/Formatoins.pdf', 'pdf', 'Formatoins.pdf')
    ),
    CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "content-type: multipart/form-data"
    ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
    echo "cURL Error #:" . $err;
    } else {
    echo $response;
    }  

?> 