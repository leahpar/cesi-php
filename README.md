
INFAL156-PHP et MySQL - Raphaël Bacco

# PHP

Documentation PHP :
https://www.php.net/docs.php

Cours :
https://github.com/leahpar/cesi-php


## Installation

- PHP
- Serveur web (Apache / Nginx)
- Base de données (MySQL / MariaDB / PostgreSQL / SQLite)
- PhpMyAdmin ou autre

Bundles :

- XAMPP : https://www.apachefriends.org/
- WAMP : https://www.wampserver.com/
- MAMP : https://www.mamp.info/ ✅

> 💡Ajouter `error_reporting = E_ALL` dans le `php.ini` pour afficher un message d'erreur explicite en cas d'erreur.


## PHP - Les bases

### Syntaxe

`fichier.php`

```php
<!-- ici du code html -->
<?php
// Ici du code PHP
?>
<!-- ici du code html -->
<?php
/*
Ici du code PHP
*/
?>
<!-- ici du code html -->
```

**Afficher quelque chose** :  `echo`

```php
echo "Hello World!";        // Affiche "Hello World!"
```

**Variables** : `$var`

```php
$ma_variable = "Hello world!";
echo $ma_variable;          // Affiche "Hello World!"
```
> ⚠️ Attention à la casse, pas d'espaces, pas d'accent, pas de caractères spéciaux !

```php
✅ $ma_variable
✅ $superVariable
✅ $supervariable         // ⚠️ Différent de $superVariable
⚠️ $SuperVariable         // Pas de majuscule en début (par convention)
❌ $ma-variable           // Pas de tiret
❌ $ma variable           // Pas d'espace
❌ $prénom                // Pas d'accent
✅ $maVariable2
❌ $2maVariable           // Pas de chiffre en début
```

**Types de variables**

```php
$a = 42;                    // int
$a = 4.2;                   // float
$a = "42";                  // string
$a = true;                  // boolean
$a = false;
$a = null;                  // NULL
$a = [...];                 // array
$a = new Object();          // object
```

** Opérations mathématiques**

```php
$a = 40 + 2;                // 42 (int)

$a = 4 / 2;                 // 2 (int)
$a = 4 / 3;                 // 1.333333 (float)
```

** Opérations sur les chaines**

```php
$a = "Hello" . "world!";         // "Helloworld!" (string)

$world = "world";
$a = "Hello " . $world . "!";    // "Hello world!"

$annee = 2022;
$a = "Nous sommes en " . $annee; // "Nous sommes en 2022"
```

** Opérations logiques**

```php
$a = true;
$b = false;

$c = ! $a;                     // false
$c = ($a || $b);               // true OR  false       = true
$c = ($a && $b);               // true AND false       = false
```

```php
$a = 42;
$b = 21;

$c = ($a == $b);               // false
$c = ($a != $b);               // true
$c = ($a >  $b);               // true
$c = ($a >= $b);               // true
$c = ($a <  $b);               // false
$c = ($a <= $b);               // false
```

> ⚠️ `$a = $b` (affectation) VS `$a == $b` (comparaison)
```php
$c = ($a = $b);                // a = b = c = 21
```


**Comparaison VS comparaison stricte** :

`==` et `!=` comparent les valeurs, `===` et `!==` comparent les valeurs et les types.

```php
$a = 42;
$b = "42";
$c = 42.0;

$a == $b;         // true
$a == $c;         // true
$b != $c;         // false
$a === $b;        // false
$a === $c;        // false
$b !== $c;        // true
```

**conversion implicite**

```php
 40  +  2             // 42
 40  +  2.0           // 42.0
 40  + "2"            // 42
"40" + "2"            // 42
"40" . "2"            // "402"
 40  . "2"            // "402"
 40  .  2             // "402"
```

**Booléens** : tout est vrai, "rien" est faux

```php
0    == false           // true
""   == false           // true
[]   == false           // true
null == false           // true
```
```php
0    === false          // false
""   === false          // false
[]   === false          // false
null === false          // false
```
Ne pas abuser des conversions implicites :
```php
0    == ""          // false
""   == []          // false
[]   == null        // true
0    == null        // true
""   == null        // true
"0"  == null        // false
// ...
```
> `strlen($str)`, `count($array)`...

### Tableaux

Indices implicites :
```php
$prenoms = ["Pierre", "Paul", "Jacques"];
```
```php
$prenoms = [
    "Pierre",
    "Paul",
    "Jacques",
];
```

Indices explicites :
```php
$prenoms[0] = "Pierre";
$prenoms[2] = "Jacques";
$prenoms[1] = "Paul";
```

Ajout à la suite :
```php
$prenoms = [];
$prenoms[] = "Pierre";
$prenoms[] = "Paul";
$prenoms[] = "Jacques";
```


> 💡Afficher un tableau : impossible avec `echo`, utiliser  `print_r()`, `var_dump()`

```php
echo $prenoms;
// PHP Warning:  Array to string conversion

print_r($prenoms);
/*
Array
(
    [0] => Pierre
    [1] => Paul
    [2] => Jacques
)
*/

var_dump($prenoms);
/*
array(3) {
  [0] => string(6) "Pierre"
  [1] => string(4) "Paul"
  [2] => string(7) "Jacques"
}
*/
```

**Tableaux associatifs**

