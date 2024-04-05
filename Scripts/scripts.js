/**
 * Data Catalog Project Starter Code - SEA Stage 2
 *
 * This file is where you should be doing most of your work. You should
 * also make changes to the HTML and CSS files, but we want you to prioritize
 * demonstrating your understanding of data structures, and you'll do that
 * with the JavaScript code you write in this file.
 * 
 * The comments in this file are only to help you learn how the starter code
 * works. The instructions for the project are in the README. That said, here
 * are the three things you should do first to learn about the starter code:
 * - 1 - Change something small in index.html or style.css, then reload your 
 *    browser and make sure you can see that change. 
 * - 2 - On your browser, right click anywhere on the page and select
 *    "Inspect" to open the browser developer tools. Then, go to the "console"
 *    tab in the new window that opened up. This console is where you will see
 *    JavaScript errors and logs, which is extremely helpful for debugging.
 *    (These instructions assume you're using Chrome, opening developer tools
 *    may be different on other browsers. We suggest using Chrome.)
 * - 3 - Add another string to the titles array a few lines down. Reload your
 *    browser and observe what happens. You should see a fourth "card" appear
 *    with the string you added to the array, but a broken image.
 * 
 */

class GameInfo {
    #name;
    #releaseDate;
    #cover;
    #rating;
    #description;
    
    constructor(name, releaseDate, cover, rating, description) {
        this.#name = name;
        this.#releaseDate = releaseDate;
        this.#cover = cover;
        this.#rating = rating;
        this.#description = description;
    }

    setName(name) {
        this.#name = name;
    }

    getName() {
        return this.#name;
    }

    setReleaseDate(date) {
        this.#releaseDate = date;
    }

    getReleaseDate() {
        return this.#releaseDate;
    }

    setCover(cover) {
        this.#cover = cover;
    }

    getCover() {
        return this.#cover;
    }

    setRating(rating) {
        this.#rating = rating;
    }

    getRating() {
        return this.#rating;
    }

    setDescription(description) {
        this.#description = description;
    }

    getDescription() {
        return this.#description;
    }
}

// This is an array of GameInfo objects
let games = [];

async function populateGamesArray() {
    await fetch("https://kippslab.com/docs/gamesInfo.json")
        .then((res) => res.json())
        .then((json) => {
            json.forEach(elem => {
                newGame = new GameInfo(elem.name, new Date(elem.first_release_date * 1000), elem.cover, elem.aggregated_rating, elem.summary);
                games.push(newGame);
            });
        });
        
        console.log(games);
        showCards();
}

// This function adds cards the page to display the data in the array
function showCards() {
    const cardContainer = document.getElementById("card-container");
    cardContainer.innerHTML = "";
    const templateCard = document.querySelector(".card");
    let imageURL = "";
    
    for (let i = 0; i < games.length; i++) {
        let game = games[i];

        const nextCard = templateCard.cloneNode(true); // Copy the template card
        editCardContent(nextCard, game, imageURL); // Edit title and image
        nextCard.addEventListener("click", (e) => showGameDetails(game));
        nextCard.addEventListener("mouseover", (e) => {
            e.target.style.backgroundColor = "black";
        });
        nextCard.addEventListener("mouseleave", (e) => {
            e.target.style.backgroundColor = "white";
        });
        cardContainer.appendChild(nextCard); // Add new card to the container
    }
}

function editCardContent(card, newTitle, newImageURL) {
    card.style.display = "block";

    // const cardHeader = card.querySelector("h2");
    // cardHeader.textContent = newTitle;

    const cardImage = card.querySelector("img");
    cardImage.src = newImageURL;
    cardImage.alt = newTitle + " Poster";

    // You can use console.log to help you debug!
    // View the output by right clicking on your website,
    // select "Inspect", then click on the "Console" tab
    console.log("new card:", newTitle, "- html: ", card);
}

// This calls the addCards() function when the page is first loaded
document.addEventListener("DOMContentLoaded", populateGamesArray);

function showGameDetails(game) {
    console.log("Button Clicked!")
    alert(game);
}

function removeLastCard() {
    titles.pop(); // Remove last item in titles array
    showCards(); // Call showCards again to refresh
}
