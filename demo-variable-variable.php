<?php
/**
 * Created by PhpStorm.
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * Date: 24/05/2017
 * Time: 09:36
 */
$toto = 12;
$tata = "lol";
$nomVariable = 'toto';
echo $$nomVariable;

class Toto{
    private $toto;

    /**
     * @return mixed
     */
    public function getToto()
    {
        return $this->toto;
    }

    /**
     * @param mixed $toto
     * @return $this
     */
    public function setToto($toto)
    {
        $this->toto = $toto;

        return $this;
    }

}

$nomDeClasse = "Toto";
$nomDeMethode = "setToto";
$toto = new $nomDeClasse();
$toto->$nomDeMethode(12);
var_dump($toto);
