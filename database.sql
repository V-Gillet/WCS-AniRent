CREATE TABLE
    animal (
        `id` INT AUTO_INCREMENT PRIMARY KEY,
        `name` VARCHAR(255) NOT NULL,
        `image` TEXT NOT NULL,
        `price_rate` FLOAT NOT NULL
    );

INSERT INTO
    animal(`name`, `image`, `price_rate`)
VALUES (
        'Camel Spider',
        './assets/images/spider.png',
        1.5
    ), (
        'Llama',
        './assets/images/lama.png',
        2.5
    ), (
        'Prairie Dog',
        './assets/images/dog.svg',
        2.5
    ), (
        'Leopard Cat',
        './assets/images/cat.svg',
        3.5
    ), (
        'Painted Turtle',
        './assets/images/turtle.png',
        0.5
    ), (
        'Giraffe',
        './assets/images/giraffe.svg',
        2.5
    ), (
        'Flying Squirrel',
        './assets/images/squirrel.jpeg',
        2
    ), (
        'Mosquito',
        './assets/images/mosquito.svg',
        0.5
    ), (
        'Sea Eagle',
        './assets/images/eagle.svg',
        5
    ), (
        'Snowy Owl',
        './assets/images/owl.png',
        3.5
    );

CREATE TABLE
    user (
        `id` INT AUTO_INCREMENT PRIMARY KEY,
        `firstname` VARCHAR(150) NOT NULL,
        `lastname` VARCHAR(150) NOT NULL,
        `email` VARCHAR(50) NOT NULL,
        `phone` INT(20) NOT NULL,
        `adress` TEXT NOT NULL
    );