<div class="mb-6">
    <h1 class="text-2xl font-bold">Explore Books</h1>
</div>

<form class="mb-6">
    <input 
        type="text" 
        name="search"
        value="<?= $_REQUEST['search'] ?? '' ?>"
        class="w-full px-4 py-2 bg-zinc-900 border border-zinc-800 rounded text-sm placeholder-zinc-600 focus:outline-none focus:border-zinc-700"
        placeholder="Search books..."
    >
</form>

<div class="space-y-3">

    <?php foreach($books as $book): ?>
        <?php require APP_PATH . '/views/partials/_book.php'; ?>
    <?php endforeach; ?>

    <?php if (empty($books)): ?>
        <p class="text-center text-zinc-600 py-12">No books found.</p>
    <?php endif; ?>

</div>
