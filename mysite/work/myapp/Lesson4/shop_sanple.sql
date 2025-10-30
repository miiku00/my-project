-- データベース作成
CREATE DATABASE IF NOT EXISTS shop_sample CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE shop_sample;

-- 顧客テーブル
CREATE TABLE customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    address VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);

INSERT INTO customers (name, address, email) VALUES
('田中 太郎', '東京都', 'tanaka@example.com'),
('鈴木 花子', '大阪府', 'suzuki@example.com'),
('佐藤 健', '福岡県', 'sato@example.com'),
('近藤 勇', '鹿児島県', 'sato@example.com'),
('高橋 美咲', '北海道', 'takahashi@example.com');

-- 商品テーブル
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    category VARCHAR(50) NOT NULL,
    price INT NOT NULL
);

INSERT INTO products (name, category, price) VALUES
('ノートパソコン', '家電', 85000),
('イヤホン', '家電', 3000),
('コーヒーメーカー', '家電', 12000),
('Tシャツ', '衣料品', 2000),
('スニーカー', '衣料品', 7500);

-- 注文テーブル
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    product_id INT NOT NULL,
    order_date DATE NOT NULL,
    FOREIGN KEY (customer_id) REFERENCES customers(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO orders (customer_id, product_id, order_date) VALUES
(1, 1, '2025-08-01'),
(1, 2, '2025-08-03'),
(2, 3, '2025-08-05'),
(3, 5, '2025-08-06'),
(2, 5, '2025-08-08'),
(5, 4, '2025-08-10');