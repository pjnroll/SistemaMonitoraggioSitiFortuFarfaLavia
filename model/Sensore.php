<?php

class Sensore
{
    private $ID;
    private $Marca;
    private $Tipo;
    private $IDSito;

    public function __get($var) {
        switch($var) {
            case 'ID':
                return $this->ID;
                break;
            case 'Marca':
                return $this->Marca;
                break;
            case 'Tipo':
                return $this->Tipo;
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