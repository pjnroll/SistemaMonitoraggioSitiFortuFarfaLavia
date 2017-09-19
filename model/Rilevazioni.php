<?php

class Rilevazioni
{
    private $IDSensore;
    private $ID;
    private $Messaggio;
    private $DescrizioneRilevazione;

    public function __get($var) {
        switch($var) {
            case 'ID':
                return $this->ID;
                break;
            case 'Messaggio':
                return $this->Messaggio;
                break;
            case 'DescrizioneRilevazione':
                return $this->DescrizioneRilevazione;
                break;
            case 'IDSensore':
                return $this->IDSensore;
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