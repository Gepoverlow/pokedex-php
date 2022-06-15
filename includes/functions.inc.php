<?php

include_once "classes.inc.php";


function getPokemon($id){
    $data = file_get_contents("https://pokeapi.co/api/v2/pokemon/" . $id);
    if(!$data || !$id) {
      handleError();
      return;
    }
    $result = json_decode($data);
    
   $pokedex = new Pokedex();
   $pokedex->createPokemon($result);

   return $pokedex;
}

function displayPokemon($name, $sprite, $id, $typesString, $moves){
include_once "header.php";

echo "<div id=container-info>
<div id=info-app-name>GPokedex</div>
<div id=info-pokeball-id>$id</div>
<div id=info-pokeball>
  <div id=info-pokeball-top>
  <span id=info-pokeball-top-shiny-toggle>Toggle Shiny</span>
  <div id=info-pokeball-top-basic>
    
  <h1 id=info-pokeball-top-basic-name>$name</h1>
  <img id=info-pokeball-top-basic-img src=$sprite><img>
  <h3 id=info-pokeball-top-basic-type>$typesString</h3>
  
  </div></div>

  <div id=info-pokeball-bottom>
  <span id=info-pokeball-bottom-evo-toggle>See Evo</span>
  <div id=info-pokeball-bottom-moves>
  <h3 id=info-pokeball-bottom-moves-title>Moves:</h3>
  <ul id=info-pokeball-bottom-moves-list> 
  $moves
  </ul>
  </div>
  </div>
</div>
</div>
</div>
</body>
</html>";
 
}

function handleError(){
  include_once "header.php";
  
  echo "<div id=container-info>
  <div id=info-app-name>GPokedex</div>
  <div id=info-pokeball-id></div>
  <div id=info-pokeball>
    <div id=info-pokeball-top>
    <span id=info-pokeball-top-shiny-toggle>Toggle Shiny</span>
    <div id=info-pokeball-top-basic>
    </div></div>
    <div id=info-pokeball-bottom>
    <span id=info-pokeball-bottom-evo-toggle>See Evo</span>
    <div id=info-pokeball-bottom-moves>
    <h3 id=info-pokeball-bottom-moves-title>Pokemon not found</h3>
    </div>
    </div>
  </div>
  </div>
  </div>
  </body>
  </html>";
   
  }


function createLisFromMoves($moves){
$arrayOfMoves = [];

  for($i = 0; $i < count($moves) && $i < 4 ; $i++){
    array_push($arrayOfMoves, "<li>" . $moves[$i] . "</li>");
  }

  return $arrayOfMoves;
}
