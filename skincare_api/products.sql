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

INSERT INTO products (name, brand, description, price, ingredients, cara_pakai, jumlah) VALUES ('Shampoo', 'Dove', 'Shampoo untuk rambut kering', 10000, 'Aqua, Sodium Laureth Sulfate, Cocamidopropyl Betaine, Glycerin, Dimethiconol, Parfum, Carbomer, TEA-Dodecylbenzenesulfonate, Guar Hydroxypropyltrimonium Chloride, Mica, Titanium Dioxide, Sodium Chloride, Gluconolactone, Trehalose, Adipic Acid, Sodium Sulfate, Citric Acid, PPG-9, Disodium EDTA, PEG-45M, Phenoxyethanol, Sodium Benzoate, Amyl Cinnamal, Benzyl Alcohol, Butylphenyl Methylpropional, Hexyl Cinnamal, Linalool, CI 15985, CI 19140, CI 77891', 'Basahi rambut, aplikasikan shampoo, pijat lembut, bilas', 10);

