<?php 

    /**
     * USE CHAT API WHATSAPP TO
     * SEND A MESSAGE TO WHATSAPP
     * 
     * @param string $data -> JSON STRUCTURE
     * @param string $instane -> INSTANCE OF THE API
     * @param string $token -> TOKEN OF THE API
     */
    function sendWhatsapp($data, $instance, $token) {

        // 127621 instance
        // qmeckcs8g738916u token

        // ESTRUCTURA DE API
        $urlAPi = "https://eu79.chat-api.com/instance".$instance."/sendMessage?token=".$token;
        
        // GENERAMOS EL ENVIO DEL MENSAJE VIA WHATSAPP
        $curl = curl_init();
        curl_setopt_array($curl, array(

            // CURLOPT_URL => "https://api.mercury.chat/sdk/whatsapp/sendMessage?api_token=5ebec8e1ae0788001262b64cTjGsnxnFC&instance=L1589561569500Q",
            CURLOPT_URL => $urlAPi,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(

                "Content-Type: application/json",
                "Content-Type: text/plain",
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;
    }

    /**
     * GREETIN TO CLIENT
     * @param string $name -> NAME OF THE DEAL
     * @param int $phone -> PHONE OF DEAL
     */
    function greeting($name, $phone) {
        
        // GENERAMOS EL SALUDO AL CLIENTE
        $greeting = [

            "chatId" => "521".$phone."@c.us",
            "body" => "Estimado ".$name.
            ", solicitamos su ayuda para contestar la siguiente encuesta la cual nos sera de ".
            "gran ayuda para mejorar nuestro servicio y brindarle una mejor atención."
        ];
        // TRANSFORMAMOS EL ARRAY A JSON
        $dataGreeting = json_encode($greeting);
        // EMVIAMOS EL MENSAJE CON EL SALUDO
        sendWhatsapp($dataGreeting, '127621', 'qmeckcs8g738916u');
    }

    /**
     * MAKE STRUCTURE OF THE MESSAGE
     * 
     * @param string $name -> NAME OF THE DEAL
     * @param int id -> ID DEAL
     * @param int $phone -> PHONE OF DEAL
     * @param string $stage -> STAGE OF THE DEAL IN CRM
     * @param string $type -> TYPE OF SENDING MESSAGE
     * @param string $qr -> QR CODE OF THE DEAL
     */
    function makeMessage($name, $id, $phone, $stage, $type, $qr) {

        // ARRAY PARA ALMACENAR LA INFORMACION DE ACUERDO EL TIPO DE ENVIO
        $data = [];

        // VERIFICAMOS EL TIPO DE ENVIO PARA DETERMINAR LA ESTRUCTURA DEL JSON
        switch ($type) {
            case 'encuesta':
                $data = [
                    "chatId" => "521".$phone."@c.us",
                    "body" => "Estimado ".$name.
                    ", por este medio le hacemos llegar nuestra encuesta de servicio ".
                    "la cual puede contestar en el siguiene enlace www.google.com"
                ];
                break;
            
            default:
                # code...
                break;
        }

        // ESTRUCTURA DE ARRAY PARA GUARDAR LOS VALORES
        /* $data = [
            "chatId" => '521'.$phone.'@c.us',
            "body" => "Estimado ".$name.
            ", por este medio le hacemos llegar nuestra encuesta de servicio ".
            "la cual puede contestar en el siguiene enlace www.google.com",
            "link" => "www.google.com"
        ]; */

        $data = [
            "phone" => '521'.$phone,
            "body" => "CHAT API WORKS"
        ];

        // CONVERTIMOS EL ARRAY A FORMATO JSON
        $dataJson = json_encode($data);
        // print_r($dataJson); exit;
    }

?>