<?php

$name = $_GET["pokemonid"];

if(isset($_GET["submit"])) {
    include "includes/functions.inc.php";

$pokedex = getPokemon($name);
$pokemon = $pokedex->pokemon;

 displayPokemon($pokemon->name, $pokemon->sprite, $pokemon->id, $pokemon->typesString);

 $pokedex->handleBackground($pokedex->pokemon->types);
}
    










