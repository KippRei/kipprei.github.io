import {GameInfo, GameCatalog} from "./Games.js";

// Create GameCatalog to hold games
let gameCatalog = new GameCatalog();

// This calls the addCards() function when the page is first loaded
document.addEventListener("DOMContentLoaded", populateGamesArray);

async function populateGamesArray() {
    let res = await fetch("../GameData/gamesInfo.json")
    let json = await res.json();
    json.forEach(elem => {
        let newGame = new GameInfo(elem.name, elem.first_release_date, elem.cover, elem.aggregated_rating, elem.summary);
        gameCatalog.addGame(newGame);
    });
    showCards();
}

// This function adds cards the page to display the data in the array
function showCards() {
    const cardContainer = document.getElementById("card-container");
    cardContainer.innerHTML = "";
    const templateCard = document.querySelector(".card");
    let imageURL = "../Images/placeholder.png";
    
    let games = gameCatalog.getGames();
    for (let i = 0; i < games.length; i++) {
        let game = games[i];

        const nextCard = templateCard.cloneNode(true); // Copy the template card
        editCardContent(nextCard, game, imageURL); // Edit title and image
        nextCard.addEventListener("click", (e) => showGameDetails(game));
        // nextCard.addEventListener("mouseover", (e) => {
        //     e.target.style.backgroundColor = "black";
        // });
        // nextCard.addEventListener("mouseleave", (e) => {
        //     e.target.style.backgroundColor = "white";
        // });
        cardContainer.appendChild(nextCard); // Add new card to the container
    }
}

function editCardContent(card, game, newImageURL) {
    card.style.display = "block";

    const cardHeader = card.querySelector("h2");
    cardHeader.textContent = game.getName();

    const cardReleaseDate = card.querySelector(".release");
    cardReleaseDate.textContent = game.getReleaseDate();

    const cardGameRating = card.querySelector(".rating");
    cardGameRating.textContent = game.getRating();

    const cardImage = card.querySelector("img");
    cardImage.src = newImageURL;
    cardImage.alt = game.getName() + " Cover";
}

function showGameDetails(game) {
    let modal = document.getElementById("detailsModal");
    modal.style.display = "block";
    let closeBtn = document.getElementById("closeModalBtn");

    closeBtn.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}

function filterBtn() {
    console.log("sorting");
    gameCatalog.sortGames("RatingAsc");
    showCards();
}