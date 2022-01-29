INFAL156-PHP et MySQL - Raphaël Bacco

# PHP

Documentation PHP :
https://www.php.net/docs.php

Cours :
https://github.com/leahpar/cesi-php


## Installation

- [ ] PHP
- [ ] Base de données (MySQL / MariaDB / PostgreSQL / SQLite)
- [ ] Serveur web (Apache / Nginx)
- [ ] PhpMyAdmin ou autre

Bundles :

- XAMPP : https://www.apachefriends.org/
- WAMP : https://www.wampserver.com/
- MAMP : https://www.mamp.info/ ✅

> 💡Ajouter `error_reporting = E_ALL` dans le `php.ini` pour afficher un message d'erreur explicite en cas d'erreur.


## PHP - Les bases

### Syntaxe

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
✅ $supervariable		// ⚠️ Différent de $superVariable
⚠️ $SuperVariable		// Pas de majuscule en début (par convention)
❌ $ma-variable			// Pas de tiret
❌ $ma variable   		// Pas d'espace
❌ $prénom				// Pas d'accent
✅ $maVariable2
❌ $2maVariable			// Pas de chiffre en début
```

**Types de variables**

```php
$a = 42;                    // int
$a = 4.2;                   // float
$a = "42";                  // string
$a = true;                  // boolean
$a = false;
$a = null;                  // NULL
$a = [...];					// array
$a = new Object();			// object
```

** Opérations mathématiques**

```php
$a = 40 + 2;                // 42 (int)

$a = 4 * (2.2 - 12) / 144;  // -0.272222222 (float)

$b = $a / 2;				// 24 (int)

$a = 42;
$a = $a + 1;
$a += 1;
$a++;
```

** Opérations sur les chaines**

```php
$a = "Hello" . "world!";    // "Helloworld!" (string)

$world = "world";
$a = "Hello " . $world . "!";   // "Hello world!"

$annee = 2022;
$a = "Nous sommes en " . $annee; // "Nous sommes en 2022"
```

** Opérations logiques**

```php
$a = true;
$b = false;

$c = $a;                       // true
$c = ! $a;                     // false
$c = ($a || $b);               // true OR  false       = true
$c = ($a && $b);               // true AND false       = false
```

```php
$a = 42;
$b = 21;

$c = ($a == $b);               // true
$c = ($a != $b);               // false
$c = ($a >  $b);               // true
$c = ($a >= $b);               // true
$c = ($a <  $b);               // false
$c = ($a <= $b);               // false
```

> ⚠️ `$a = $b` (affectation) VS `$a == $b` (comparaison)

**Comparaison VS comparaison stricte** :

`==` et `!=` comparent les valeurs, `===` et `!==` comparent les valeurs et les types.

```php
$a = 42;
$b = "42";
$c = 42.0;

$a == $b;		// true
$a == $c;		// true
$b != $c;		// false
$a === $b;		// false
$a === $c;		// false
$b !== $c;		// true
```

**conversion implicite**

```php
 40  +  2			// 42
 40  +  2.0			// 42.0
 40  + "2"			// 42
"40" + "2"			// 42
"40" . "2"			// 402
 40  . "2"			// 402
 40  .  2			// 402
```

> ⚠️ à éviter tant que possible tout de même

**Booléens** : tout est vrai, "rien" est faux

```php
0  == false			// true
"" == false			// true
[] == false			// true
null == false		// true
```


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
$prenoms[1] = "Paul";
$prenoms[2] = "Jacques";
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
/**
Array
(
    [0] => Pierre
    [1] => Paul
    [2] => Jacques
)
**/

var_dump($prenoms);
/**
array(3) {
  [0] => string(6) "Pierre"
  [1] => string(4) "Paul"
  [2] => string(7) "Jacques"
}
**/
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
echo $age[$prenoms[0]];     // = $age["Pierre"] = 42
echo $age[$prenoms[2]];     // PHP Notice: Undefined index: Jacques
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
echo $participants["Pierre"]["age"];		// 42
echo $participants["Paul"]["prenom"];		// Paul
echo $participants["Jacques"]["age"];		// PHP Warning:  Undefined array key "age"
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

echo somme(20, 22);			// Affiche "42"
```

**Paramètres facultatifs**

```php
function somme($a, $b, $c=0, $d=0) {
	return $a + $b + $c + $d;
}
echo somme(20, 22);				// Affiche "42"
echo somme(20, 22, 10);			// Affiche "52"
echo somme(20, 22, 10, 12);		// Affiche "64"
```

**Bonus: typage des paramètres**

