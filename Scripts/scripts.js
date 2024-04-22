import {GameInfo, GameCatalog} from "./Games.js";

// Changes card display depending on screen size
window.onresize=checkCardDisplay;
let screenSize = window.innerWidth > 700 ? "big" : "small";

function checkCardDisplay() {
    if (window.innerWidth <= 700 && screenSize == "big") {
        screenSize = "small";
        showCards(currGameCatalog);
    }
    else if (window.innerWidth > 700 && screenSize == "small") {
        screenSize = "big";
        showCards(currGameCatalog);
    }
}


// Create GameCatalog to hold games
const fullGameCatalog = new GameCatalog();
let currGameCatalog = fullGameCatalog;

// On page load
document.addEventListener("DOMContentLoaded", (e) => {
    // Set up sort button
    document.getElementById("sortBtn").addEventListener("click", sortBtn);

    // Set up filter by rating button
    document.getElementById("filterBtn").addEventListener("click", filterByRating);

    // Set up rating slider (filter)
    const slider = document.getElementById("ratingSlider");

    // Connects rating slider and number input box
    const sliderValNum = document.getElementById("ratingSliderNumber");
    slider.value = 0;
    sliderValNum.value = slider.value;
    slider.addEventListener("input", () => {
        sliderValNum.value = slider.value
    });
    sliderValNum.addEventListener("input", () => {
        slider.value = sliderValNum.value;
    });

    // Populates full catalog and displays
    populateFullGamesArray();
});


// Reads from json file and adds each game to full games catalog
async function populateFullGamesArray() {
    const res = await fetch("../GameData/completeGamesData.json")
    const json = await res.json();
    json.forEach(e => {
        const newGame = new GameInfo(e.name, e.first_release_date, e.coverFP, e.aggregated_rating, e.summary, e.url, e.platformsByName, e.screenshotFP);
        fullGameCatalog.addGame(newGame);
    });
    showCards(fullGameCatalog);
}

// This function adds cards the page to display the data in the array
function showCards(catalogToDisp) {
    const cardContainer = document.getElementById("card-container");
    cardContainer.textContent = "";
    const templateCard = document.querySelector(".card");
    
    const games = catalogToDisp.getGames();
    for (let i = 0; i < games.length; i++) {
        const game = games[i];
        const nextCard = templateCard.cloneNode(true); // Copy the template card
        editCardContent(nextCard, game); // Fill in card data
        nextCard.addEventListener("click", (e) => showGameDetails(game));
        cardContainer.appendChild(nextCard); // Add new card to card container
    }
}

// Fills in card info (game info)
function editCardContent(card, game) {
    if (window.innerWidth > 700) {
        card.style.display = "block";

        const cardHeader = card.querySelector("h2");
        cardHeader.textContent = game.getName();

        const cardReleaseDate = card.querySelector(".release");
        cardReleaseDate.textContent += game.getReleaseDate();

        const cardGameRating = card.querySelector(".rating");
        cardGameRating.textContent += (game.getRating() != 0 ? game.getRating() : 'N/A');

        const cardImage = card.querySelector("img");
        cardImage.src = window.location.protocol + game.getCover();
        cardImage.alt = game.getName() + " Cover";
    }
    else {
        card.style.display = "block";

        const cardHeader = card.querySelector("h2");
        cardHeader.textContent = "";

        const cardReleaseDate = card.querySelector(".release");
        cardReleaseDate.textContent = "";

        const cardGameRating = card.querySelector(".rating");
        cardGameRating.textContent = "";

        const cardImage = card.querySelector("img");
        cardImage.style.display = "block";
        cardImage.style.marginLeft = "auto";
        cardImage.style.marginRight = "auto";
        cardImage.style.height = "290px";
        cardImage.style.border = "thick solid rgba(0, 0, 0, .5)";
        cardImage.style.borderRadius = "10px";
        cardImage.src = window.location.protocol + game.getCover();
        cardImage.alt = game.getName() + " Cover";

        card.style.height = "300px";
        card.style.width = "auto";
        card.style.background = "none";
        card.style.border = "none";
    }
}

// When game is clicked, shows game details in a modal/popup
function showGameDetails(game) {
    const modal = document.getElementById("detailsModal");
    modal.style.display = "block";
    const closeBtn = document.getElementById("closeModalBtn");
    const leftImgBtn = document.getElementById("m_leftBtn");
    const rightImgBtn = document.getElementById("m_rightBtn");
    const imgCounterText = document.getElementById("m_imgCounter")
    const totalImages = game.getScreenshots().length;
    let currImg = -1;

    const title = document.getElementById("m_gameTitle");
    const rating = document.getElementById("m_rating");
    const relDate = document.getElementById("m_release");
    const description = document.getElementById("m_description");
    const website = document.getElementById("m_website");
    const img = document.getElementById("m_img");
    const platforms = document.getElementById("m_platforms");

    img.src = window.location.protocol + game.getCover();
    imgCounterText.textContent = (currImg + 2) + "/" + (totalImages + 1);
    title.textContent = game.getName();
    rating.textContent = (game.getRating() != 0 ? game.getRating() : 'N/A');
    relDate.textContent = game.getReleaseDate();
    description.textContent = game.getDescription();

    const platArr = game.getPlatforms();
    platforms.textContent = "";
    for (let i = 0; i < platArr.length; i++) {
        platforms.textContent += platArr[i];
        if (i < platArr.length - 1) {
            platforms.textContent += ", ";
        }
    }
    website.setAttribute("href", game.getWebsite());
    website.textContent = game.getWebsite();

    closeBtn.onclick = () => {
        modal.style.display = "none";
    }

    window.onclick = (event) => {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    leftImgBtn.onclick = () => {
        currImg--;
        if (currImg == -2) {
            currImg = totalImages - 1;
        }
        
        if (currImg == -1) {
            img.src = window.location.protocol + game.getCover();
        }
        else {
            img.src = window.location.protocol + game.getScreenshots()[currImg];
        }

        imgCounterText.textContent = (currImg + 2) + "/" + (totalImages + 1);
    }

    rightImgBtn.onclick = () => {
        currImg++;
        if (currImg == totalImages) {
            currImg = -1;
            img.src = window.location.protocol + game.getCover();
        }
        else {
            img.src = window.location.protocol + game.getScreenshots()[currImg];
        }

        imgCounterText.textContent = (currImg + 2) + "/" + (totalImages + 1);
    }
}

// Gets user filter selection(s)
function sortBtn() {
    const sortType = document.getElementById("sortTypes").value;
    currGameCatalog.sortGames(sortType);
    showCards(currGameCatalog);
}

// Filters by minimum
function filterByRating() {
    const rating = document.getElementById("ratingSlider").value;
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
    sortBtn();
}