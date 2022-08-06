<?php

    $base = "";

    $password_hash = password_hash($base, PASSWORD_DEFAULT);

    echo $password_hash;

?>