<?php
// Questa pagina è richiamabile dall'esterno tramite un $_POST
// Ipoteticamente consente ad un sensore di inviare i dati direttamente al sistema, verranno quindi ricevuti e salvati

require_once $_SERVER['DOCUMENT_ROOT'] . '/model/ManagerDB.php';
$db = ManagerDB::getInstance();

function riceviRilevazione($var)
{
    $param = array();
    foreach ($var as $key => $val) {
        $param[":" . $key] = $val;
    }
    return $param;
}

function salvaRilevazione($param)
{
    $query = 'INSERT INTO sito (IDCliente, Nome, Grandezza, Localita) VALUES (:Messaggio, :DescrizioneRilevazione, :IDSensore)';
    $this->db->query($query, $param);
}

define('PARAM_MAX', 3);
if (isset($_POST) && count($_POST) >= PARAM_MAX) {
    $param = riceviRilevazione($_POST);
    salvaRilevazione($param);
}