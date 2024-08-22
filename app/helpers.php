<?php

    if (! function_exists('short_number')) {

        function short_number($number) {

            if ($number >= 1000) {

                $number = $number /1000;

                return $number == intval($number) ? intval($number).'k' : number_format($number, 1, '.', '').'k';

            } elseif ($number >= 1000000) {

                $number = $number /1000000;

                return $number == intval($number) ? intval($number).'k' : number_format($number, 1, '.', '').'k';

            }




            return $number == intval($number) ? intval($number) : $number;

        }

    }




    function isMobile($userAgent) {

        // Lista de agentes de usuario típicos de dispositivos móviles

        $mobileAgents = ['Mobile', 'Android', 'Silk/', 'Kindle', 'BlackBerry', 'Opera Mini', 'Opera Mobi', 'iPhone', 'iPad', 'iPod'];




        foreach ($mobileAgents as $agent) {

            if (stripos($userAgent, $agent) !== false) {

                return true;

            }

        }




        return false;

    }