```php
$age["Pierre"] = 42;
$age["Paul"] = 51;
```

```php
$age = [
    "Pierre" => 42,
    "Paul" => 51,
];
```

```php
echo $age["Pierre"];        // 42
echo $age[$prenoms[0]];     // 42
```

**Tableaux multidimensionnels**

```php
$participants = [
    "Pierre"  => ["prenom" => "Pierre", "age" => 42],
    "Paul"    => ["prenom" => "Paul",   "age" => 51],
    "Jacques" => ["prenom" => "Jacques"],
];
```

```php
echo $participants["Pierre"]["age"];         // 42
echo $participants["Paul"]["prenom"];        // Paul
echo $participants["Jacques"]["age"];        // PHP Warning:  Undefined array key "age"
```


### Fonctions

Pour découper le code, pour pouvoir réutiliser des bouts de codes.

#### Fonctions internes PHP

```php
echo($str);                 // Affiche quelque chose

count($array);              // Retourne la taille d'un tableau

min($a, $b);                // Retourne le minimum entre $a et $b

sqrt(144);                  // Retourne la racine carrée de 144

strlen($str);               // Retourne la taille d'une chaine

$txt = "J'aime les pommes";
str_replace("pomme", "poire", $txt); // Retourne "J'aime les poires"

$fruits = ["pommes", "poires", "abricots"];
implode("/", $fruits);      // Retourne "pommes/poires/abricots"

// ...
```

#### Fonctions utilisateur

**Fonction qui ne retourne rien**

```php
function hello($nom) {
    echo "Hello " . $nom . " !";
}

hello("world");       // Affiche "Hello world !"
hello("Julie");       // Affiche "Hello Julie !"
```

**Fonction qui retourne quelque chose**

```php
function somme($a, $b) {
    $somme = $a + $b;
    return $somme;
}

echo somme(20, 22);            // Affiche "42"
```

**Paramètres facultatifs**

```php
function somme($a, $b, $c=0, $d=0) {
    return $a + $b + $c + $d;
}
echo somme(20, 22);                // Affiche "42"
echo somme(20, 22, 10);            // Affiche "52"
echo somme(20, 22, 10, 12);        // Affiche "64"
```

**Bonus: typage explicite**

```php
function somme(int $a, int $b): int {
    return $a + $b;
}
```
Paramètres convertis si possible :
```php
echo somme(1, 2);        // 3
echo somme(1, "2");      // 3
echo somme(1, 2.1);      // 3
```

Erreur si pas possible :
```php
echo somme(1, null);
// PHP Warning:  Uncaught TypeError: somme(): Argument #2 ($b) must be of type int, null given
```

**Bonus : fonction à nombre d'arguments variables**

```php
function somme(...$nombres) {
    return $nombres[0] + $nombres[1] + $nombres[2] + ...;
}
somme(42);               // $nombres = [42]
somme(40, 2);            // $nombres = [40, 2]
somme(40, 2, 12);        // $nombres = [40, 2, 12]
```

**Bonus : fonction variable et fonction anonyme**

```php
// Fonction "normale"
function somme($a, $b) {
    return $a + $b;
}

// fonction variable 
$f = 'somme';
echo $f;                    // "somme"
echo $f(20, 22);            // 42
```
```php
// Fonction anonyme
$f = function($a, $b) {
    return $a + $b;
};    // Ne pas oublier le ';' ici

echo $f(20, 22);            // 42
```
```php
// Fonction anonyme (notation simplifiée)
$f = fn($a, $b) => $a + $b;

echo $f(20, 22);            // 42
```


### Structure conditionnelle

Pour exécuter ou non du code suivant des conditions.

#### IF

```php
if (CONDITION 1) {
    INSTRUCTIONS;
}
else if (CONDITION 2) {
    INSTRUCTIONS;
}
else if (CONDITION 3) {
    INSTRUCTIONS;
}
else {
    INSTRUCTIONS;
}
```

```php
$age_pierre = 16;
$age_paul = 33;
$bar_ouvert = true;

if ($age_pierre >= 18 && $age_paul >= 18) {
    $autorisation = true;
}
else {
    $autorisation = false;
}

if ($autorisation == true && $bar_ouvert == true) {
    echo "Bienvenue !";
}
else if ($autorisation == false && $bar_ouvert == true) {
    echo "Désolé vous restez dehors...";
}
else if ($bar_ouvert == false) {
    echo "On est fermé, revenez demain.";
}

// Affiche "Désolé vous restez dehors..."
```

#### SWITCH

```php
switch (VARIABLE) {       // et pas CONDITION
    case VALEUR 1:
        INSTRUCTIONS;
        break;
    case VALEUR 2:
    case VALEUR 3:
        INSTRUCTIONS;
        break;
    default:
        INSTRUCTIONS;
        break;
}
```

```php
$couleur = "bleu";

switch ($couleur) {
    case "bleu":
        echo "La voiture est bleue";
        break;
    case "rouge":
        echo "La voiture est rouge";
        break;
    case "vert":
    case "emeraude":
    case "avocat":
    case "olive":
        echo "La voiture est verte";
        break;
    default:
        echo "On ne sait pas de quelle couleur est la voiture";
        break;
}
```

### Boucles

Pour exécuter plusieurs fois le même code.

#### WHILE

Boucle à condition d'arrêt *à priori* inconnue

