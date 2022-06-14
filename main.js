const containerInfo = document.getElementById("container-info");
const containerPokeballTop = document.getElementById("info-pokeball-top");
const containerPokeballBottom = document.getElementById("info-pokeball-bottom");
const containerPokeballBottomEvo = document.getElementById("info-pokeball-bottom-evolutions");
const containerPokeballId = document.getElementById("info-pokeball-id");

const autoComplete = document.getElementById("pokemon-search-autocomplete");

// const types = [
//   "normal",
//   "fire",
//   "water",
//   "grass",
//   "electric",
//   "ice",
//   "fighting",
//   "poison",
//   "ground",
//   "flying",
//   "psychic",
//   "bug",
//   "rock",
//   "ghost",
//   "dark",
//   "dragon",
//   "steel",
//   "fairy",
// ];

// const colors = [
//   "#A8A878", //normal
//   "#F08030", //fire
//   "#6890F0", //water
//   "#78C850", //grass
//   "#F8D030", //electric
//   "#98D8D8", //ice
//   "#C03028", //fighting
//   "#A040A0", //poison
//   "#E0C068", //ground
//   "#A890F0", //flying
//   "#F85888", //psychic
//   "#A8B820", //bug
//   "#B8A038", //rock
//   "#705898", //ghost
//   "#705848", //dark
//   "#7038F8", //dragon
//   "#B8B8D0", //steel
//   "#F0B6BC", //fairy
// ];

// const lightColors = [
//   "#C3C3A2", //light normal
//   "#f0A067", //light fire
//   "#68B0F0", //light water
//   "#97C87E", //light grass
//   "#F7DB69", //light electric
//   "#BCDEDE", //light ice
//   "#C2615C", //light fighting
//   "#A464A4", //light poison
//   "#E2CB8E", //light ground
//   "#C4B4F4", //light flying
//   "#F97fA4", //light psychic
//   "#B3BB67", //light bug
//   "#B9AA6B", //light rock
//   "#827499", //light ghost
//   "#77695F", //light dark
//   "#9166F9", //light dragon
//   "#CFCFD5", //light steel
//   "#F1CACE", //light fairy
// ];

// class Pokedex {
//   constructor() {
//     this.allPokemonNames = [];
//     this.filteredPokemons = [];
//     this.offset = 0;
//   }

//   init() {
//     this.currentPokemon = [];
//   }

//   createPokemon(response) {
//     this.pokemon = new Pokemon(response);
//     this.currentPokemon.push(this.pokemon);

//     this.handleBackground(this.pokemon.types);
//     this.handleDomMainInfo(this.pokemon);
//     this.handleDomMovesInfo(this.pokemon);
//     this.handleDomIdInfo(this.pokemon);
//   }

//   handleBackground(typing) {
//     let gradientBg;

//     if (typing.length === 2) {
//       let indexOne = types.indexOf(typing[0]);
//       let primaryColor = colors[indexOne];

//       let indexTwo = types.indexOf(typing[1]);
//       let secondaryColor = colors[indexTwo];

//       gradientBg = `linear-gradient(to right, ${primaryColor}, ${secondaryColor})`;
//     } else {
//       let indexOne = types.indexOf(typing[0]);
//       let primaryColor = colors[indexOne];

//       let secondaryColor = lightColors[indexOne];
//       gradientBg = `linear-gradient(to right, ${primaryColor}, ${secondaryColor})`;
//     }

//     containerInfo.style.backgroundImage = gradientBg;
//   }

//   emptyNode(parent) {
//     while (parent.firstChild) {
//       parent.firstChild.remove();
//     }
//   }

//   handleDomMainInfo(pokemon) {
//     this.emptyNode(containerPokeballTop);
//     const basicInfoContainer = document.createElement("div");
//     const pokemonName = document.createElement("h1");
//     const pokemonSprite = document.createElement("img");
//     const pokemonType = document.createElement("h3");

//     const shinySpan = document.createElement("span");

//     pokemonName.textContent = pokemon.name;
//     pokemonSprite.src = pokemon.sprite;
//     pokemonType.textContent =
//       pokemon.types.length > 1
//         ? `${pokemon.types[0]} / ${pokemon.types[1]}`
//         : `${pokemon.types[0]}`;
//     shinySpan.textContent = "Toggle Shiny";

//     basicInfoContainer.id = "info-pokeball-top-basic";
//     pokemonName.id = "info-pokeball-top-basic-name";
//     pokemonSprite.id = "info-pokeball-top-basic-img";
//     pokemonType.id = "info-pokeball-top-basic-type";
//     shinySpan.id = "info-pokeball-top-shiny-toggle";

//     basicInfoContainer.appendChild(pokemonName);
//     basicInfoContainer.appendChild(pokemonSprite);
//     basicInfoContainer.appendChild(pokemonType);

//     containerPokeballTop.appendChild(shinySpan);
//     containerPokeballTop.appendChild(basicInfoContainer);
//   }

