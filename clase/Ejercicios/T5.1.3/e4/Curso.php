<?php

class Curso
{
    private $id;
    private $nombre;
    private $horas;
    private $fechaInicio;

    public function __construct($id, $nombre, $horas, $fechaInicio)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->horas = $horas;
        $this->fechaInicio = $fechaInicio;
    }

        /**
     * Get the value of nombre
     */ 
    public function getNombre()  {
        return $this->nombre;
    }

    /**
     * Get the value of id
     */ 
    public function getId() {
        return $this->id;
    }

    /**
     * Get the value of horas
     */ 
    public function getHoras() {
        return $this->horas;
    }

    /**
     * Get the value of fechaInicio
     */ 
    public function getFechaInicio() {
        //Formatear la fecha a dd/mm/yyyy
        return date('d/m/Y', strtotime($this->fechaInicio));
        // Otra forma de formatear la fecha:
            // return date('Y-m-d', strtotime($this->fechaInicio)); //Esta forma ya es la que teníamos antes.

    }
    
    /**
     * Método que retorna un array con los cursos
     */
    public static function leerCursos()
    {       
        require_once 'datos.php';
        print_r($cursos);
        $listaCursos = $cursos ?? array(); // Si $cursos no está definido, se utiliza un array vacío      
         echo "lista de cursos original"; print_r($listaCursos);  
        $objetosCurso = array();
        
         
        foreach ($listaCursos as $curso => $datosCurso) {
            $objetosCurso[] = new Curso($datosCurso['id'], $datosCurso['nombre'], $datosCurso['horas'], $datosCurso['fecha_inicio']);
        }     
        return $objetosCurso;
    }
    
    public static function filtrarCursos(Curso $curso, $nombre, $horas_min, $fecha_inicio) {
    $incluir = false;
    var_dump($curso); var_dump($nombre);
    //El curso se añade si se cumplen las tres condiciones o si no hay filtro establecido para alguna de ellas (consideramos que se cumple).
    //Buscamos si la cadena de filtro está en el nombre del curso, si no, devuelve false. Tenemos que comprobar que sea exactamente distinto de false, porque puede que stripos nos devolviese 0 si el dato a buscar está en la primera posición del nombre.
    if(($nombre==""|| stripos($curso->getNombre(), $nombre) !== false) && ($horas_min=="" || $curso->getHoras() > $horas_min) && ($fecha_inicio=="" || $curso->fechaInicio > $fecha_inicio) ){
        
        $incluir = true;       
                           
    }
    return $incluir; 
    
}
}