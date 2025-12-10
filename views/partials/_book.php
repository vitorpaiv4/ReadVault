<a href="/book?id=<?= $book->id ?>" class="flex gap-4 p-4 border border-zinc-800 rounded hover:border-zinc-700 transition-colors">

    <img src="<?= $book->cover ?>" alt="<?= $book->title ?>" class="w-16 h-24 object-cover rounded">

    <div class="flex-1 min-w-0">

        <h3 class="font-medium text-white truncate"><?= $book->title ?></h3>
        <p class="text-sm text-zinc-500"><?= $book->author ?></p>
        
        <div class="flex items-center gap-2 mt-1 text-sm">
            <span class="text-yellow-500"><?= str_repeat('★', $book->rating ?? 0) ?><?= str_repeat('☆', 5 - ($book->rating ?? 0)) ?></span>
            <span class="text-zinc-600">(<?= $book->reviews_count ?? 0 ?>)</span>
        </div>

        <p class="text-sm text-zinc-500 mt-2 line-clamp-2"><?= $book->description ?></p>

    </div>

    <span class="text-xs text-zinc-600"><?= $book->release_year ?></span>

</a>