//   handleDomMovesInfo(pokemon) {
//     this.emptyNode(containerPokeballBottom);
//     const movesInfoContainer = document.createElement("div");
//     const movesTitle = document.createElement("h3");
//     const movesList = document.createElement("ul");

//     const evoSpan = document.createElement("span");

//     for (let i = 0; i < pokemon.moves.length; i++) {
//       const movesListItem = document.createElement("li");
//       movesListItem.textContent = pokemon.moves[i];
//       movesList.appendChild(movesListItem);
//     }

//     movesTitle.textContent = "Moves:";
//     evoSpan.textContent = "See Evo";

//     movesInfoContainer.id = "info-pokeball-bottom-moves";
//     movesTitle.id = "info-pokeball-bottom-moves-title";
//     movesList.id = "info-pokeball-bottom-moves-list";
//     evoSpan.id = "info-pokeball-bottom-evo-toggle";

//     movesInfoContainer.appendChild(movesTitle);
//     movesInfoContainer.appendChild(movesList);

//     containerPokeballBottom.appendChild(evoSpan);
//     containerPokeballBottom.appendChild(movesInfoContainer);
//   }

//   handleDomIdInfo(pokemon) {
//     containerPokeballId.textContent = pokemon.id;
//   }

//   handleShinyToggle(currentPokemon) {
//     if (currentPokemon[0].isShiny === false) {
//       document.getElementById("info-pokeball-top-basic-img").src = this.pokemon.shinySprite;

//       currentPokemon[0].isShiny = true;
//     } else {
//       document.getElementById("info-pokeball-top-basic-img").src = this.pokemon.sprite;
//       currentPokemon[0].isShiny = false;
//     }
//   }

//   handlePokemonNotFound() {
//     this.emptyNode(containerPokeballTop);
//     this.emptyNode(containerPokeballId);
//     this.emptyNode(containerPokeballBottom);
//     const errorMessage = document.createElement("h2");
//     errorMessage.textContent = "Pokemon not found :`(";
//     containerPokeballTop.appendChild(errorMessage);
//   }

//   filterPokemons(input) {
//     this.filteredPokemons = this.allPokemonNames.filter((name) => name.includes(input));
//     if (input) {
//       this.displayFilteredPokemons(this.filteredPokemons);
//     } else {
//       this.emptyNode(autoComplete);
//     }
//   }

//   displayFilteredPokemons(filteredArray) {
//     this.emptyNode(autoComplete);

//     for (let i = 0; i < filteredArray.length; i++) {
//       const li = document.createElement("li");
//       li.textContent = filteredArray[i];
//       li.className = "auto-search-suggestion";
//       autoComplete.appendChild(li);
//     }
//   }
// }

// class Pokemon {
//   constructor(response) {
//     this.id = this.handleIdFormatting(response.id);
//     this.name = this.handleCapitalizedName(response.name);
//     this.speciesUrl = response.species.url;
//     this.sprite = response.sprites.front_default;
//     this.shinySprite = response.sprites.front_shiny;
//     this.moves = this.handleMoves(response);
//     this.types = this.handleTypes(response);
//     this.isShiny = false;
//     this.evolutionLine = [];
//     this.isFavorite = false;
//   }

//   handleMoves(response) {
//     const moves = [];

//     if (response.moves.length === 0) {
//       console.log("moves not found"); //
//     } else if (response.moves.length === 1) {
//       moves.push(response.moves[0].move.name);
//     } else {
//       for (let i = 0; i < 4; i++) {
//         moves.push(response.moves[i].move.name);
//       }
//     }
//     return moves;
//   }

//   handleTypes(response) {
//     const types = [];
//     for (let i = 0; i < response.types.length; i++) {
//       types.push(response.types[i].type.name);
//     }
//     return types;
//   }

//   handleCapitalizedName(name) {
//     return name.charAt(0).toUpperCase() + name.slice(1);
//   }

//   handleIdFormatting(id) {
//     if (id > 0 && id < 10) {
//       return `#00${id}`;
//     } else if (id >= 10 && id < 100) {
//       return `#0${id}`;
//     } else {
//       return `#${id}`;
//     }
//   }

//   handleFavorite() {
//     if (!this.isFavorite) {
//       this.isFavorite = true;
//     } else if (this.isFavorite) {
//       this.isFavorite = false;
//     }
//   }
// }

const searchInput = document.getElementById("pokemon-search-input");
const searchPokemon = document.getElementById("pokemon-search-button");
const containerSuggestions = document.getElementById("pokemon-search-autocomplete");

const pokedex = new Pokedex();

//Event Listeners
searchPokemon.addEventListener("click", (e) => {
  e.preventDefault();

  let searchValue = document.getElementById("pokemon-search-input").value;
  let trimmedSearch = searchValue.trim().toLowerCase();

  if (trimmedSearch.length !== 0) {
    pokedex.init();
    searchInput.value = "";
    getPokemon(trimmedSearch);
  }
});

