<?php
require_once __DIR__ . '/Calculatrice.php';
echo "programme principale";
$calculatrice = new Calculatrice();
$res = $calculatrice -> additionner(1, 2);
echo "résultat = $res";
