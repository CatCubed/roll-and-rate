const games = [
    {
        title: 'Test 1',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        rules: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        image: 'icon.ico',
        favorite: false,
        releaseYear: 2020,
        difficulty: 1,
        genre: 'Genre 1',
        playerCount: 4,
        reviewScore: 7.5,
        images: [
            {
                image: 'icon.ico',
            },
            {
                image: 'icon.ico',
            },
            {
                image: 'icon.ico',
            },
        ]
    },
    {
        title: 'Test 2',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        rules: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        image: 'icon.ico',
        favorite: true,
        releaseYear: 2021,
        difficulty: 2,
        genre: 'Genre 2',
        playerCount: 2,
        reviewScore: 8.5,
        images: [
            {
                image: 'icon.ico',
            },
        ]
    },
    {
        title: 'Test 3',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        rules: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        image: 'icon.ico',
        favorite: false,
        releaseYear: 2020,
        difficulty: 3,
        genre: 'Genre 3',
        playerCount: 6,
        reviewScore: 9.5,
        images: [
            {
                image: 'icon.ico',
            },
            {
                image: 'icon.ico',
            },
            {
                image: 'icon.ico',
            },
        ]
    },
    {
        title: 'Test 4',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        rules: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        image: 'icon.ico',
        favorite: false,
        releaseYear: 2022,
        difficulty: 1,
        genre: 'Genre 2',
        playerCount: 2,
        reviewScore: 7.0,
        images: [
            {
                image: 'icon.ico',
            },
            {
                image: 'icon.ico',
            },
            {
                image: 'icon.ico',
            },
        ]
    },
    {
        title: 'Test 5',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        rules: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        image: 'icon.ico',
        favorite: true,
        releaseYear: 2024,
        difficulty: 2,
        genre: 'Genre 1',
        playerCount: 4,
        reviewScore: 6.0,
        images: [
            {
                image: 'icon.ico',
            },
            {
                image: 'icon.ico',
            },
            {
                image: 'icon.ico',
            },
        ]
    },
    {
        title: 'Test 6',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        rules: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        image: 'icon.ico',
        favorite: false,
        releaseYear: 2023,
        difficulty: 3,
        genre: 'Genre 5',
        playerCount: 4,
        reviewScore: 8.5,
        images: [
            {
                image: 'icon.ico',
            },
            {
                image: 'icon.ico',
            },
        ]
    },
    {
        title: 'Test 7',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        rules: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        image: 'icon.ico',
        favorite: false,
        releaseYear: 2024,
        difficulty: 1,
        genre: 'Genre 1',
        playerCount: 4,
        reviewScore: 6.5,
        images: [
            {
                image: 'icon.ico',
            },
            {
                image: 'icon.ico',
            },
            {
                image: 'icon.ico',
            },
        ]
    },
    {
        title: 'Test 8',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        rules: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        image: 'icon.ico',
        favorite: true,
        releaseYear: 2022,
        difficulty: 1,
        genre: 'Genre 1',
        playerCount: 8,
        reviewScore: 10.0,
        images: [
            {
                image: 'icon.ico',
            },
        ]
    },
    {
        title: 'Test 9',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        rules: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        image: 'icon.ico',
        favorite: true,
        releaseYear: 2020,
        difficulty: 1,
        genre: 'Genre 6',
        playerCount: 6,
        reviewScore: 7.5,
        images: [
            {
                image: 'icon.ico',
            },
            {
                image: 'icon.ico',
            },
            {
                image: 'icon.ico',
            },
        ]
    },
    {
        title: 'Test 10',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        rules: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        image: 'icon.ico',
        favorite: true,
        releaseYear: 2023,
        difficulty: 2,
        genre: 'Genre 2',
        playerCount: 2,
        reviewScore: 8.5,
        images: [
            {
                image: 'icon.ico',
            },
            {
                image: 'icon.ico',
            },
        ]
    },
];

const gameSectionNewReleases = document.getElementById('game-section-new-releases');
const gameSectionUpcoming = document.getElementById('game-section-upcoming');
const gameSectionTop2024 = document.getElementById('game-section-top-2024');

const favoriteSection = document.getElementById('favorite-section');

const createGameItem = (game) => {
    const gameItem = document.createElement('a');
    gameItem.href = `game-details.html?title=${encodeURIComponent(game.title)}`;
    gameItem.className = 'game_section__item';

    const img = document.createElement('img');
    img.src = 'https://placehold.co/150x200';
    img.alt = 'game picture'

    const divText = document.createElement('div');
    divText.className = 'game_section__item__text';
    divText.innerHTML = `
        ⭐ ${game.reviewScore}<br>
        <div style="font-size: 20px; ">${game.title}<br></div>
        Max. počet hráčů: ${game.playerCount}<br>
        Rok vydání: ${game.releaseYear}<br>
        Obtížnost: ${game.difficulty}
    `;

    gameItem.appendChild(img);
    gameItem.appendChild(divText);

    return gameItem;
};

if (gameSectionNewReleases) {
    const sortedNewReleases = [...games].sort((a, b) => b.releaseYear - a.releaseYear);
    sortedNewReleases.forEach(game => {
        gameSectionNewReleases.appendChild(createGameItem(game));
    });
}

if (gameSectionUpcoming) {
    const sortedUpcoming = [...games].sort((a, b) => a.title.localeCompare(b.title));
    sortedUpcoming.forEach(game => {
        gameSectionUpcoming.appendChild(createGameItem(game));
    });
}

if (gameSectionTop2024) {
    const sortedTop2024 = [...games]
        .filter(game => game.releaseYear === 2024)
        .sort((a, b) => b.reviewScore - a.reviewScore);
    sortedTop2024.forEach(game => {
        gameSectionTop2024.appendChild(createGameItem(game));
    });
}

if (favoriteSection) {
    const sortedFavorites = [...games]
        .filter(game => game.favorite)
        .sort((a, b) => a.title.localeCompare(b.title));
    sortedFavorites.forEach(game => {
        const favoriteGameItem = createGameItem(game);
        favoriteGameItem.className = 'grid__item bg-dark game_section__item';
        favoriteSection.appendChild(favoriteGameItem);
    });
}