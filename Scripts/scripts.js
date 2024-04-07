import {GameInfo, GameCatalog} from "./Games.js";

// Create GameCatalog to hold games
let fullGameCatalog = new GameCatalog();
let currGameCatalog = fullGameCatalog;

// On page load
document.addEventListener("DOMContentLoaded", (e) => {
    // Set up sort button
    document.getElementById("sortBtn").addEventListener("click", sortBtn);

    // Set up sort button
    document.getElementById("filterBtn").addEventListener("click", filterByRating);

    // Set up rating slider (filter)
    let slider = document.getElementById("ratingSlider");
    let sliderValText = document.getElementById("ratingSliderText");
    sliderValText.innerHTML = slider.value;
    slider.addEventListener("input", (e) => {
        if (slider.value == 0) {
            sliderValText.innerHTML = "N/A";
        }
        else {
            sliderValText.innerHTML = slider.value;
        }
    });

    // Populates full catalog and displays
    populateFullGamesArray();
});


// Reads from json file and adds each game to full games catalog
async function populateFullGamesArray() {
    let res = await fetch("../GameData/gamesInfo.json")
    let json = await res.json();
    json.forEach(elem => {
        let newGame = new GameInfo(elem.name, elem.first_release_date, elem.cover, elem.aggregated_rating, elem.summary);
        fullGameCatalog.addGame(newGame);
    });
    showCards(fullGameCatalog);
}

// This function adds cards the page to display the data in the array
function showCards(catalogToDisp) {
    const cardContainer = document.getElementById("card-container");
    cardContainer.innerHTML = "";
    const templateCard = document.querySelector(".card");
    let imageURL = "../Images/placeholder.png";
    
    let games = catalogToDisp.getGames();
    for (let i = 0; i < games.length; i++) {
        let game = games[i];

        const nextCard = templateCard.cloneNode(true); // Copy the template card
        editCardContent(nextCard, game, imageURL); // Edit title and image
        nextCard.addEventListener("click", (e) => showGameDetails(game));
        cardContainer.appendChild(nextCard); // Add new card to card container
    }
}

// Fills in card info (game info)
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

// When game is clicked, shows game details in a modal/popup
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

    let title = document.getElementById("m_gameTitle");
    let rating = document.getElementById("m_rating");
    let relDate = document.getElementById("m_release");
    let description = document.getElementById("m_description");
    let img = document.getElementById("m_img");

    img.src = "../Images/placeholder.png";
    title.innerHTML = game.getName();
    rating.innerHTML = game.getRating();
    relDate.innerHTML = game.getReleaseDate();
    description.innerHTML = "Summary: " + game.getDescription();

}

// Gets user filter selection(s)
function sortBtn() {
    let sortType = document.getElementById("sortTypes").value;
    currGameCatalog.sortGames(sortType);
    showCards(currGameCatalog);
}

function filterByRating() {
    let rating = document.getElementById("ratingSlider").value;
    let newCatalog = new GameCatalog();
    if (rating == 0) {
        newCatalog = fullGameCatalog;
    }
    else {
        fullGameCatalog.getGames().forEach(e => {
            if (e.getRawRating() >= rating) {
                newCatalog.addGame(e);
            }
        });
    }

    currGameCatalog = newCatalog;
    showCards(newCatalog);
}