searchInput.addEventListener("keyup", () => {
  let searchInputValue = searchInput.value;
  let tailoredInputValue = searchInputValue.trim().toLowerCase();

  pokedex.filterPokemons(tailoredInputValue);
});

//Event Delegation

document.addEventListener("click", (e) => {
  if (e.target.id === "info-pokeball-top-shiny-toggle") {
    pokedex.handleShinyToggle(pokedex.currentPokemon);
  }

  if (e.target.id === "info-pokeball-bottom-evo-toggle") {
    pokedex.emptyNode(containerPokeballBottom);
    getEvolutions(pokedex.currentPokemon[0].speciesUrl);
  }

  if (e.target.id === "info-pokeball-bottom-moves-toggle") {
    pokedex.handleDomMovesInfo(pokedex.currentPokemon[0]);
  }

  if (e.target.className === "evolution") {
    pokedex.init();
    getPokemon(e.target.id);
  }

  if (e.target.className === "auto-search-suggestion") {
    searchInput.value = e.target.innerText;
    pokedex.filteredPokemons = [];
    pokedex.emptyNode(containerSuggestions);
    searchInput.focus();
  } else {
    pokedex.emptyNode(containerSuggestions);
  }
});

//Async Code

async function getPokemon(identifier) {
  const data = await fetch(`https://pokeapi.co/api/v2/pokemon/${identifier}`);
  if (data.status === 404) {
    pokedex.handlePokemonNotFound();
  } else {
    const response = await data.json();

    pokedex.createPokemon(response);
  }
}

async function getEvolutionData(identifier) {
  const data = await fetch(`https://pokeapi.co/api/v2/pokemon/${identifier}`);
  if (data.status === 404) return;
  const response = await data.json();

  const evoData = [response.sprites.front_default, response.name];

  return evoData;
}

async function getEvolutions(speciesUrl) {
  const data = await fetch(speciesUrl);
  const response = await data.json();

  await handleEvolutionData(response.evolution_chain.url);
  await displayEvolutions();
}

async function handleEvolutionData(chainUrl) {
  const data = await fetch(chainUrl);
  const response = await data.json();

  let evolutionChain = [];
  let evoData = response.chain;

  do {
    let baseString = evoData.species.url;
    let splicedString = baseString.slice(42, baseString.length - 1);

    evolutionChain.push({
      name: evoData.species.name,
      id: splicedString,
    });

    if (evoData.evolves_to.length > 1) {
      for (let i = 0; i < evoData.evolves_to.length; i++) {
        let baseString = evoData.evolves_to[i].species.url;
        let splicedString = baseString.slice(42, baseString.length - 1);

        evolutionChain.push({ name: evoData.evolves_to[i].species.name, id: splicedString });

        if (evoData.evolves_to[i].evolves_to.length > 0) {
          let baseStringDupe = evoData.evolves_to[i].evolves_to[0].species.url;
          let splicedStringDupe = baseStringDupe.slice(42, baseString.length - 1);

          evolutionChain.push({
            name: evoData.evolves_to[i].evolves_to[0].species.name,
            id: splicedStringDupe,
          });
        }
      }
    }

    evoData = evoData["evolves_to"][0];
  } while (!!evoData && evoData.hasOwnProperty("evolves_to"));

  let removedDuplicates = removeDuplicateObjects(evolutionChain);
  if (pokedex.currentPokemon[0].evolutionLine.length === 0) {
    removedDuplicates.forEach((evolution) =>
      pokedex.currentPokemon[0].evolutionLine.push(evolution)
    );
  }
}

async function displayEvolutions() {
  const movesSpan = document.createElement("span");
  movesSpan.textContent = "See Moves";
  movesSpan.id = "info-pokeball-bottom-moves-toggle";
  containerPokeballBottom.appendChild(movesSpan);

  const evolutionContainer = document.createElement("div");
  evolutionContainer.id = "info-pokeball-bottom-evo-container";

  for (let i = 0; i < pokedex.currentPokemon[0].evolutionLine.length; i++) {
    let evoData = await getEvolutionData(`${pokedex.currentPokemon[0].evolutionLine[i].id}`);
    if (evoData) {
      let evoImg = document.createElement("img");
      evoImg.src = evoData[0];
      evoImg.id = evoData[1];
      evoImg.className = "evolution";
      evolutionContainer.appendChild(evoImg);
    }
  }
  containerPokeballBottom.appendChild(evolutionContainer);
}

function removeDuplicateObjects(array) {
  return [...new Set(array.map((s) => JSON.stringify(s)))].map((s) => JSON.parse(s));
}

async function getPokemonNames(offset) {
  const data = await fetch(`https://pokeapi.co/api/v2/pokemon?limit=200&offset=${offset}`);
  const response = await data.json();

  response.results.forEach((result) => {
    pokedex.allPokemonNames.push(result.name);
  });
  pokedex.offset += 200;

  if (pokedex.offset >= 1200) return;
  setTimeout(() => {
    getPokemonNames(pokedex.offset);
  }, 1000);
}
getPokemonNames(pokedex.offset);
