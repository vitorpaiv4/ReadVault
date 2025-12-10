<?php

if ($_SERVER['REQUEST_METHOD'] != "POST") {

    header("Location: /");
    
    exit();

}

if (! auth()) {

    abort(403);

}

$user_id = auth()->id;

$book_id = $_POST['book_id'];

$content = $_POST['content'];

$rating = $_POST['rating'];

$validation = Validation::validate([

    'content' => ['required'],
    'rating' => ['required']

], $_POST);

if ($validation->fails()) {

    header("Location: /book?id=" . $book_id);

    exit();

}

$database->query(

    query: "insert into reviews (user_id, book_id, content, rating)
    values ( :user_id, :book_id, :content, :rating );",

    params: compact('user_id', 'book_id', 'content', 'rating')

);

flash()->push('message', 'Review submitted successfully!');

header("Location: /book?id=" . $book_id);

exit();
