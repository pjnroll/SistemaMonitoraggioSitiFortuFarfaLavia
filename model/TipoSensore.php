<?php

class TipoSensore
{
    private $ID;
    private $Nome;
    private $DatiContenuti;
    private $Posizione;
    private $IDSito;
    public function __get($var) {
        switch($var) {
            case 'ID':
                return $this->ID;
                break;
            case 'Nome':
                return $this->Nome;
                break;
            case 'DatiContenuti':
                return $this->DatiContenuti;
                break;
            case 'Posizione':
                return $this->Posizione;
                break;
            case 'IDSito':
                return $this->IDSito;
                break;
            default:
                return $this->$var;
                break;
        }
    }

    public function __set($var, $val) {
        $this->$var = $val;
    }
    public function riempi($datiUtente) {
        // Per ogni indice che corrisponde al nome degli attributi dell'oggetto Utente, inserisco i relativi valori.
        foreach ($datiUtente as $key => $value) {
            $this->__set($key, $value);
        }
    }
}