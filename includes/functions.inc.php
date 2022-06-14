<?php

include_once "classes.inc.php";

function getPokemon($id){
$data = file_get_contents("https://pokeapi.co/api/v2/pokemon/" . $id);
$result = json_decode($data);

$test = new Pokemon($result);

print_r($test);
// return $result;

}
