# ReadVault

A modern book management and review platform built with PHP and TailwindCSS.

## Features

- **Explore Books**: Browse and search through the book collection
- **User Authentication**: Sign up and sign in to access personalized features
- **My Books**: Manage your personal book collection
- **Reviews**: Write and read reviews for books
- **Star Ratings**: Rate books from 1 to 5 stars

## Getting Started

### Prerequisites

- PHP 8.0 or higher
- PDO SQLite extension enabled

### Installation

1. Navigate to the project directory:
```bash
cd readvault
```

2. Run the setup script to create the database with sample data:
```bash
php setup.php
```

3. Start the PHP development server:
```bash
php -S localhost:8000 -t public
```

4. Open your browser and visit: http://localhost:8000

### Sample User

After running the setup script, you can log in with:
- **Email**: john@example.com
- **Password**: password

## Project Structure

```
readvault/
├── controllers/          # Route controllers
├── models/              # Data models
├── views/               # View templates
│   ├── partials/        # Reusable view components
│   └── template/        # Main layout template
├── public/              # Public assets and entry point
│   ├── images/          # Uploaded book covers
│   └── index.php        # Application entry point
├── config.php           # Configuration settings
├── Database.php         # Database connection class
├── Flash.php            # Flash messages handler
├── Validation.php       # Input validation class
├── functions.php        # Helper functions
├── routes.php           # Routing logic
└── setup.php            # Database setup script
```

## Technologies

- **PHP 8**: Backend language
- **SQLite**: Database
- **TailwindCSS 4**: Styling (via CDN)
- **MVC Architecture**: Clean code organization
