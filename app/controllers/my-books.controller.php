<?php

if (! auth()) {

    header('Location: /login');

    exit();

}

$books = Book::mine(auth()->id);

view('my-books', compact('books'));
