<?php

$zodiaco = [
    'Aries', 
    'Tauro', 
    'Géminis', 
    'Cáncer', 
    'Leo', 
    'Virgo', 
    'Libra', 
    'Escorpio', 
    'Sagitario',
    'Capricornio',
    'Acuario',
    'Piscis'
];

$zodiaco = array_splice($zodiaco, 10, 5);

foreach($zodiaco as $z)
{
    echo $z . '<br>';
}

?>