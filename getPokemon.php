<?php

$name = $_GET["pokemonid"];

if(isset($_GET["submit"])) {
    include "includes/functions.inc.php";

$pokedex = getPokemon($name);
$pokemon = $pokedex->currentPokemon[0];

$pokedex->handleBackground($pokemon->types);



 displayPokemon($pokemon->name, $pokemon->sprite, $pokemon->id, $pokemon->typesString);
}
    










