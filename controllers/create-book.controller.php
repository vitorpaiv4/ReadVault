<?php

if ($_SERVER['REQUEST_METHOD'] != "POST") {

    header("Location: /my-books");
    
    exit();

}

if (! auth()) {

    abort(403);

}

$user_id = auth()->id;

$title = $_POST['title'];

$author = $_POST['author'];

$description = $_POST['description'];

$release_year = $_POST['release_year'];

$validation = Validation::validate([

    'title' => ['required', 'min:3'],
    'author' => ['required'],
    'description' => ['required'],
    'release_year' => ['required']

], $_POST);

if ($validation->fails()) {

    header("Location: /my-books");

    exit();

}

$newName = md5(rand());

$extension = pathinfo($_FILES['cover']['name'], PATHINFO_EXTENSION);

$cover = "images/$newName.$extension";

move_uploaded_file($_FILES['cover']['tmp_name'], __DIR__ .  "/../public/$cover");

$database->query(
    "insert into books (title, author, description, release_year, user_id, cover)
    values (:title, :author, :description, :release_year, :user_id, :cover);",

    params: compact('title', 'author', 'description', 'release_year', 'user_id', 'cover')
);

flash()->push('message', 'Book added successfully!');

header("Location: /my-books");

exit();