```php
while (CONDITION) {
    // code exécuté tant que CONDITION == true
}
```

```php
$i = 0;
while ($i < 10) {
    echo $i;
    $i = $i + 1;
}
// Affiche: 0 1 2 3 4 5 6 7 8 9
```

> ⚠️ Attention aux boucles infinies si la condition est toujours vraie !

```php
$erreur = false;
while ($erreur == false) {
    // ... 
    $erreur = fonction_qui_verifie_quelque_chose();
}
```

```php
decoller_fusee();
while (!lune_atteinte()) {
    avancer_fusee();
}
alunir_fusee();
```

#### FOR

Boucle à condition d'arrêt *à priori* connue

```php
for (INSTRUCTION 1 ; CONDITION ; INSTRUCTION 2) {
    // code exécuté tant que CONDITION == true
}
```

Equivalent avec un `while` :
```php
INSTRUCTION 1;
while (CONDITION) {
    // ...
    INSTRUCTION 2;
}
```

```php
for ($i=0; $i<10; $i++) {
    // $i = 0, 1, 2...
    echo $i;
}
// Affiche: 0 1 2 3 4 5 6 7 8 9
```

```php
for ($i=10; $i>0; $i--) {
    // $i = 10, 9, 8...
    echo $i;
}
// Affiche: 10 9 8 7 6 5 4 3 2 1
```

```php
$alphabet = ['a', 'b', 'c'... 'z' ];
// NB: count($alphabet) = 26
// NB: $alphabet[0] = a;
// NB: $alphabet[25] = z
for ($i=0; $i<count($alphabet); $i++) {
    // $i = 0, 1, 2...
    echo "La ".($i+1)."e lettre de l'alphabet est " . $alphabet[$i];
}
// La 1e lettre de l'alphabet est a
// La 2e lettre de l'alphabet est b
// La 3e lettre de l'alphabet est c
// ...
// La 26e lettre de l'alphabet est z
```

#### FOREACH

Boucle de parcours d'un tableau

```php
foreach (TABLEAU as VALEUR) {
    // code exécuté pour chaque VALEUR de TABLEAU
}
```

```php
$alphabet = ['a', 'b', 'c'... 'z' ];
foreach ($alphabet as $lettre) {
    // $lettre = a, b, c...
    echo $lettre;
}
// Affiche: a b c d e... z
```

```php
$alphabet = ['a', 'b', 'c'... 'z' ];
foreach ($alphabet as $cle => $lettre) {
    // cle = 0, 1, 2...
    // $lettre = a, b, c...
    echo "La ".($cle+1)."e lettre de l'alphabet est " . $lettre;
}
// La 1e lettre de l'alphabet est a
// La 2e lettre de l'alphabet est b
// La 3e lettre de l'alphabet est c
// ...
// La 26e lettre de l'alphabet est z
```

```php
$participants = [
    "Pierre"  => [ "ville" => "Rouen", "age" => 42 ],
    "Paul"    => [ "ville" => "Paris", "age" => 51 ],
    "Jacques" => [ "ville" => "Saint-Pierre-et-Miquelon", "age" => 33 ],
];
foreach ($participants as $prenom => $data) {
    echo $prenom . " a " . $data['age'] . " ans et habite à " . $data['ville']; 
}
// Pierre a 42 ans et habite à Rouen
// Paul a 51 ans et habite à Paris
// Jacques a 33 ans et habite à Saint-Pierre-et-Miquelon
```

### Lisibilité = Qualité = Maintenabilité !

Code fonctionnel mais illisible :

```php
$tmp = 384400;
while ($tmp > 0) {
    echo $tmp . " km restants";
    fonction1();
    $a = toto();
    $tmp = $a;
}
```

Le même code lisible :

```php
// Décollage sur Terre, distance à la lune = 384000 km
$distance_lune = 384000;

while ($distance_lune > 0) {
    // Tant qu'on n'a pas atteint la Lune...
    
    echo $distance_lune . " km restants";

    // On avance la fusée
    avance_fusee();

    // On calcule la nouvelle distance
    $distance_lune = calcul_nouvelle_distance();
}
```

### Erreurs courantes

