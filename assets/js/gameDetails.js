function getQueryParams() {
    const params = {};
    const queryString = window.location.search.slice(1);
    queryString.split("&").forEach(param => {
        const [key, value] = param.split("=");
        params[key] = decodeURIComponent(value);
    });
    return params;
}

function loadGameDetails() {
    const {title} = getQueryParams();

    const game = games.find(game => game.title === title);

    if (!game) {
        document.getElementById("gameDetailsContainer").innerHTML = "<p>Deskovka nenalezena :(</p>";
        return;
    }

    const imagesHtml = game.images
        // .map(img => `<img src="resources/${img.image}" alt="${game.title}" class="game-detail-image">`)
        .map(img => `<img src="https://placehold.co/400x200" alt="${game.title}" class="game-detail-image">`)
        .join("");

    document.getElementById("gameDetailsContainer").innerHTML = `
    <div class="game_details__main">
        <!--    <img src="resources/${game.image}"  alt=""/>-->
        <img src="https://placehold.co/500x250"  alt=""/>
        <div class="game_details__info">
            <h1>${game.title}</h1>
            <p><strong>Rok vydání:</strong> ${game.releaseYear}</p>
            <p><strong>Obtížnost:</strong> ${game.difficulty}</p>
            <p><strong>Žánr:</strong> ${game.genre}</p>
            <p><strong>Maximální počet hráčů:</strong> ${game.playerCount}</p>
        </div>
        <div class="game_details__rating">
            <span class="game_details__rating__star">⭐</span>
            <span>${game.reviewScore.toFixed(1)}</span>
        </div>
    </div>
    <div class="game_details__description">
        <p><strong>Popis:</strong> ${game.description}</p>
    </div>
    <div class="game_details__images">${imagesHtml}</div>
    <div class="game_details__rules">
        <p><strong>Pravidla:</strong> ${game.rules}</p>
    </div>
  `;
}

window.addEventListener("DOMContentLoaded", loadGameDetails);