<?php

 $types = [
    "normal",
    "fire",
    "water",
    "grass",
    "electric",
    "ice",
    "fighting",
    "poison",
    "ground",
    "flying",
    "psychic",
    "bug",
    "rock",
    "ghost",
    "dark",
    "dragon",
    "steel",
    "fairy",
  ];

  
  $colors = [
    "#A8A878", //normal
    "#F08030", //fire
    "#6890F0", //water
    "#78C850", //grass
    "#F8D030", //electric
    "#98D8D8", //ice
    "#C03028", //fighting
    "#A040A0", //poison
    "#E0C068", //ground
    "#A890F0", //flying
    "#F85888", //psychic
    "#A8B820", //bug
    "#B8A038", //rock
    "#705898", //ghost
    "#705848", //dark
    "#7038F8", //dragon
    "#B8B8D0", //steel
    "#F0B6BC", //fairy
  ];
  
  $lightColors = [
    "#C3C3A2", //light normal
    "#f0A067", //light fire
    "#68B0F0", //light water
    "#97C87E", //light grass
    "#F7DB69", //light electric
    "#BCDEDE", //light ice
    "#C2615C", //light fighting
    "#A464A4", //light poison
    "#E2CB8E", //light ground
    "#C4B4F4", //light flying
    "#F97fA4", //light psychic
    "#B3BB67", //light bug
    "#B9AA6B", //light rock
    "#827499", //light ghost
    "#77695F", //light dark
    "#9166F9", //light dragon
    "#CFCFD5", //light steel
    "#F1CACE", //light fairy
  ];

class Pokedex {


  function __construct() {
    $this->allPokemonNames = [];
    $this->filteredPokemons = [];
    $this->offset = 0;
  }

  function init() {
    $this->currentPokemon = [];
  }

  function createPokemon($response) {
    $this->pokemon = new Pokemon($response);
//    $this->currentPokemon.push($this->pokemon);
    // array_push($this->currentPokemon, $this->pokemon);
    $this->currentPokemon[] = $this->pokemon; 

    $this->handleBackground($this->pokemon->types);
  }

 function handleBackground($typing) {
    $gradientBg;

    global $types, $colors, $lightColors;



    // if ($typing.length === 2) {
        if (count($typing) === 2) {
    //   $indexOne = types.indexOf($typing[0]);
    $indexOne = array_search($typing[0], $types);
      $primaryColor = $colors[$indexOne];

    //   $indexTwo = types.indexOf($typing[1]);
    $indexTwo = array_search($typing[1], $types);
      $secondaryColor = $colors[$indexTwo];

      $gradientBg = `linear-gradient(to right, {$primaryColor}, {$secondaryColor})`;
    } else {
    //   $indexOne = types.indexOf($typing[0]);
    $indexOne = array_search($typing[0], $types);
      $primaryColor = $colors[$indexOne];

      $secondaryColor = $lightColors[$indexOne];
      $gradientBg = `linear-gradient(to right, {$primaryColor}, {$secondaryColor})`;
    }


    echo `<style type="text/css">
        #container-info {
            background-image: {$gradientBg};
        }
        </style>`;
  }
}

class Pokemon {
   function __construct($response) {
    //   $this->id = $this->handleIdFormatting($response->id);
      $this->id = $this->handleIdFormatting($response->id);
      $this->name = ucfirst($response->name);
      $this->speciesUrl = $response->species->url;
      $this->sprite = $response->sprites->front_default;
      $this->shinySprite = $response->sprites->front_shiny;
      $this->moves = $this->handleMoves($response);
      $this->types = $this->handleTypes($response);
      $this->typesString = $this->handleTypesString($this->types);
      $this->isShiny = false;
      $this->evolutionLine = [];
    }
  
   function handleMoves($response) {
      $moves = [];
  
    //   if (response.moves.length === 0) {
        if (count($response->moves) === 1)  {
        // moves.push(response.moves[0].move.name);
        array_push($moves, $response->moves[0]->move->name);
      } else {
        for ($i = 0; $i < 4; $i++) {
        //   moves.push($response.moves[i].move.name);
        array_push($moves, $response->moves[$i]->move->name);
        }
      }
      return $moves;
    }
  
   function handleTypes($response) {
      $types = [];
    //   for (let i = 0; i < response.types.length; i++) {
        for ($i = 0; $i < count($response->types); $i++) {
        // types.push($response.types[i].type.name);
        array_push($types, $response->types[$i]->type->name);
      }

      return $types;
        }

    function handleTypesString($types){
          $typeString = "";

          if(count($types) > 1){
            $typeString = $types[0] . " / " . $types[1];
          } else {
            $typeString = $types[0];
          }
          return $typeString;
          }
        
    // handleCapitalizedName(name) {
    //   return name.charAt(0).toUpperCase() + name.slice(1);
    // }
  
   function handleIdFormatting($id) {

  $idNumber = "";

      if ($id > 0 && $id < 10) {
        $idNumber = "#00" . $id;
      } else if ($id >= 10 && $id < 100) {
        $idNumber = "#0" . $id;
      } else {
        $idNumber = "#" . $id;
      }

      return $idNumber;
    }
  
  }