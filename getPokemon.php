<?php

$name = $_GET["pokemonid"];

 if(isset($_GET["submit"])) {
    include "includes/functions.inc.php";


  // phpinfo();
    

 $pokedex = @getPokemon($name);

 if(!$pokedex) return;

 $pokemon = $pokedex->pokemon;

 $pokemonMoves = createLisFromMoves($pokemon->moves);
 $implodedMoves = implode("", $pokemonMoves);

  displayPokemon($pokemon->name, $pokemon->sprite, $pokemon->id, $pokemon->typesString, $implodedMoves);

  $pokedex->handleBackground($pokedex->pokemon->types);

  //evolutions
 $pokemon->evolutionLine = getEvolutionData($name);



 $pokemon->evolutionLine = getEvolutions($pokemon->speciesUrl);

 var_dump($pokemon->evolutionLine);

 }
    










