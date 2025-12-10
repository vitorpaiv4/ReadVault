<?php

$books = Book::all($_REQUEST['search'] ?? '');

view('index', compact('books'));