Erreur de syntaxe : manque un `;`, une parenthèse, une accolade... (L'erreur est en réalité souvent un peu avant la ligne indiquée)

```php
$a = 42
echo $a;
// Parse error: syntax error, unexpected token "echo" in /var/www/cesi/php/toto.php on line 2
```

```php
function somme($a, $b)
    return $a + $b;
}
// Parse error: syntax error, unexpected token "return", expecting "{" in /var/www/cesi/php/toto.php on line 3
```

```php
if (true) {
    echo "true";
// Parse error: syntax error, unexpected end of file in /var/www/cesi/php/toto.php on line 3
// Parse error:  Unclosed '{' on line 1 in /home/raphael/projets/cesi/php/toto.php on line 3
```


Utilisation d'une variable qui n'existe pas encore

```php
echo $a;
// Warning: Undefined variable $a in /var/www/cesi/php/toto.php on line 1
```

Utilisation d'une clé qui n'existe pas dans un tableau

```php
$a = [42];
echo $a[1];
// Warning: Undefined array key 1 in /var/www/cesi/php/toto.php on line 2
```

Appel à une fonction inconnue

```php
function somme($a, $b) {
    return $a + $b;
}
echo some(40, 2);
// Fatal error: Uncaught Error: Call to undefined function some() in /var/www/cesi/php/toto.php:4
```

Mauvais nombre de paramètres

```php
function somme($a, $b, $c) {
    return $a + $b + $c;
}
echo somme(40, 2);
// Fatal error: Uncaught ArgumentCountError: Too few arguments to function somme(), 2 passed in /var/www/cesi/php/toto.php on line 4 and exactly 3 expected in /var/www/cesi/php/toto.php:1
```

Mauvais type de paramètre

```php
function somme(int $a, int $b) {
    return $a + $b;
}
echo some(40, [2]);
//  Fatal error: Uncaught TypeError: somme(): Argument #2 ($b) must be of type int, array given, called in /var/www/cesi/php/toto.php on line 4 and defined in /var/www/cesi/php/toto.php:1
```

Affichage d'un type non affichable

```php
$a = ["42"];
echo $a;
// Warning: Array to string conversion in /var/www/cesi/php/toto.php on line 2
```


### Exercices

**1.1** Ecrire les fonctions `somme($x, $y)`, `produit($x, $y)`, `pythagore($a, $b)`

**1.2** Ecrire les fonctions `minimum($x, $y)`, `maximum($x, $y)`.

**1.3** Ecrire les fonctions `factorielle($x)`, `puissance($x, $y)`.

**1.4** Ecrire les fonctions `minimum2(...$nombres)`, `maximum2(...$nombres)`, `moyenne2(...$nombres)`.

**1.5** Ecrire une fonction qui retourne la liste des nombres premiers entre 2 nombres en paramètres.

Bonus :
- Gérer les cas particuliers (0 et 1)
- Gérer les nombres négatifs
- Gérer les paramètres dans le désordre

**1.6** Ecrire une fonction qui retourne le N-ième nombre de la suite de Fibonacci (fonction récursive).
`0`, `1`, `1`, `2`, `3`, `5`, `8`, `13`...

**1.7** Ecrire une fonction qui retourne la liste des N premiers éléments de la suite de Conway (opérations sur les strings).
`1`, `11`, `21`, `1211`, `111221`...

**1.8** Ecrire des fonctions de tri qui prennent en paramètre un tableau de nombres à trier :
- tri bulle (https://fr.wikipedia.org/wiki/Tri_%C3%A0_bulles)
- tri par insertion (https://fr.wikipedia.org/wiki/Tri_par_insertion)

Bonus : Ecrire une fonction de tri générique qui prend en paramètre un tableau à trier et le nom de l'algorithme à utiliser. ex:`tri([42, 321, 22, 6, 1], "bulle")`.


## programmation fonctionnelle

Juste pour se faire des noeuds au cerveau ! (Mais quand même pratique pour des traitements sur des tableaux).

> Les fonctions peuvent être passées en tant qu’argument à d’autres fonctions et une fonction peut retourner une autre fonction.

### `array_map($fonction, $tableau)`

Parcours un tableau et retourne un nouveau tableau en appliquant une fonction sur chaque éléments.

```php
$tableau = [1, 2, 3, 4];
```

```php
function plus1($a) {
    return $a + 1;
}
$resultat = array_map('plus1', $tableau);
print_r($resultat);
/*
Array
(
    [0] => 2
    [1] => 3
    [2] => 4
    [3] => 5
)
*/
```
```php
$f = fn($a) => $a + 1;
$resultat = array_map($f, $tableau);
print_r($resultat);
```
```php
$resultat = array_map(fn($a) => $a + 1, $tableau);
print_r($resultat);
```

### `array_filter($tableau, $fonction)`

Parcours un tableau et retourne un nouveau tableau en filtrant les éléments avec une fonction.

> ⚠️ Attention à l'ordre des paramètres !

```php
$tableau = [1, 2, 3, 4];
```

```php
function isPair($a) {
    if ($a%2 == 0) {
        return true;
    }
    else {
        return false;
    }
}
$resultat = array_filter($tableau, 'isPair');
print_r($resultat);
/*
Array
(
    [0] => 2
    [3] => 4
)
*/
```
```php
$f = fn($a) => ($a%2 == 0);
$resultat = array_filter($tableau, $f);
print_r($resultat);
```
```php
$resultat = array_filter($tableau, fn($a) => ($a%2 == 0));
print_r($resultat);
```

### `array_reduce($tableau, $fonction, $valeurInitiale)`

Pour "réduire" le tableau à une seule valeur (ex: somme des éléments).

```php
$tableau = [1, 2, 3, 4];
```

```php
function somme($valeurPrecedente, $a) {
    return $valeurPrecedente + $a;
}
$resultat = array_reduce($tableau, 'somme', 0);
echo $resultat; // 10
```
```php
$f = fn($v, $a) => $v + $a;
$resultat = array_reduce($tableau, $f, 0);
echo $resultat; // 10
```
```php
$resultat = array_reduce($tableau, fn($v, $a) => $v + $a, 0);
echo $resultat; // 10
```

### Fonction retourne une fonction

```php
function puissance($y) {
    return fn($x) => pow($x, $y);
}

$carre = puissance(2);

echo $carre;
// PHP Fatal error:  Uncaught Error: Object of class Closure could not be converted to string 

echo $carre(2);        // 4
echo $carre(3);        // 9

$cube = puissance(3);
echo $cube(2);         // 8
echo $cube(3);         // 27

print_r($carre);
/*
Closure Object (
    [static] => Array  (
        [y] => 2
    )
    [parameter] => Array (
        [$x] => <required>
    )
)*/
```

### Exercices

**2.0** Ecrire les fonctions `array_map2()`, `array_filter2()` et `array_reduce2()`

Reprendre les exercices précédents en utilisant les fonctions sur les tableaux.

**2.3** Ecrire les fonctions `factorielle2($x)`, `puissance2($x, $y)`.
> 💡`range(0, 10) = [0, 1, 2... 10]`
> 💡`fill(0, 10, 42) = [42, 42, 42... 42]`

**2.4** Ecrire les fonctions `minimum3(...$nombres)`, `maximum3(...$nombres)`, `moyenne3(...$nombres)`.

**2.5** Ecrire une fonction qui retourne la liste des nombres premiers entre 2 nombres en paramètres.

**2.8** Ecrire une fonction de tri générique qui prend en paramètre un tableau à trier et le nom de l'algorithme à utiliser.


## Require

Pour découper le code dans plusieurs fichiers, pour pouvoir réutiliser des bouts de codes.

```php
// fichier1.php
function hello($nom) {
    echo "Hello " . $nom . "!";
}
```
```php
// fichier2.php
require "fichier1.php";
hello("World");
// Affiche: Hello World!
```

```php
// fichier3.php
require "fichier1.php";
hello("World");
// Affiche: Hello World!
```

Pratique pour plusieurs pages d'un site :

```php
// menu.php
<nav>
    <a href="page1.php">Page 1</a>
    <a href="page2.php">Page 2</a>
    <a href="page3.php">Page 3</a>
</nav>
```
```php
// footer.php
<div>
    Copyright 2000 (c) - tout droits réservés
</div>
```
```php
// page1.php
<html>
<body>
<?php require "menu.php"; ?>
<!-- contenu de la page 1 -->
<?php require "footer.php"; ?>
</body>
</html>
```
```php
// page2.php
<html>
<body>
<?php require "menu.php"; ?>
<!-- contenu de la page 2 -->
<?php require "footer.php"; ?>
</body>
</html>
```
```php
// page3.php
<html>
<body>
<?php require "menu.php"; ?>
<!-- contenu de la page 3 -->
<?php require "footer.php"; ?>
</body>
</html>
```

Inclusions imbriquées, et inclusions multiples avec `require_once`

```php
// functions.php
function toto() {...}
function tata() {...}
// ...
```
```php
// email.php
require_once "functions.php";
function send_email() { ... }
// ...
```
```php
// sms.php
require_once "functions.php";
function send_sms() { ... }
// ...
```
```php
// page2.php
require "functions.php";
require "email.php";
require "sms.php";

$truc = toto($machin);
send_email("juste@leblanc.com", "Mail de confirmation d'inscription", "bla bla bla");
send_sms(+33623456789, "Yo!");
// ...

```
> 💡 Nouvelle erreur courante : oubli du `_once`
>  `Fatal error: Cannot redeclare toto() (previously declared in /var/www/cesi/php/functions.php:2) in /var/www/cesi/php/functions.php on line 2`

> 💡Nouvelle erreur courante : mauvais nom de fichier
> `Warning: require(function.php): Failed to open stream: No such file or directory in /var/www/cesi/php/toto.php on line 2`

### Exercice

- Initialiser une liste de données (petites annonces, collection de films...) dans un fichier php. Ex :
```php
// listeFilms.php
$films = [
	0 => ['titre' => 'Le seigneur des anneaux', 'annee' => 2001, 'duree' => '178', ...],
	1 => [...],
	...
];
```

- Créer un mini site (html) qui affiche la liste des données et quelques éléments comme un menu (avec des liens fictif pour l'instant), un header, un footer...


## Les variables "super globales"

Variables qui existent en dehors du code PHP pour décrire le contexte d'exécution.

### $_SERVER

Contient des informations sur le serveur et le client.

```php
print_r($_SERVER);
Array(
	[SCRIPT_NAME] => /toto.php
	[REMOTE_ADDR] => 172.18.0.1
	[SERVER_PORT] => 80
	[SERVER_ADDR] => 172.18.0.6
	[SERVER_NAME] => cesi.local
	[SERVER_SOFTWARE] => Apache/2.4.51 (Unix)
	[HTTP_USER_AGENT] => Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36
	...
)
```

### $_GET

Pour transmettre des données du client au serveur par l'URL

```
http://example.com/toto.php?var1=toto&var2=titi
```

```php
// toto.php
print_r($_GET);
echo "var2 = " . $_GET['var2'];
```
```
Array
(
    [var1] => toto
    [var2] => titi
)
var2 = titi
```

#### Exercice

- Créer une nouvelle page `afficher.php` sur le site pour afficher **une** donnée du site (annonce, film...) suivant le paramètre passé en GET.
- Modifier la page de listing pour ajouter des liens vers cette page pour chaque donnée.


### $_POST

Pour transmettre des données du client au serveur par un formulaire

```html
<form action="toto.php" method="post">
	<input name="var1">
	<input name="var2">
	<input type="submit">
</form>
```

```php
// toto.php
print_r($_POST);
echo "var2 = " . $_POST['var2'];
```
```
Array
(
    [var1] => toto
    [var2] => titi
)
var2 = toto
```

Cas particulier  `select`
```html
<select name="var">
  <option value="">Choisissez une valeur</option>
  <option value="toto">Toto</option>
  <option value="titi">Titi</option>
 </select>
```
```php
echo $_POST["var"];     // "" ou "titi" ou "toto"
```

Cas particulier `radio`

```html
<input type="radio" name="var" value="titi"> Titi
<input type="radio" name="var" value="toto"> Toto
```
```php
if (isset($_POST["var"])) {
    echo $_POST["var"];     // "titi" ou "toto"
}
```

Cas particuliers  `checkbox`
```html
<input type="checkbox" name="var" value="titi">
```
```php
if (isset($_POST["var"])) {
    echo $_POST["var"];		// titi
}
```

Cas particuliers  `checkbox` multiple
```html
<input type="checkbox" name="var[]" value="titi"> Titi
<input type="checkbox" name="var[]" value="toto"> Toto
```
```php
if (isset($_POST["var"])) {
    print_r($_POST["var"]);
}
/*
Array
(
    [0] => toto
    [1] => titi
)
*/
```

> ⚠️ HTTPS !

#### Exercice

- Créer une nouvelle page `ajout.php` avec un formulaire (ex: poster une annonce sur leboncoin, ajouter un film à votre vidéothèque...)
- Créer une nouvelle page `enregistrer.php` pour afficher les données provenant du formulaire (Page temporaire similaire à `afficher.php`, puisque les données ne sont enregistrées nulle part pour l'instant).
- Modifier le menu pour ajouter un lien vers la page d'ajout.

### $_SESSION

Pour stocker des données pour toute la session de l'utilisateur.

Les données sont stockées côté serveur, le client n'y a pas accès. Le client transmet un cookie (généralement `PHPSESSID`) d'identifiant pour que le serveur lui associe sa session.

- `session_start();` Initialise/charge la session (envoie le cookie au client).
- `session_destroy();` Supprime la session courante (la session doit être chargée).

```php
// page1.php
<?php session_start(); ?>
...
<?php
$_SESSION['var'] = "toto";
```

```php
// page2.php
<?php session_start(); ?>
...
<?php
if (isset($_SESSION['var'])) {
    echo $_SESSION['var']; //     "toto"
}
```

```php
// page3.php
<?php session_start(); ?>
...
<?php
print_r($_SESSION); //   Array( [var] => "toto" )
session_destroy();
print_r($_SESSION); //   Array( )
}
```
> ⚠️ HTTPS !

#### Message flash

```php
// page1.php
$_SESSION['message-class'] = "success";
$_SESSION['message'] = "Film enregistré";
```

```php
// page2.php
<?php if (isset($_SESSION['message'])) { ?>
    <p class="<?= $_SESSION['message-class']?>">
        <?= $_SESSION['message'] ?>
    </p>
    <?php
    unset($_SESSION['message']);
}
```

#### Exercice

- Modifier la page `enregistrer.php` pour stocker la donnée enregistrer en session.
- Modifier la page `enregistrer.php` pour remplacer l'affichage par une redirection vers la page `lister.php`
  -   💡`header('Location: lister.php');`
- Modifier la page `listeFilms.php`  pour "renvoyer" **toutes** les données (données en dur + les données en session) afin que les pages `lister.php` et `afficher.php` fonctionnent avec **toutes** les données.
- Sur la page `enregistrer.php`, ajouter en session un message de confirmation qui sera affiché sur la page `lister.php` après la redirection (= message flash).
- Nettoyer le code (utiliser des fonctions, inclure des fichiers, ajouter des commentaires, renommer les variables...)
- Modifier la page `lister.php` pour ajouter un lien de suppression sur les éléments.
- Créer la page `supprimer.php` qui supprime un élément.
- Créer la page `modifier.php` pour modifier une donnée : similaire à l'ajout, mais le formulaire est déjà prérempli
- Modifier la page `enregistrer.php` pour modifie la donnée en session au lieu d'en créer une nouvelle si elle existe déjà.
  - 💡`<input type="hidden">`
- Fusionner les pages `ajouter.php` et `modifier.php`
- Ajouter un CSRF sur le formulaire
- Modifier la page `enregistrer.php` pour effectuer des contrôles sur les champs. Si les contrôles sont KO, rediriger vers la page de modification au lieu d'enregistrer, avec un message flash.


### $_FILE

Pour uploader des fichiers.

```html
<form method="post" action="upload.php" enctype="multipart/form-data">
    <input name="userfile" type="file" accept="image/*">
    <input type="submit">
</form>
```

> 💡`php.ini` : `upload_max_filesize = 2M` et `post_max_size = 2M`

```php
// upload.php
print_r($_FILES);
/*
Array
(
    [userfile] => Array
        (
            [name] => IMG_20211026_223330.jpg
            [type] => image/jpeg
            [tmp_name] => /tmp/phpVr6TYG
            [error] => 0
            [size] => 3078413
        )
)
*/

// Répertoire de destination
$uploaddir = __DIR__ . '/uploads/';
// Fichier temporaire
$tmpfile = $_FILES['userfile']['tmp_name'];
// nom du fichier final
$uploadfile = $uploaddir . $_FILES['userfile']['name'];
// Déplacement du fichier temporaire vers l'emplacement final
move_uploaded_file($tmpfile, $uploadfile);
```

Attention à ne pas accepter n'importe quel fichier !
```php
$mime_type = mime_content_type($tmpfile);

if (substr($mime_type, 0, 6) == "image/") {
    // Fichier autorisé
}

$allowed_file_types = ['image/png', 'image/jpeg', 'application/pdf'];
if (in_array($mime_type, $allowed_file_types)) {
    // Fichier autorisé
 }
```


#### Exercice

Ajouter une gestion d'upload de photos sur le site :
- Modifier le formulaire sur la page `ajout.php` pour uploader des images
- Modifier la page `enregistrer.php` pour enregistrer les images
- Modifier les pages `lister.php` et `afficher.php` pour afficher les images

#### Exercice

Gérer une session utilisateur sur le site :
- créer une page `connexion.php` : connexion fictive, qui enregistre simplement le pseudo en session
- créer une page `déconnexion.php` : détruit la session
- Modifier le menu et les diverses pages pour ne pouvoir créer/modifier/supprimer seulement si on est connecté



## PDO

**PHP Data Objects** = Interface d'accès à la base de données.

> 💡PHPMyAdmin

### Connexion à la BDD

```php
// bdd.php
$user = 'root';
$pass = '';
$db = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', $user, $pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
```

La déconnexion est implicite à la fin du script. `$db = null;` pour se déconnecter explicitement.


### Exécuter des requêtes

1. Préparer la requête
2. Renseigner les paramètres s'il y en a
3. Exécuter la requête
4. Récupérer le résultat s'il y en a

#### Requête simple
```php
$request = $db->prepare("SELECT * FROM ...");
$request->execute();
$rows = $request->fetchAll(); // Récupère toutes les lignes d'un coup
foreach ($rows as $row) {
    // ...
}
```
```php
$request = $db->prepare("SELECT * FROM ...");
$request->execute();
while ($row = $request->fetch()) { // Récupère les lignes 1 par 1
    // ...
}
```
```php
$req = $db->prepare("select count(*) as cpt from ...");
$req->execute();
$row = $request->fetch(); // Récupère une seule ligne
$count = $row['cpt'];
$rows = $request->fetchall();
$count = $rows[0]['cpt'];
```

#### Requête avec paramètres
```php
$request = $db->prepare("SELECT * FROM ... where col = :value");
$request->bindValue(':value', $value);
$request->execute();
$rows  =  $request->fetchAll();
```

#### INSERT
```php
$req = $db->prepare("INSERT ... ");
$req->bindValue(':value', $value);
$req->execute();
$last_id = $db->lastInsertId();
```

#### UPDATE
```php
$req = $db->prepare("UPDATE ... ");
$req->bindValue(':value', $value);
$req->execute();
```

#### DELETE
```php
$req = $db->prepare("DELETE ... ");
$req->bindValue(':value', $value);
$req->execute();
```

### Les transactions

Pour garder la base de données dans un état stable.

```php
$db->beginTransaction();
// ...
if ($errors) {
    // Il y a des erreurs quelconques, on annule tout
    $db->rollback();
}
else {
    // Tout va bien, on enregistre
    $db->commit();
}
```

> NB: sans transaction, le `commit()` est implicite à chaque `execute()`.


### Exercice

- Reprendre le site en gérant les données dans une base de données au lieu de la session.
- => `index.php`
- Ajouter une recherche sur la page lister.php
- Plus tard : ajouter une gestion des catégories ou équivalent

## Divers

### Authentification

2 fonctions utiles :

- `password_hash(string $password, $algo)` pour chiffrer un mot de passe
- `password_verify(string $password, string $hash): bool` pour vérifier un mot de passe

```php
$plainPassword = "toto123";
$password = password_hash($plainPassword, PASSWORD_DEFAULT);
echo $password; // $2y$10$YdDyY9eiHe15cPMYIWeRSuueS7V5DfoQZXC96lM9G6AcrF
$plainPassword = null; // Symbolique

$check = password_verify("azerty", $password);     // $check = false
$check = password_verify("TOTO123", $password);    // $check = false
$check = password_verify("toto123", $password);    // $check = true
```

Le reste c'est **juste** du stockage d'utilisateurs en base et de la gestion de session !


#### Exercice

- Ajouter une page `inscription.php` pour que les utilisateurs puissent s'inscrire :
  1. Formulaire avec pseudo et mot de passe
  2. Vérification que le pseudo n'existe pas déjà en base
  3. Chiffrer le mot de passe et ajout d'une ligne dans la table `utilisateurs`
- Ajouter une page `connexion.php` pour que les utilisateurs puissent se connecter
  1. Formulaire avec pseudo et mot de passe
  2. Vérifier que le pseudo existe en base
  3. Vérifier que le mot de passe correspond
  4. Créer une session et stocker le pseudo de l'utilisateur
- Ajouter une page `deconnexion.php`
  1. Détruire la session


###  Url rewriting

Pour transformer des url "moches" :

```
http://example.com/truc-complique-a-rallonge.php
http://example.com/machin.php?var1=titi&var2=tata
```

en url "jolies" :

```
http://example.com/truc
http://example.com/machin-titi-tata
```

On utilise un fichier `.htaccess`, qui permet de configurer le serveur web pour le répertoire courant.

```htaccess
RewriteEngine on
RewriteRule ^truc$   truc-complique-a-rallonge.php [L]
RewriteRule ^machin-(.*)-(.*)$   machin.php?var1=$1&var2=$2 [L]
```

#### Exercice

- Utiliser un `.htaccess` pour faire des "jolies" url sur votre site.


## API WEB

> Application Programming Interface

Navigateur = Interface Homme <=> Machine

API = Interface Machine <=> Machine

C'est déjà une API entre le navigateur et le serveur !

```bash
curl -X POST 'http://cesi.local/site-bdd/connexion.php' --data-raw 'login=admin@toto.com&password=azeaze'`
```

```
HTTP/1.1 302 Found
Date: Wed, 02 Feb 2022 07:05:45 GMT
Server: Apache/2.4.51 (Unix)
X-Powered-By: PHP/8.1.2
Expires: Thu, 19 Nov 1981 08:52:00 GMT
Cache-Control: no-store, no-cache, must-revalidate
Pragma: no-cache
Set-Cookie: PHPSESSID=tmvdmhrpmlt0nkd629is85at1n; path=/
Location: index.php
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8
```

```bash
curl -X GET 'http://cesi.local/site-bdd/index.php'
```

```
HTTP/1.1 200 OK
Date: Wed, 02 Feb 2022 07:02:11 GMT
Server: Apache/2.4.51 (Unix)
X-Powered-By: PHP/8.1.2
Expires: Thu, 19 Nov 1981 08:52:00 GMT
Cache-Control: no-store, no-cache, must-revalidate
Pragma: no-cache
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8
<html>
...
...
...
...
</html>
```

### Standards web

- Requêtes HTTP :
  -  `GET` pour récupérer une ressource
  - `POST` pour créer une ressource
  - `PATCH` / `PUT` pour modifier une ressource
  - `DELETE` pour supprimer une ressource
- Réponse HTTP ([wikipedia](https://fr.wikipedia.org/wiki/Liste_des_codes_HTTP)) :
  - `2xx` OK
  - `3xx` Redirections
  - `4xx` Erreurs du client
  - `5xx` Erreurs du serveur
- Formats de données
  - `html`
  - `json`
  - `xml`
  - `csv`
  - ...

>💡Pour tester une API : Postman, Insomnia...

### [serveur] renvoyer du json

... à la place de l'html.

`header('Content-Type: application/json');` pour indiquer qu'on renvoie du json.

```php
<?php header('Content-Type: application/json'); ?>
{
    id: 1,
    titre: "Kill bill",
    annee: 2003
}
```
```php
<?php header('Content-Type: application/json'); ?>
<?php
$film = [...];
?>
{
    id: <?= $film['id'] ?>,
    titre: <?= $film['titre'] ?>,
    annee: <?= $film['annee'] ?>
}
```
```php
<?php header('Content-Type: application/json'); ?>
<?php
$film = [...];
echo json_encode($film);  // { id: 1, titre: "Kill bill", annee: 2003 }
?>
```

### [serveur] recevoir du json

... à la place de $_POST.

```php
$json = file_get_contents("php://input");
$film = json_decode($json, true);
print_r($film);
/*
array(3) {
  [titre] => "Kill bill"
  [annee] => "2003"
  [duree] => "123"
}
*/
```

### [client] récupérer du json

```javascript
// Javascript
xhr = new XMLHttpRequest();
xhr.open("GET", "toto.php");
xhr.setRequestHeader("Accept", "application/json");
xhr.responseType = 'json';
xhr.onload  = function() {
    data = xhr.response;
    console.log(data);
    /*
    data = {
        id: 1,
        titre: "Kill bill",
        annee: 2003
    }
    */
};
req.send();
```

```javascript
// JQuery
$.ajax({
    type: "GET",
    url: "toto.php",
    dataType: "json",
    success: (data) => console.log(data),
});
```

```php
// PHP
$curl = curl_init("toto.php");
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);
$data = json_decode($response, true);
/*
$data = [
  "titre" => "Kill bill"
  "annee" => "2003"
  "duree" => "123"
]
 */
```

### [client] envoyer du json

```javascript
// Javascript
data = {
    id: 1,
    titre: "Kill bill",
    annee: 2003
};

xhr = new XMLHttpRequest();
xhr.open("POST", "toto.php");
xhr.setRequestHeader("Content-Type", "application/json");
xhr.send(JSON.stringify(data));
```

```javascript
// JQuery
$.ajax({
    type: "POST",
    url: "toto.php",
    dataType: 'json',
    data: JSON.stringify(data),
    success: (e) => console.log(e),
});
```

```php
// PHP
$curl = curl_init("toto.php");
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);
```

### Exercice

- Créer les scripts  :
  - `api/get_films.php`  pour récupérer tous les films
  - `api/get_film.php` pour récupérer un film
  - `api/post.php` pour poster un film
  - `api/patch.php` pour modifier un film
  - `api/delete.php` pour supprimer un film
- Trucs à faire :
  - fonction lecture requête json / écriture réponse json
  - fonction d'erreur (message + code)
  - Vérifier la méthode => `$_SERVER['REQUEST_METHOD']`
  - Pagination
  - ...
