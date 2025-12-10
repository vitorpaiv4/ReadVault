<div class="mb-6">
    <h1 class="text-2xl font-bold">My Books</h1>
</div>

<div class="grid md:grid-cols-3 gap-6">

    <div class="md:col-span-2 space-y-3">

        <?php foreach($books as $book): ?>
            <?php require APP_PATH . '/views/partials/_book.php'; ?>
        <?php endforeach; ?>

        <?php if (empty($books)): ?>
            <p class="text-zinc-600 py-12 text-center">No books yet. Add your first book.</p>
        <?php endif; ?>

    </div>

    <div>

        <div class="border border-zinc-800 rounded">

            <div class="px-4 py-3 border-b border-zinc-800">
                <h3 class="font-medium text-sm">Add Book</h3>
            </div>

            <form class="p-4 space-y-4" method="POST" action="/create-book" enctype="multipart/form-data">

                <?php if ($errors = flash()->get('errors')): ?>
                    <div class="px-3 py-2 bg-red-900/50 border border-red-800 text-red-300 text-xs rounded">
                        <?php foreach ($errors as $error): ?>
                            <p><?= $error ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <div>
                    <label class="text-xs text-zinc-500">Cover</label>
                    <input type="file" name="cover" class="w-full mt-1 text-sm text-zinc-400 file:mr-3 file:py-1.5 file:px-3 file:rounded file:border-0 file:bg-zinc-800 file:text-zinc-300 file:text-xs">
                </div>

                <div>
                    <label class="text-xs text-zinc-500">Title</label>
                    <input type="text" name="title" class="w-full mt-1 px-3 py-2 bg-zinc-900 border border-zinc-800 rounded text-sm focus:outline-none focus:border-zinc-700">
                </div>

                <div>
                    <label class="text-xs text-zinc-500">Author</label>
                    <input type="text" name="author" class="w-full mt-1 px-3 py-2 bg-zinc-900 border border-zinc-800 rounded text-sm focus:outline-none focus:border-zinc-700">
                </div>

                <div>
                    <label class="text-xs text-zinc-500">Description</label>
                    <textarea name="description" rows="3" class="w-full mt-1 px-3 py-2 bg-zinc-900 border border-zinc-800 rounded text-sm focus:outline-none focus:border-zinc-700 resize-none"></textarea>
                </div>

                <div>
                    <label class="text-xs text-zinc-500">Release Year</label>
                    <select name="release_year" class="w-full mt-1 px-3 py-2 bg-zinc-900 border border-zinc-800 rounded text-sm focus:outline-none">
                        <?php foreach(range(date('Y'), 1900, -1) as $year): ?>
                            <option value="<?= $year ?>"><?= $year ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" class="w-full py-2 bg-white text-zinc-900 text-sm font-medium rounded hover:bg-zinc-200">
                    Add Book
                </button>

            </form>

        </div>

    </div>

</div>
