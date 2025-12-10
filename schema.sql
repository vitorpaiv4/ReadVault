-- ReadVault Database Schema (MySQL)

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    description TEXT,
    release_year INT,
    cover VARCHAR(255),
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    book_id INT NOT NULL,
    content TEXT NOT NULL,
    rating INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (book_id) REFERENCES books(id)
);

-- Sample user (password: password)
INSERT INTO users (name, email, password) VALUES 
('John Doe', 'john@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

-- Sample books
INSERT INTO books (title, author, description, release_year, cover, user_id) VALUES 
('The Great Gatsby', 'F. Scott Fitzgerald', 'A story of wealth, love, and the American Dream in the Jazz Age.', 1925, 'https://covers.openlibrary.org/b/id/7222246-L.jpg', 1),
('1984', 'George Orwell', 'A dystopian novel set in a totalitarian society ruled by Big Brother.', 1949, 'https://covers.openlibrary.org/b/id/7222246-L.jpg', 1),
('To Kill a Mockingbird', 'Harper Lee', 'A gripping tale of racial injustice and loss of innocence in the American South.', 1960, 'https://covers.openlibrary.org/b/id/8228691-L.jpg', 1);

-- Sample reviews
INSERT INTO reviews (user_id, book_id, content, rating) VALUES 
(1, 1, 'A masterpiece of American literature. The prose is simply beautiful.', 5),
(1, 2, 'Terrifyingly relevant even today. A must-read for everyone.', 5);
