<?php
/*
  1. ¿Como llevamos la cuenta del id? Por el número de objetos creados, a través de un atributo estático.
  2. Gestionar todos los objetos de tipo Busqueda, en un array estático.
*/
class Busqueda {
    
    private $id;
    private $fnombre;
    private $fhoras;
    private $ffecha;
    private static $contador = 0;
    private static $busquedas = array();

    public function __construct($fnombre, $fhoras, $ffecha){
        $this->id = ++self::$contador; //Incremento el contador antes de usarlo
        $this->fnombre = $fnombre;
        $this->fhoras = $fhoras;
        $this->ffecha = $ffecha;
        self::$busquedas[] = $this; //Añadimos la instancia actual al array de búsquedas   
    }
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }
    
    

    /**
     * Get the value of ffecha
     */ 
    public function getFfecha()
    {
        return $this->ffecha;
    }

        /**
     * Set the value of ffecha
     *
     * @return  self
     */ 
    public function setFfecha($ffecha)
    {
        $this->ffecha = $ffecha;

        return $this;
    }

    /**
     * Get the value of fnombre
     */ 
    public function getFnombre()
    {
        return $this->fnombre;
    }

    /**
     * Set the value of fnombre
     *
     * @return  self
     */ 
    public function setFnombre($fnombre)
    {
        $this->fnombre = $fnombre;

        return $this;
    }


    /**
     * Get the value of fhoras
     */ 
    public function getFhoras()
    {
        return $this->fhoras;
    }



    /**
     * Set the value of fhoras
     *
     * @return  self
     */ 
    public function setFhoras($fhoras)
    {
        $this->fhoras = $fhoras;

        return $this;
    }

    public static function setBusquedas($busquedas){
        self::$busquedas = array_map("unserialize", $busquedas);
    }

    
    public static function recuperarBusquedas(){  //getBusquedas()
       // print_r(self::$busquedas);
        return self::$busquedas;
        
    }
    public static function getContador(){
        return self::$contador;
    }
    public static function setContador($contador){
        self::$contador = $contador;
    }
}
