<?php

include_once "classes.inc.php";


function getPokemon($id){
    $data = file_get_contents("https://pokeapi.co/api/v2/pokemon/" . $id);
    $result = json_decode($data);
    
   $pokedex = new Pokedex();
   $pokedex->createPokemon($result);

   return $pokedex;
}

function displayPokemon($name, $sprite, $id, $type){

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
  <h3 id=info-pokeball-top-basic-type>$type</h3>
  
  </div></div>

  <div id=info-pokeball-bottom>
  </div>
</div>
</div>
</div>

<!-- <script src=main.js></script> -->
</body>
</html>";
 
    
}
