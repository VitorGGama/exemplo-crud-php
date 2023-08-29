<?php

function formatarPrecos( float $valor):string {
    $valorFormatado = number_format($valor,2,",",".");
    return "R$ " .$valorFormatado;
    }    
?>
