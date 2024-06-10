<?php
include 'citations.php';

if(isset($_GET['numero']))
    $numero = intval($_GET['numero']) % count(CITATIONS);
else
    $numero = rand(0, count(CITATIONS) - 1);
echo CITATIONS[$numero];