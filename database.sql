USE ete32e_2425zs_13;

CREATE TABLE IF NOT EXISTS games (
                                     id INT AUTO_INCREMENT PRIMARY KEY,
                                     title VARCHAR(255) NOT NULL UNIQUE,
    description TEXT NOT NULL,
    rules TEXT NOT NULL,
    image VARCHAR(255) NOT NULL,
    favorite BOOLEAN DEFAULT FALSE,
    releaseYear INT NOT NULL,
    difficulty INT NOT NULL,
    genre VARCHAR(100) NOT NULL,
    playerCount INT NOT NULL,
    reviewScore DECIMAL(3,1) NOT NULL
    );

CREATE TABLE IF NOT EXISTS game_images (
                                           id INT AUTO_INCREMENT PRIMARY KEY,
                                           game_id INT NOT NULL,
                                           image VARCHAR(255) NOT NULL,
    FOREIGN KEY (game_id) REFERENCES games(id) ON DELETE CASCADE
    );

CREATE TABLE IF NOT EXISTS reviews (
                                       id INT AUTO_INCREMENT PRIMARY KEY,
                                       title VARCHAR(255) NOT NULL UNIQUE,
    text TEXT NOT NULL,
    image VARCHAR(255) NOT NULL
    );

INSERT INTO games (title, description, rules, image, favorite, releaseYear, difficulty, genre, playerCount, reviewScore)
VALUES ('Mystic Realms',
        'Dobrodružná fantasy hra, ve které hráči objevují tajemná území a čelí nebezpečím, aby získali magické artefakty.',
        'Hráči se střídají v tazích, během kterých pohybují figurkami, získávají karty událostí a bojují s nepřáteli pomocí hodu kostkami.',
        'mystic_realms.png', 1, 2024, 3, 'Fantasy', 4, 8.7),
       ('Galactic Traders',
        'Ekonomická strategie zasazená do vesmíru, kde hráči obchodují se zbožím mezi planetami a snaží se ovládnout galaxii.',
        'Každé kolo probíhá fáze obchodování, přesunu lodí a vyjednávání. Cílem je nasbírat co nejvíce kreditů.',
        'galactic_traders.png', 0, 2020, 4, 'Sci-Fi', 3, 8.2),
       ('Castle Siege',
        'Historická hra zaměřená na obléhání hradů, kde se jeden tým brání a druhý útočí s různými jednotkami.',
        'Hráči si připraví obranu nebo útok, využívají balíček karet a házejí kostkami pro výsledek soubojů.',
        'castle_siege.png', 0, 2024, 2, 'Strategy', 2, 7.8),
       ('Potion Masters',
        'Rodinná hra plná magie, ve které hráči míchají lektvary, sbírají přísady a snaží se stát nejlepším alchymistou.',
        'Ve svém tahu si hráč bere ingredience z herního plánu a pokouší se zkompletovat receptury, aby získal body.',
        'potion_masters.png', 1, 2022, 1, 'Family', 4, 9.0),
       ('Expedition: LJ',
        'Dobrodružná hra, kde hráči vedou expedici skrz neprozkoumanou džungli, čelí pastem a hledají ztracený chrám.',
        'Každé kolo hráči postupují na mapě, čelí kartám nebezpečí a rozhodují se, zda pokračovat nebo se vrátit.',
        'expedition:_lost_jungle.png', 0, 2021, 3, 'Adventure', 5, 8.5),
       ('Steam Rivals',
        'Strategická hra z viktoriánské éry, kde hráči soupeří o kontrolu nad parními vynálezy a továrnami v alternativní historii.',
        'Hráči získávají suroviny, staví stroje a zlepšují své impérium pomocí taktické nabídky akcí a správy zdrojů.',
        'steam_rivals.png',
        0, 2024, 3, 'Strategy', 4, 8.3),
       ('Chrono Clash',
        'Cestování časem a taktické souboje napříč epochami. Hráči vysílají jednotky do minulosti i budoucnosti a mění dějiny.',
        'Každý hráč má k dispozici sadu karet reprezentujících jednotky, události a vývoj technologie napříč čtyřmi časovými érami.',
        'chrono_clash.png',
        1, 2023, 4, 'Sci-Fi', 2, 8.9),
       ('Beast Grove',
        'Magická soutěž mezi strážci prastarého lesa, kde hráči povolávají zvířecí spojence a chrání posvátný háj.',
        'Hráči vybírají z balíčku duchů lesa, každý tah ovlivňuje rovnováhu mezi růstem a obranou, vítězí ten, kdo přežije nejvíce sezón.',
        'beast_grove.png',
        0, 2021, 2, 'Fantasy', 3, 8.0),
       ('Code Havoc',
        'Rychlá karetní hra na motivy počítačového světa, kde hráči sabotují a programují virtuální systémy v závodu o nadvládu nad síťovým uzlem.',
        'Hra probíhá v kolech, kde hráči přikládají akční karty, získávají data, brání se virům a snaží se dokončit úspěšný program.',
        'code_havoc.png',
        0, 2022, 2, 'Card Game', 4, 7.7),
       ('Skyline Syndicate',
        'V dystopickém městě budoucnosti se hráči stanou hlavami zločineckých organizací, bojují o vliv a kontrolu nad výškovými sektory.',
        'Hra kombinuje kontrolu území s vyjednáváním, hráči ovládají čtvrti, uplácejí politiky a najímají specialisty.',
        'skyline_syndicate.png',
        1, 2020, 3, 'Strategy', 5, 8.4);


INSERT INTO reviews (title, text, image)
VALUES ('Test 1 Review', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...', 'icon.ico'),
       ('Test 2 Review', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...', 'icon.ico'),
       ('Test 3 Review', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...', 'icon.ico');