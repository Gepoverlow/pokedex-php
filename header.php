<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
    <title>Pokedex</title>
  </head>
  <body>
    <div id="container-all">
      <div id="container-search">
        <form id="pokemon-search-form" action="getPokemon.php" autocomplete="off" method="get">
          <label for="pokemon-search-input">Search</label>
          <input id="pokemon-search-input" type="text" placeholder="Name or Id" name="pokemonid" />
          <button id="pokemon-search-button" type="submit" name="submit">Search!</button>
        </form>
        <div id="pokemon-search-autocomplete"></div>
      </div>
