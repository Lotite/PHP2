<?php 
    function incForm($marMod, $nKm, $urlFab, $com, $eqEx){?> 
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <p>Marca e modelo: <input type="text" name="marMod" value="<?php echo $marMod;?>" /></p> 
        <p>Nº km: <input type="text" name="nKm" value="<?php echo $nKm;?>"/></p>
        <p>URL do fabricante:<input type="text" name="urlFab" value="<?php echo $urlFab;?>"/></p>
        <p>Combustible: <input type="radio" name="com" value="Diesel" <?php if ($com=="Diesel") echo "checked"?>/> Diesel 
         <input type="radio" name="com" value="Gasolina" <?php if ($com=="Gasolina") echo "checked"?>/> Gasolina 
         <input type="radio" name="com" value="Eléctrico/Híbrido" <?php if ($com=="Eléctrico/Híbirdo") echo "checked"?>/> Eléctrico/Híbrido
        </p>
        <!-- in_array comprueba si el elemento está en el array, si está lo marcamos como seleccionado -->
        <p>Equipamento extra:<select name="eqEx[]" size="3" multiple="multiple">
          <option <?php if (in_array("Pintura metalizada", $eqEx)){echo "selected=\"selected\"";}?>>Pintura metalizada</option>
          <option <?php if (in_array("Sistema de navegación", $eqEx)){echo "selected=\"selected\"";}?>>Sistema de navegación</option>
          <option <?php if (in_array("Reposabrazos central delanteiro", $eqEx)){echo "selected=\"selected\"";}?>>Reposabrazos central delanteiro</option>
        </select></p>
        <p><input type="reset" value="Borrar"/> <input type="submit" value="Enviar" /></p>
    </form>        
<?php        
    }    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
        <title></title>
    </head>
    <body> 
        
<!-- Si el $_POST está vacío, mostramos el formulario por primera vez, vacío.
     Si no está vacío, válidamos cada campo y construimos una cadena con los errores.
        - Si hay errores volvemos a mostrar el formulario y la cadena de error.
        - Si no hay errores mostramos que se ha enviado correctamente y los valores.
-->
<?php
    if (count($_POST)==0)+
        incForm("", "", "", "", array());
    else{
        $cadeaErros="";
        $marMod= htmlspecialchars(trim(strip_tags($_POST["marMod"])), ENT_QUOTES, "ISO-8859-1");
        if ($marMod=="")
            $cadeaErros.= "O campo Marca e modelo non pode estar valerio. ";
        
        $nKm= htmlspecialchars(trim(strip_tags($_POST["nKm"])), ENT_QUOTES, "ISO-8859-1");
        if ($nKm=="")
            $cadeaErros.= "O campo Nº km non pode estar baleiro. ";
        else
        if (filter_var($nKm, FILTER_VALIDATE_INT)){
            if ((int)$nKm<=0)
                $cadeaErros.= "O Nº km deber ser maior que 0. ";
        }  else {
            $cadeaErros.= "O Nº km non é un número enterio. ";
        }
        
        $urlFab= htmlspecialchars(trim(strip_tags($_POST["urlFab"])), ENT_QUOTES, "ISO-8859-1");
        if ($urlFab == "")
            $cadeaErros.= "O campo URL do fabricante non pode estar baleiro. ";
         else{           
            if (!filter_var($urlFab, FILTER_VALIDATE_URL))            
                $cadeaErros.= "A URL do fabricante especificada non é válida.";         
         }         
        
         // Si existe com recuperamos el valor y en caso contrario ""
        $mod=(isset($_POST["com"]))
        ? $_POST["com"]
        : ""; 
        
         // Si existen extras los recuperamos el valor y en caso contrario pasamos un array vacio.
        $eqEx=(isset($_POST["eqEx"]))
        ? $_POST["eqEx"]
        : array();        
        
        //Si hay errores, cargar el formulario y un mensaje con los errores al final.
        //Si no hay errores, visualizamos los datos que ha introducido. 
        //En este caso se visualizan los datos para que los corrija, podemos ponerlos también en blanco.
        if ($cadeaErros != ""){
            incForm($marMod,$nKm, $urlFab, $mod, $eqEx);
            echo "<strong><em>$cadeaErros</em></strong>";
        }else{
            echo "<p>O formulario encheuse correctamente. Os datos recibidos son:</p>";        
            echo "<p>Marca e modelo: ".$_POST["marMod"]."</p>";
            echo "<p>Nº km: ".$_POST["nKm"]."</p>";
            echo "<p>URL do fabricante: ".$_POST["urlFab"]."</p>";
            echo "<p>Combustible: ".$mod."</p>";
            
	    /*if ($mod==""){
                echo "<p>Combustible: No se ha especificado</p>";
            }
            else {
                echo "<p>Combustible: ".$_POST["com"]."</p>";
            }*/
            
            echo "<p>Equipamento extra: ";
            for ($i=0; $i<count($_POST["eqEx"]); $i++){
                echo $_POST["eqEx"][$i]; 
                if ($i==(count($_POST["eqEx"])-1)) // Si es el úlimo elemento ponemos un punto en caso contrario una coma.
                                                   // El código funciona pero no es muy eficiente. ¿Cómo lo pondrías?     
                    echo ".";
                else
                    echo ", ";
            }
            echo "</p>";                    
        }
    }
?>       
    </body>
</html>





