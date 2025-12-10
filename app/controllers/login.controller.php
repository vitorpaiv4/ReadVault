<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];

    $password = $_POST['password'];

    $validation = Validation::validate([

        'email' => ['required', 'email'],
        'password' => ['required']

    ], $_POST);

    if ($validation->fails('login')) {

        header("Location: /login");

        exit();

    }

    $user = $database->query(

        query: "select * from users where email = :email",

        class: User::class,

        params: compact('email')

    )->fetch();

    if ($user) {

        $passwordFromPost = $_POST['password'];

        $passwordFromDb = $user->password;

        if (! password_verify($passwordFromPost, $passwordFromDb)) {

            flash()->push('errors_login', ['Invalid email or password.']);

            header('Location: /login');

            exit();

        }

        $_SESSION['auth'] = $user;

        flash()->push('message', "Welcome back, " . $user->name . "!");

        header("Location: /");

        exit();

    } else {

        flash()->push('errors_login', ['Invalid email or password.']);

        header('Location: /login');

        exit();

    }

}

view('login');
