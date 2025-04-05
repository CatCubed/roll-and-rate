window.addEventListener("DOMContentLoaded", () => {
    const gameContainer = document.getElementById("gameContainer");
    const filterYear = document.getElementById("filterYear");
    const filterDifficulty = document.getElementById("filterDifficulty");
    const filterGenre = document.getElementById("filterGenre");
    const filterPlayerCount = document.getElementById("filterPlayerCount");
    const sortCriteria = document.getElementById("sortCriteria");

    const toggleMenuButton = document.getElementById("toggleMenuButton");

    var toggle = false;
    toggleMenuButton.addEventListener("click", () => {
        if (toggle === false) {
            filterYear.style.display = "flex";
            filterDifficulty.style.display = "flex";
            filterGenre.style.display = "flex";
            filterPlayerCount.style.display = "flex";
            toggle = true;
        } else {
            filterYear.style.display = "none";
            filterDifficulty.style.display = "none";
            filterGenre.style.display = "none";
            filterPlayerCount.style.display = "none";
            toggle = false;
        }
    });

    // Initial setup to hide the container
    filterYear.style.display = "none";
    filterDifficulty.style.display = "none";
    filterGenre.style.display = "none";
    filterPlayerCount.style.display = "none";

    function populateFilters() {
        const years = [...new Set(games.map(game => game.releaseYear))];
        const difficulties = [...new Set(games.map(game => game.difficulty))];
        const genres = [...new Set(games.map(game => game.genre))];
        const playerCounts = [...new Set(games.map(game => game.playerCount))];

        years.forEach(year => {
            const option = document.createElement("option");
            option.value = year;
            option.textContent = year;
            filterYear.appendChild(option);
        });

        difficulties.forEach(difficulty => {
            const option = document.createElement("option");
            option.value = difficulty;
            option.textContent = difficulty;
            filterDifficulty.appendChild(option);
        });

        genres.forEach(genre => {
            const option = document.createElement("option");
            option.value = genre;
            option.textContent = genre;
            filterGenre.appendChild(option);
        });

        playerCounts.forEach(count => {
            const option = document.createElement("option");
            option.value = count;
            option.textContent = count;
            filterPlayerCount.appendChild(option);
        });
    }

    function displayGames(filteredGames) {
        gameContainer.innerHTML = ""; // Clear container
        filteredGames.forEach(game => {
            const card = document.createElement("a");
            card.href = "game-details.html?title=" + game.title;
            card.innerHTML = `
      <img width="90" height="120" src="https://placehold.co/90x120"  alt="game picture"/>
<!--      <img src="resources/${game.image}"  alt=""/>-->
      <div class="game_details__rating">
        <span class="game_details__rating__star">⭐</span>
        <span>${game.reviewScore.toFixed(1)}</span>
      </div>
      <h2>${game.title}</h2>
      <h3>Rok vydání: ${game.releaseYear}</h3>
      <h3>Obtížnost: ${game.difficulty}</h3>
      <h3>Žánr: ${game.genre}</h3>
      <h3>Max. počet hráčů: ${game.playerCount}</h3>
    `;

            gameContainer.appendChild(card);
        });
    }

    function sortGames(games, criteria) {
        const sortedGames = [...games];

        switch (criteria) {
            case "title-asc":
                return sortedGames.sort((a, b) => a.title.localeCompare(b.title));
            case "title-desc":
                return sortedGames.sort((a, b) => b.title.localeCompare(a.title));
            case "releaseYear-asc":
                return sortedGames.sort((a, b) => a.releaseYear - b.releaseYear);
            case "releaseYear-desc":
                return sortedGames.sort((a, b) => b.releaseYear - a.releaseYear);
            case "difficulty-asc":
                return sortedGames.sort((a, b) => a.difficulty - b.difficulty);
            case "difficulty-desc":
                return sortedGames.sort((a, b) => b.difficulty - a.difficulty);
            case "playerCount-asc":
                return sortedGames.sort((a, b) => a.playerCount - b.playerCount);
            case "playerCount-desc":
                return sortedGames.sort((a, b) => b.playerCount - a.playerCount);
            case "reviewScore-asc":
                return sortedGames.sort((a, b) => a.reviewScore - b.reviewScore);
            case "reviewScore-desc":
                return sortedGames.sort((a, b) => b.reviewScore - a.reviewScore);
            case "favorite-desc":
                return sortedGames.sort((a, b) => b.favorite - a.favorite);
            default:
                return sortedGames;
        }
    }

    function filterAndSortGames() {
        let filteredGames = games;

        const year = filterYear.value;
        const difficulty = filterDifficulty.value;
        const genre = filterGenre.value;
        const playerCount = filterPlayerCount.value;

        if (year) filteredGames = filteredGames.filter(game => game.releaseYear == year);
        if (difficulty) filteredGames = filteredGames.filter(game => game.difficulty == difficulty);
        if (genre) filteredGames = filteredGames.filter(game => game.genre == genre);
        if (playerCount) filteredGames = filteredGames.filter(game => game.playerCount == playerCount);

        const sortBy = sortCriteria.value;
        filteredGames = sortGames(filteredGames, sortBy);

        displayGames(filteredGames);
    }

    filterYear.addEventListener("change", filterAndSortGames);
    filterDifficulty.addEventListener("change", filterAndSortGames);
    filterGenre.addEventListener("change", filterAndSortGames);
    filterPlayerCount.addEventListener("change", filterAndSortGames);
    sortCriteria.addEventListener("change", filterAndSortGames);

    populateFilters();
    displayGames(games);
});
