<?php

    $civ = $row['id'];
    $image = '"../img/greece.png"';

    switch ($civ) {
        case 0:
            $image = '"../img/greece.png"';
            break;
        case 1:
            $image = '"../img/egypt.png"';
            break;
        case 2:
            $image = '"../img/assyrians.png"';
            break;
    }
?>