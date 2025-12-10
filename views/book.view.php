<div class="flex gap-6 mb-8">

    <img src="<?= $book->cover ?>" alt="<?= $book->title ?>" class="w-32 h-48 object-cover rounded">

    <div>
        <h1 class="text-2xl font-bold"><?= $book->title ?></h1>
        <p class="text-zinc-400"><?= $book->author ?></p>
        
        <div class="flex items-center gap-2 mt-2">
            <span class="text-yellow-500"><?= str_repeat('★', $book->rating ?? 0) ?><?= str_repeat('☆', 5 - ($book->rating ?? 0)) ?></span>
            <span class="text-zinc-600 text-sm">(<?= $book->reviews_count ?? 0 ?> reviews)</span>
        </div>

        <p class="text-sm text-zinc-500 mt-1"><?= $book->release_year ?></p>
        <p class="text-zinc-300 mt-4"><?= $book->description ?></p>
    </div>

</div>

<div class="grid md:grid-cols-3 gap-6">

    <div class="md:col-span-2">

        <h2 class="font-bold mb-4">Reviews</h2>

        <div class="space-y-3">

            <?php if (empty($reviews)): ?>
                <p class="text-zinc-600 text-sm">No reviews yet.</p>
            <?php endif; ?>

            <?php foreach($reviews as $review): ?>
                <div class="p-4 border border-zinc-800 rounded">
                    <span class="text-yellow-500 text-sm"><?= str_repeat('★', $review->rating) ?><?= str_repeat('☆', 5 - $review->rating) ?></span>
                    <p class="text-zinc-300 text-sm mt-2"><?= $review->content ?></p>
                </div>
            <?php endforeach; ?>

        </div>

    </div>

    <div>

        <?php if (auth()): ?>

            <div class="border border-zinc-800 rounded">

                <div class="px-4 py-3 border-b border-zinc-800">
                    <h3 class="font-medium text-sm">Write a Review</h3>
                </div>

                <form class="p-4 space-y-4" method="POST" action="/create-review">

                    <?php if ($errors = flash()->get('errors')): ?>
                        <div class="px-3 py-2 bg-red-900/50 border border-red-800 text-red-300 text-xs rounded">
                            <?php foreach ($errors as $error): ?>
                                <p><?= $error ?></p>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <input name="book_id" value="<?= $book->id ?>" type="hidden">

                    <div>
                        <label class="text-xs text-zinc-500">Your Review</label>
                        <textarea name="content" rows="3" class="w-full mt-1 px-3 py-2 bg-zinc-900 border border-zinc-800 rounded text-sm focus:outline-none focus:border-zinc-700 resize-none"></textarea>
                    </div>

                    <div>
                        <label class="text-xs text-zinc-500">Rating</label>
                        <select name="rating" class="w-full mt-1 px-3 py-2 bg-zinc-900 border border-zinc-800 rounded text-sm focus:outline-none">
                            <option value="5">★★★★★</option>
                            <option value="4">★★★★☆</option>
                            <option value="3">★★★☆☆</option>
                            <option value="2">★★☆☆☆</option>
                            <option value="1">★☆☆☆☆</option>
                        </select>
                    </div>

                    <button type="submit" class="w-full py-2 bg-white text-zinc-900 text-sm font-medium rounded hover:bg-zinc-200">
                        Submit
                    </button>

                </form>

            </div>

        <?php else: ?>

            <div class="border border-zinc-800 rounded p-4 text-center">
                <p class="text-zinc-500 text-sm mb-3">Sign in to write a review</p>
                <a href="/login" class="text-sm text-white hover:underline">Sign In</a>
            </div>

        <?php endif; ?>

    </div>

</div>
