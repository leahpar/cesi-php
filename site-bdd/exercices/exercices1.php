<h1>Exercice 1</h1>

<h2>1.1</h2>

<?php
function somme($x, $y) {
    return $x + $y;
}
echo "somme(1, 1) = " . somme(1, 1);
echo "<br>";
echo "somme(0, 0) = " . somme(0, 0);
echo "<br>";

function produit($x, $y) {
    return $x * $y;
}
echo "produit(0, 0) = " . produit(0, 0);
echo "<br>";
echo "produit(0, 1) = " . produit(0, 1);
echo "<br>";
echo "produit(2, 2) = " . produit(2, 2);
echo "<br>";


function pythagore($a, $b) {
    $c2 = $a*$a + $b*$b;
    $c2 = $a**2 + $b**2;
    $c = sqrt($c2);
    return $c;
}

echo "pythagore(2, 3) = " . pythagore(2, 3);
echo "<br>";
echo "pythagore(5, 10) = " . pythagore(5, 10);
echo "<br>";
?>

<h2>1.2</h2>

<?php
function minimum($x, $y) {
    if ($x < $y) {
        $resultat = $x;
    }
    else { // $x >= $y
        $resultat = $y;
    }
    return $resultat;
}
echo "minimum(1, 2) = " . minimum(1, 2);
echo "<br>";
echo "minimum(42, 2) = " . minimum(42, 2);
echo "<br>";


function maximum($x, $y) {
    if ($x > $y) {
        $resultat = $x;
    }
    else { // $x <= $y
        $resultat = $y;
    }
    return $resultat;
}
echo "maximum(1, 2) = " . maximum(1, 2);
echo "<br>";
echo "maximum(42, 2) = " . maximum(42, 2);
echo "<br>";

?>

<h2>1.3</h2>

<?php

// ex: factorielle(12) = 12*11*10*9*8*7*6*5*4*3*2*1 = 479 001 600
function factorielle($x) {
    $total = 1;
    while ($x >= 1) {
        $total = $total * $x; // $total *= $x;
        $x = $x - 1;          // $x--;
    }
    return $total;
}

function factorielle2($x) {
    for($total=1; $x>=1; $x--) {
        $total *= $x;
    }
    return $total;
}

function factorielle3($x) {
    if ($x == 1) {
        return 1;
    }
    return $x * factorielle3($x - 1);
}

echo "factorielle(1) = " . factorielle(1);
echo "<br>";
echo "factorielle(3) = " . factorielle(3);
echo "<br>";
echo "factorielle(12) = " . factorielle(12);
echo "<br>";


// $x**$y = $x * $x * .... $x
function puissance($a, $n) {
    $r = 1;
    for ($i=0; $i<$n; $i++) {
        $r = $r * $a; // $r *= $a;
    }
    return $r;
}

function puissance2($a, $n) {
    if ($n == 1) {
        return $a;
    }
    return $a * puissance2($a, $n-1);
}

echo "puissance(2, 2) = " . puissance(2, 2);
echo "<br>";
echo "puissance(2, 3) = " . puissance(2, 3);
echo "<br>";
echo "puissance(3, 3) = " . puissance(3, 3);
echo "<br>";


?>

<h2>1.4</h2>

<?php
function minimum2(...$nombres) {
    $min = $nombres[0];
    for ($i=0; $i<count($nombres); $i++) {
        if ($nombres[$i] < $min) {
            $min = $nombres[$i];
        }
    }
    return $min;
}

function minimum3(...$nombres) {
    $min = $nombres[0];
    foreach ($nombres as $n) {
        if ($n < $min) {
            $min = $n;
        }
    }
    return $min;
}

function minimum4(...$nombres) {

    if (count($nombres) == 1) {
        return $nombres[0];
    }

    $min1 = array_pop($nombres); // Enlève le dernier élément du tableau
    $min2 = minimum4(...$nombres); // minimum($nombres[0], $nombres[1], $nombres[2]...)

    if ($min1 < $min2) {
        $minimum = $min1;
    }
    else {
        $minimum = $min2;
    }
    //$minimum = ($min1 < $min2) ? $min1 : $min2;
    return $minimum;
}

echo "minimum2(1, 2) = " . minimum2(1, 2);
echo "<br>";
echo "minimum2(42, 42, 3) = " . minimum2(42, 42, 3);
echo "<br>";


function moyenne2(...$nombres) {
    $somme = 0;
    $cpt = 0;
    foreach ($nombres as $n) {
        $somme += $n; // $somme = $somme + $n;
        $cpt++;       // $cpt = $cpt + 1;
    }
    return $somme / $cpt;
}

echo "moyenne2(1, 2) = " . moyenne2(1, 2);
echo "<br>";
echo "moyenne2(42, 42, 3) = " . moyenne2(42, 42, 3);
echo "<br>";

?>

<h2>1.5</h2>

<?php

function isPremier($x) {
    if ($x == 1) {
        return true;
    }
    if ($x == 0) {
        return true;
    }
    if ($x < 0) {
        $x = -$x;
    }
    for ($i=2; $i<$x; $i++) {
        if (($x % $i) == 0) {
            return false;
        }
    }
    return true;
}

function nombresPremiers($a, $b) {

    if ($a > $b) {
        $tmp = $a;
        $a = $b;
        $b = $tmp;
    }

    $resultat = [];
    for ($i=$a; $i<=$b; $i++) {
        if (isPremier($i)) {
            $resultat[] = $i;
        }
    }
    return $resultat;
}

echo "nombres premiers : ";
echo "<pre>";
print_r(nombresPremiers(-15, 15));
echo "</pre>";

$str = implode(', ', nombresPremiers(1, 40));
echo $str;
?>

<h2>Fin</h2>
