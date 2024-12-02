<?php
class Profesor extends Persona
{
    private $nif;
    private $bailes;
    public function __construct($nombre, $apellido, $numTelefono, $nif)
    {
        parent::__construct($nombre, $apellido, $numTelefono);
        $this->nif = $nif;
    }
    public function calcularSueldo($numHoras, $importeHora = 16){
        return $numHoras * $importeHora;
    }
}
/**A  clase  Profesor  ten  un  método  calcularSoldo  que  calcula  o  que  cobran  
 * os  profesores dependendo  do  número  de  clases  que  imparten  ao  mes.  Recibe 
 *  como  parámetros  o número de horas e o importe de cada hora, que está establecido
 *  en 16 euros pero podería variar. */

