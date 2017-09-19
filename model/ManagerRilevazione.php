<?php

class ManagerRilevazione
{
    private $db;

    function __construct($DB)
    {
        $this->db = $DB;
    }

    public function scomponiRilevazione($rilevazione_grezza) {
            $stringa_scomposta = str_getcsv($rilevazione_grezza, ";");
            return $stringa_scomposta;
    }
    public function getRilevazioni($Utente) {
        if (!isset($criterio)) {
            $query = 'SELECT * FROM rilevazione';
            $param = array();
            $result = $this->db->query($query, $param);
        }else {
            if ($criterio == 1) {
                $query = 'SELECT * FROM rilevazione WHERE IDSensore = :chiave';
                $param = array();
                $param[':chiave'] = $chiave;
                $result = $this->db->query($query, $param);
            }
        }
        // Se la query ha dato risultati
        $rilevazioni = array();

        if (isset($result)) {
            // Scorro ciascuna riga, creando un oggetto sito e aggiungendolo ad un array di restituzione
            foreach ($result as $result) {
                $s = new Rilevazione();
                $s->riempi($result);
                array_push($rilevazioni, $s);
            }
        } else {
            $s = new Rilevazione();
            array_push($rilevazioni, $s);
        }
        return $rilevazioni;
    }
    public function trovaRilevazione($chiave = "", $criterio = ""){
        if (!isset($criterio)) {
            $query = 'SELECT * FROM rilevazione';
            $param = array();
            $result = $this->db->query($query, $param);
        }else {
                if ($criterio == 1) {
                    $query = 'SELECT * FROM rilevazione WHERE IDSensore = :chiave';
                    $param = array();
                    $param[':chiave'] = $chiave;
                    $result = $this->db->query($query, $param);
                }
            }
            // Se la query ha dato risultati
            $rilevazioni = array();

            if (isset($result)) {
                // Scorro ciascuna riga, creando un oggetto sito e aggiungendolo ad un array di restituzione
                foreach ($result as $result) {
                    $s = new Rilevazione();
                    $s->riempi($result);
                    array_push($rilevazioni, $s);
                }
        } else {
            $s = new Rilevazione();
            array_push($rilevazioni, $s);
        }
        return $rilevazioni;
    }
}