<?php

$book = Book::find($_GET['id']);

if (!$book) {
    abort(404);
}

$reviews = $database
    ->query("select * from reviews where book_id = :id", Review::class, ['id' => $_GET['id']])
    ->fetchAll();

view('book', compact('book', 'reviews'));