```php
function somme(int $a, int $b): int {
	return $a + $b;
}
```
Paramètres convertis si possible :
```php
echo somme(1, 2);		// 3
echo somme(1, 2.1);		// 3
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
somme(42);				// $nombres = [42]
somme(40, 2);			// $nombres = [40, 2]
somme(40, 2, 12);		// $nombres = [40, 2, 12]
```

**Bonus : fonction variable et fonction anonyme**

```php
// Fonction "normale"
function somme($a, $b) {
	return $a + $b;
}

// fonction variable 
$f = 'somme';
echo $f.'(20, 22)';			// "somme(20, 22)"
echo $f(20, 22);			// 42
```
```php
// Fonction anonyme
$f = function($a, $b) {
	return $a + $b;
};	// Ne pas oublier le ';' ici

echo $f(20, 22);			// 42
```
```php
// Fonction anonyme (notation simplifiée)
$f = fn($a, $b) => $a + $b;

echo $f(20, 22);			// 42
```


### Structure conditionnelle

Pour exécuter ou non du code suivant des conditions.

#### IF

```php
if (CONDITION 1) {
	// ...
}
else if (CONDITION 2) {
	// ...
}
else if (CONDITION 3) {
	// ...
}
else {
	// ...
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
$couleur = "bleu";

switch ($couleur) {
    case "bleu":
        echo "La voiture est bleue";
        break;
    case "rouge":
        echo "La voiture est rouge";
        break;
    case "vert":
        echo "La voiture est verte";
        break;
    case "jaune":
        echo "La voiture est jaune";
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
	echo "La ".($lettre+1)."e lettre de l'alphabet est " . $lettre;
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
foreach ($participant as $prenom => $data) {
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

**1.2** Ecrire les fonctions `min($x, $y)`, `max($x, $y)`.

**1.3** Ecrire les fonctions `factorielle($x)`, `puissance($x, $y)`.

**1.4** Ecrire les fonctions `min(...$nombres)`, `max(...$nombres)`, `moyenne(...$nombres)`.

**1.5** Ecrire une fonction qui retourne la liste des nombres premiers entre 2 nombres en paramètres.
`1`, `2`, `3`, `5`, `7`...

Bonus :
- Gérer les cas particuliers (0 et 1)
- Gérer les nombres négatifs
- Gérer les paramètres dans le désordre

**1.6** Ecrire une fonction qui retourne la liste des N premiers éléments de la suite de Conway (opérations sur les strings).
`1`, `11`, `21`, `1211`, `111221`...

**1.7** Ecrire une fonction qui retourne la liste des N premiers nombres de la suite de Fibonacci (fonction récursive).
`0`, `1`, `1`, `2`, `3`, `5`, `8`, `13`...

**1.8** Ecrire des fonctions de tri qui prennent en paramètre un tableau de nombres à trier :
- tri bulle (https://fr.wikipedia.org/wiki/Tri_%C3%A0_bulles)
- tri par insertion (https://fr.wikipedia.org/wiki/Tri_par_insertion)
- tri rapide (https://fr.wikipedia.org/wiki/Tri_rapide)

Bonus : Ecrire une fonction de tri générique qui prend en paramètre un tableau à trier et le nom de l'algorithme à utiliser. ex:`tri([42, 321, 22, 6, 1], "bulle")`.

## programmation fonctionnelle

Juste pour se faire des noeuds au cerveau ! (Mais quand même pratique pour des traitements sur des tableaux)

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

### Exercices

Reprendre les exercices précédents en utilisant les fonctions sur les tableaux.
> 💡`range(0, 10) = [0, 1, 2... 10]`

**2.3** Ecrire les fonctions `factorielle($x)`, `puissance($x, $y)`.

**2.4** Ecrire les fonctions `min(...$nombres)`, `max(...$nombres)`, `moyenne(...$nombres)`.

**2.5** Ecrire une fonction qui retourne la liste des nombres premiers entre 2 nombres en paramètres.

**2.6** Ecrire une fonction qui retourne la liste des N premiers éléments de la suite de Conway (opérations sur les strings).

**2.7** Ecrire une fonction qui retourne la liste des N premiers nombres de la suite de Fibonacci (fonction récursive).

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
// ...
```
```php
// email.php
require_once "functions.php";
// ...
```
```php
// sms.php
require_once "functions.php";
// ...
```
```php
// page2.php
require "functions.php";
require "email.php";
require "sms.php";
// ...
```
> ⚠️ Sans `require_once` : `Fatal error: Cannot redeclare toto() (previously declared in /var/www/cesi/php/functions.php:2) in /var/www/cesi/php/functions.php on line 2`

> 💡Nouvelle erreur courante : mauvais nom de fichier
> `Warning: require(functions.php): Failed to open stream: No such file or directory in /var/www/cesi/php/toto.php on line 2`

TO BE CONTINUED...
