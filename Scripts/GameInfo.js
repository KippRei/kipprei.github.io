export class GameInfo {
    #name;
    #releaseDate;
    #cover;
    #rating;
    #description;

    constructor(name, releaseDate, cover, rating, description) {
        this.#name = name;
        if (releaseDate != undefined) {
            let date = new Date(releaseDate * 1000);
            let relDate = "Release Date: " + date.getDay() + "/" + date.getDate() + "/" + date.getFullYear();
            this.#releaseDate = relDate;
        }
        else {
            this.#releaseDate = "Release Date: Unknown";
        }
        this.#cover = cover;
        rating != undefined ? this.#rating = "Rating: " + Math.round(rating) : this.#rating = "Rating: N/A";
        this.#description = description;
    }

    setName(name) {
        this.#name = name;
    }

    getName() {
        return this.#name;
    }

    setReleaseDate(releaseDate) {
        if (releaseDate != undefined) {
            let date = new Date(releaseDate * 1000);
            let relDate = "Release Date: " + date.getDay() + "/" + date.getDate() + "/" + date.getFullYear();
            this.#releaseDate = relDate;
        }
        else {
            this.#releaseDate = "Release Date: Unknown";
        }
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
        rating != undefined ? this.#rating = "Rating: " + rating : this.#rating = "Rating: N/A";
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