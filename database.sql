-- Active: 1716319426113@@127.0.0.1@3306@rental
CREATE DATABASE rental DEFAULT CHARACTER SET = 'utf8mb4';

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    car_id INT NOT NULL,
    user_email VARCHAR(255) NOT NULL,
    rent_start_date DATE NOT NULL,
    rent_end_date DATE NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    status ENUM(
        'confirmed',
        'pending',
        'cancelled'
    ) NOT NULL
);

SELECT * from orders;