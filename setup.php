<?php

$db = new PDO('sqlite:database.sqlite');

$db->exec("
    CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL
    );

    CREATE TABLE IF NOT EXISTS books (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        title VARCHAR(255) NOT NULL,
        author VARCHAR(255) NOT NULL,
        description TEXT,
        release_year INTEGER,
        cover VARCHAR(255),
        user_id INTEGER NOT NULL,
        FOREIGN KEY (user_id) REFERENCES users(id)
    );

    CREATE TABLE IF NOT EXISTS reviews (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        user_id INTEGER NOT NULL,
        book_id INTEGER NOT NULL,
        content TEXT NOT NULL,
        rating INTEGER NOT NULL CHECK (rating >= 1 AND rating <= 5),
        FOREIGN KEY (user_id) REFERENCES users(id),
        FOREIGN KEY (book_id) REFERENCES books(id)
    );
");

// Sample user (password: password)
$db->exec("INSERT OR IGNORE INTO users (id, name, email, password) VALUES 
(1, 'John Doe', 'john@example.com', '\$2y\$10\$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi')");

// Sample books
$db->exec("INSERT OR IGNORE INTO books (id, title, author, description, release_year, cover, user_id) VALUES 
(1, 'The Great Gatsby', 'F. Scott Fitzgerald', 'A story of wealth, love, and the American Dream in the Jazz Age.', 1925, 'https://covers.openlibrary.org/b/id/7222246-L.jpg', 1),
(2, '1984', 'George Orwell', 'A dystopian novel set in a totalitarian society ruled by Big Brother.', 1949, 'https://covers.openlibrary.org/b/id/7222246-L.jpg', 1),
(3, 'To Kill a Mockingbird', 'Harper Lee', 'A gripping tale of racial injustice and loss of innocence in the American South.', 1960, 'https://covers.openlibrary.org/b/id/8228691-L.jpg', 1),
(4, 'Pride and Prejudice', 'Jane Austen', 'A romantic novel about the Bennet family and their five unmarried daughters.', 1813, 'https://covers.openlibrary.org/b/id/6969766-L.jpg', 1),
(5, 'The Catcher in the Rye', 'J.D. Salinger', 'A coming-of-age story about teenage alienation and loss of innocence.', 1951, 'https://covers.openlibrary.org/b/id/8231856-L.jpg', 1)");

// Sample reviews
$db->exec("INSERT OR IGNORE INTO reviews (id, user_id, book_id, content, rating) VALUES 
(1, 1, 1, 'A masterpiece of American literature. The prose is simply beautiful.', 5),
(2, 1, 2, 'Terrifyingly relevant even today. A must-read for everyone.', 5),
(3, 1, 3, 'A profound exploration of morality and justice. Unforgettable characters.', 5)");

echo "Database setup completed successfully!\n";
echo "Sample user: john@example.com / password\n";
