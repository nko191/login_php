<?php
function clear($texto)
{
    $limpio = strip_tags($texto);
    $limpio = htmlspecialchars($limpio);
    $limpio = stripslashes($limpio);
    return $limpio;
}
?>