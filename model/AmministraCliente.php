<?php
class AmministraCliente {
    private $db;
    function __construct($DB) {
        $this->db = $DB;
    }

    public function aggiungiCliente($utente) {
        if (validaEmailPassword($utente->__get('Email'), $utente->__get('Password'))) {
            $query = 'INSERT INTO utente (Nome,Cognome,Email,DataDiNascita,Sesso,Residenza,LuogoDiNascita,NumeroDiTelefono,CodiceFiscale,Password,isAdmin) VALUES (:Nome,:Cognome,:Email,:DataDiNascita,:Sesso,:Residenza,:LuogoDiNascita,:NumeroDiTelefono,:CodiceFiscale,:Password, 0)';
            $param = array();
            $param[':Nome'] = $utente->__get('Nome');
            $param[':Cognome'] = $utente->__get('Cognome');
            $param[':Nome'] = $utente->__get('Nome');
            $param[':LuogoDiNascita'] = $utente->__get('LuogoDiNascita');
            $param[':DataDiNascita'] = $utente->__get('DataDiNascita');
            $param[':Sesso'] = $utente->__get('Sesso');
            $param[':Residenza'] = $utente->__get('Residenza');
            $param[':NumeroDiTelefono'] = (int)$utente->__get('NumeroDiTelefono');
            $param[':CodiceFiscale'] = $utente->__get('CodiceFiscale');
            $param[':Email'] = $utente->__get('Email');
            $param[':Password'] = password_hash($utente->__get('Password'), PASSWORD_DEFAULT);
            $this->db->query($query, $param);
        } else
            return -1;
    }

    public function modificaCliente($utente) {
        if (validaEmailPassword($utente->__get('Email'), $utente->__get('Password'))) {
            $query = 'UPDATE utente (Nome,Cognome,Email,DataNascita,Sesso,Residenza,LuogoNascita,NumeroTelefono,Codicefiscale,Password) VALUES (:Nome,:Cognome,:Email,:DataDiNascita,:Sesso,:Residenza,:LuogoDiNascita,:NumeroDiTelefono,:Codicefiscale,:Password) WHERE ID = :ID';
            $param = array();
            foreach($utente as $key => $value) {
                if ($param[$key] == ':Password')
                    $param[$key] = password_hash($utente->_get($key), PASSWORD_DEFAULT);
                else
                    $param[$key] = $utente->_get($key);
            }
            $this->db->query($query, $param);
        }
    }
    public function eliminaCliente($id) {
        $query = 'DELETE FROM utente WHERE ID = :ID';
        $param = array();
        $param[':ID'] = $id;
        $this->db->query($query, $param);
    }
    public function trovaClienti($chiave = "", $tipoCriterio = "") {
        $query = 'SELECT * FROM utente WHERE isAdmin = 0';
        if ($chiave != "" && $tipoCriterio != "") {
            if ($tipoCriterio == 0) {
                $query += ' AND Nome = :chiave';
                $param[':chiave'] = $chiave;
            }
            if ($tipoCriterio == 1) {
                $query += ' AND ID = :ID';
                $param[':ID'] = $chiave;
            }
        }
        $result = $this->db->query($query, $param);

        // Se la query ha dato risultati
        if (isset($result)) {
            $utenti_trovati = array();

            // Scorro ciascuna riga, creando un oggetto utente e aggiungendolo ad un array di restituzione
            foreach($result as $result) {
                $u = new Utente();
                $u->riempi($result);
                array_push($utenti_trovati, $u);
            }
        }
        else {
            $u = new Utente();
            array_push($utenti_trovati, $u);
        }
    return $utenti_trovati;
    }

    function validaEmailPassword($email, $password) {
        define('PASS_MAX'  , 6);
        $param = array();
        $param[':email'] = $email;
        $result = $this->db->query('SELECT * FROM utente WHERE Email = :email', $param);
        if(!isset($result[0]) && (strlen($password) >= PASS_MAX)) return true;
        else return false;
    }
}