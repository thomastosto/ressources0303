<?php
include 'citations.php';

if(isset($_POST['numero']))
    $numero = intval($_POST['numero']) % count(CITATIONS);
else
    $numero = rand(0, count(CITATIONS) - 1);
echo CITATIONS[$numero];