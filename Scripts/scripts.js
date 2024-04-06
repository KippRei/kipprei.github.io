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

import {GameInfo} from "./GameInfo.js";

// This is an array of GameInfo objects
let games = [];

// TODO: check to see if then's can be removed/can be changed to clean this up
async function populateGamesArray() {
    await fetch("https://kippslab.com/docs/gamesInfo.json")
        .then((res) => res.json())
        .then((json) => {
            json.forEach(elem => {
                let newGame = new GameInfo(elem.name, elem.first_release_date, elem.cover, elem.aggregated_rating, elem.summary);
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
    let imageURL = "../Images/placeholder.png";
    
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

    // You can use console.log to help you debug!
    // View the output by right clicking on your website,
    // select "Inspect", then click on the "Console" tab
    console.log("new card:", game.getName(), "- html: ", card);
}

// This calls the addCards() function when the page is first loaded
document.addEventListener("DOMContentLoaded", populateGamesArray);

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