<?php


function timeFormat($fechaInicio,$fechaFin)
{
    $fecha1 = new DateTime($fechaInicio);
    $fecha2 = new DateTime($fechaFin);
    $fecha = $fecha1->diff($fecha2);
    $tiempo = "";



    //años
    if($fecha->y > 0)
    {
        $tiempo .= $fecha->y;

        if($fecha->y == 1)
            $tiempo .= " year ";
        else
            $tiempo .= " years ";

    return $tiempo;
    }

    //meses
    if($fecha->m > 0)
    {
        $tiempo .= $fecha->m;

        if($fecha->m == 1)
            $tiempo .= " month ";
        else
            $tiempo .= " months ";

     return $tiempo;
    }

    //dias
    if($fecha->d > 0)
    {
        $tiempo .= $fecha->d;

        if($fecha->d == 1)
            $tiempo .= " day ";
        else
            $tiempo .= " days ";
     return $tiempo;
    }

    //horas
    if($fecha->h > 0)
    {
        $tiempo .= $fecha->h;

        if($fecha->h == 1)
            $tiempo .= " hour ";
        else
            $tiempo .= " hours ";
     return $tiempo;
    }

    //minutos
    if($fecha->i > 0)
    {
        $tiempo .= $fecha->i;

        if($fecha->i == 1)
            $tiempo .= " minute";
        else
            $tiempo .= " minutes";
    }
    else if($fecha->i == 0) //segundos
        $tiempo .= $fecha->s." seconds";

    return $tiempo;
}

