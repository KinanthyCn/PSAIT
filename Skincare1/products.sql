CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    brand VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL
);
ALTER TABLE products 
ADD ingredients VARCHAR(255),
ADD cara_pakai VARCHAR(255),
ADD jumlah INTEGER;

