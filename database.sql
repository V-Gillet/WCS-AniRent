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
        './assets/images/spider.jpeg',
        1.5
    ), (
        'Llama',
        './assets/images/lama.jpeg',
        2.5
    ), (
        'Prairie Dog',
        './assets/images/dog.jpeg',
        2.5
    ), (
        'Leopard Cat',
        './assets/images/cat.jpeg',
        3.5
    ), (
        'Painted Turtle',
        './assets/images/turtle.jpeg',
        0.5
    ), (
        'Giraffe',
        './assets/images/giraffe.jpeg',
        2.5
    ), (
        'Flying Squirrel',
        './assets/images/squirrel.jpeg',
        2
    ), (
        'Mosquito',
        './assets/images/mosquito.jpeg',
        0.5
    ), (
        'Sea Eagle',
        './assets/images/eagle.jpeg',
        5
    ), (
        'Snowy Owl',
        './assets/images/owl.jpeg',
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