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

-- TODO update data
INSERT INTO games (title, description, rules, image, favorite, releaseYear, difficulty, genre, playerCount, reviewScore)
VALUES
    ('Test 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...', 'Lorem ipsum dolor sit amet...', 'icon.ico', 0, 2020, 1, 'Genre 1', 4, 7.5),
    ('Test 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...', 'Lorem ipsum dolor sit amet...', 'icon.ico', 1, 2021, 2, 'Genre 2', 2, 8.5),
    ('Test 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...', 'Lorem ipsum dolor sit amet...', 'icon.ico', 0, 2020, 3, 'Genre 3', 6, 9.5),
    ('Test 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...', 'Lorem ipsum dolor sit amet...', 'icon.ico', 0, 2022, 1, 'Genre 2', 2, 7.0),
    ('Test 5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...', 'Lorem ipsum dolor sit amet...', 'icon.ico', 1, 2024, 2, 'Genre 1', 4, 6.0);

INSERT INTO reviews (title, text, image)
VALUES
    ('Test 1 Review', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...', 'icon.ico'),
    ('Test 2 Review', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...', 'icon.ico'),
    ('Test 3 Review', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...', 'icon.ico');