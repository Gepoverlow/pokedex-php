<?php

$name = $_GET["pokemonid"];

if(isset($_GET["submit"])) {
    include_once "functions.inc.php";

  $pokemon = getPokemon($name);

  print_r($pokemon->id);
}
    






