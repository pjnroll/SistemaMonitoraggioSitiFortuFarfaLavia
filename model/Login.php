<?php
    class Login {
        private $db;
        function __construct($DB) {
            $this->db = $DB;
        }

        function verifica($emailAddress, $password_) {
            $password = password_hash($password_, PASSWORD_DEFAULT);

            // Preparo ed eseguo la query
            $parametri = array();
            $parametri[':emailAddress'] = $emailAddress;
            $result = $this->db->query('SELECT * FROM Utente WHERE Email = :emailAddress', $parametri);
            $pwd = $result[0]['Password'];
            if (password_verify($password_, $pwd))
                return $result[0];
            else return false;
        }

        function redireziona($param) {
            ob_start();
            // Se l'utente è amministratore
            if ($param == 1)
                header('Location: /index.php?action=pannelloamministratore');
            // Se è un cliente
            else if ($param == 0)
                header('Location: /index.php?action=areaclienti');
            //Se non è proprio loggato
            else if ($param == -1)
                header('Location: /index.php?action=loginfailed');
            ob_end_flush();
        }
    }