<?php
        function crearIp($tipo){
            switch ($tipo) {
                case "A":
                    $ip = "10";
                    for ($i = 0; $i < 3; $i++) {
                        $ip .= "." . rand(0, 255);
                    }
                    break;
                case "B":
                    $ip = "172";
                    $ip .= "." . rand(16, 31);
                    $ip .= "." . rand(0, 255);
                    $ip .= "." . rand(0, 255);
                    break;
                case "C":
                    $ip = "192.168";
                    $ip .= "." . rand(0, 255);
                    $ip .= "." . rand(0, 255);
                    break;
            }

            return $ip;
        }

        ?>