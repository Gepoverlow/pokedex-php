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
  
    <div id=info-pokeball-top-basic>
    </div></div>
    <div id=info-pokeball-bottom>
    
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

function getEvolutionData($identifier) {
  $data = file_get_contents("https://pokeapi.co/api/v2/pokemon/" . $identifier);
  $response = json_decode($data);
  $evoData = [];

  array_push($evoData, $response->sprites->front_default, $response->name);



  return $evoData;
}

function getEvolutions($speciesUrl) {
  $data= file_get_contents($speciesUrl);
  $response = json_decode($data);

  handleEvolutionData($response->evolution_chain->url);
  // displayEvolutions();
}

function handleEvolutionData($chainUrl) {
  $data = file_get_contents($chainUrl);
  $response = json_decode($data);

  echo "<pre>";

  
  $evolutionChain = [];
  $evoData = $response->chain;

  $baseString = $evoData->species->url;

  $splicedString = substr($baseString, 42, strlen($baseString) - 43);


  // do {
  //   $baseString = $evoData->species->url;
  //   // $splicedString = baseString.slice(42, baseString.length - 1);
  //   $splicedString = substr($baseString, 42, strlen($baseString) - 43);

  //   evolutionChain.push({
  //     name: evoData.species.name,
  //     id: splicedString,
  //   });

  //   if (evoData.evolves_to.length > 1) {
  //     for (let i = 0; i < evoData.evolves_to.length; i++) {
  //       let baseString = evoData.evolves_to[i].species.url;
  //       let splicedString = baseString.slice(42, baseString.length - 1);

  //       evolutionChain.push({ name: evoData.evolves_to[i].species.name, id: splicedString });

  //       if (evoData.evolves_to[i].evolves_to.length > 0) {
  //         let baseStringDupe = evoData.evolves_to[i].evolves_to[0].species.url;
  //         let splicedStringDupe = baseStringDupe.slice(42, baseString.length - 1);

  //         evolutionChain.push({
  //           name: evoData.evolves_to[i].evolves_to[0].species.name,
  //           id: splicedStringDupe,
  //         });
  //       }
  //     }
  //   }

  //   evoData = evoData["evolves_to"][0];
  // } while (!!evoData && evoData.hasOwnProperty("evolves_to"));

  // let removedDuplicates = removeDuplicateObjects(evolutionChain);
  // if (pokedex.currentPokemon[0].evolutionLine.length === 0) {
  //   removedDuplicates.forEach((evolution) =>
  //     pokedex.currentPokemon[0].evolutionLine.push(evolution)
  //   );
  // }
}
