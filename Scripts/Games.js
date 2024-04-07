// Holds information for an individual game
export class GameInfo {
    #name;
    #releaseDate;
    #unixRelDate;
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
        this.#unixRelDate = releaseDate;
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

    // This is used for easier sorting
    getUnixReleaseDate() {
        return this.#unixRelDate;
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

// Container for all games
export class GameCatalog {
    #games = [];

    addGame(game) {
        this.#games.push(game);
    }

    getGames() {
        return this.#games;
    }

    sortGames(compareVal) {
        let arr = [];
        switch (compareVal) {
            case 'NameAsc':
                this.#games.forEach(e => {
                    arr.push(e.getName());
                });
                this.#quickSort(arr, 0, arr.length-1);
                break;
            case 'NameDesc':
                this.#games.forEach(e => {
                    arr.push(e.getName());
                });
                this.#quickSort(arr, 0, arr.length-1);
                this.#games.reverse();
                break;
            case 'RatingAsc':
                this.#games.forEach(e => {
                    arr.push(e.getRating());
                });
                this.#quickSort(arr, 0, arr.length-1);
                break;
            case 'RatingDesc':
                this.#games.forEach(e => {
                    arr.push(e.getRating());
                });
                this.#quickSort(arr, 0, arr.length-1);
                this.#games.reverse();
                break;
            case 'RelDateAsc':
                this.#games.forEach(e => {
                    arr.push(e.getUnixReleaseDate());
                });
                this.#quickSort(arr, 0, arr.length-1);
                break;
            case 'RelDateDesc':
                this.#games.forEach(e => {
                    arr.push(e.getUnixReleaseDate());
                });
                this.#quickSort(arr, 0, arr.length-1);
                this.#games.reverse();
                break;
        }
    }

    // Quicksort game catalog based on given comparison value
    // Swaps both arr values and this.#games values
    #quickSort(arr, low, high) {
        if (low >= high) {
        return;
        }

        let lowEndIndex = this.#partition(arr, low, high);
        this.#quickSort(arr, low, lowEndIndex);
        this.#quickSort(arr, lowEndIndex + 1, high);
    }

    #partition(arr, low, high) {
        let pivotIndex = low + Math.floor((high - low) / 2);
        let pivot = arr[pivotIndex];

        let done = false;
        while (!done) {
            while (arr[low] < pivot) {
                low++;
            }
            while (arr[high] > pivot) {
                high--;
            }
            
            if (low >= high) {
                done = true;
            }
            else {
                let temp = arr[low];
                arr[low] = arr[high];
                arr[high] = temp;
                let cTemp = this.#games[low];
                this.#games[low] = this.#games[high];
                this.#games[high] = cTemp;
                low++;
                high--;
            }
        }
        return high;
    }
}