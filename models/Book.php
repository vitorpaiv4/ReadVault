<?php

class Book {

    public $id;

    public $title;

    public $author;

    public $description;

    public $release_year;

    public $cover;

    public $user_id;

    public $rating;

    public $reviews_count;

    public function query($where, $params)
    {

        $database = new Database(config('database'));

        return $database->query(

            query: "
            
                select

                    b.id,
                    b.title,
                    b.author,
                    b.description,
                    b.release_year,
                    b.cover,
                    round(sum(r.rating) / 5.0) as rating,
                    count(r.id) as reviews_count

                from

                    books b

                left join reviews r on r.book_id = b.id

                where $where

                group by

                    b.id,
                    b.title,
                    b.author,
                    b.description,
                    b.release_year,
                    b.cover;

            ",

            class: self::class,

            params: $params

        ); 

    }

    public static function find($id)
    {

        return (new self)->query('b.id = :id', ['id' => $id])->fetch();

    }

    public static function all($filter)
    {

        return (new self)->query('b.title like :filter', ['filter' => "%$filter%"])->fetchAll();

    }

    public static function mine($user_id)
    {

        return (new self)->query('b.user_id = :user_id', ['user_id' => $user_id])->fetchAll();

    }

}
