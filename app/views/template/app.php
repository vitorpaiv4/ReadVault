<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReadVault</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-zinc-950 text-zinc-100 min-h-screen">
    
    <header class="border-b border-zinc-800">

        <nav class="max-w-4xl mx-auto flex justify-between items-center py-4 px-4">

            <a href="/" class="font-bold text-lg">ReadVault</a>

            <ul class="flex items-center gap-6 text-sm">

                <li><a href="/" class="text-zinc-400 hover:text-white">Explore</a></li>

                <?php if (auth()): ?>
                    <li><a href="/my-books" class="text-zinc-400 hover:text-white">My Books</a></li>
                <?php endif; ?>

            </ul>

            <?php if (auth()): ?>
                <a href="/logout" class="text-sm text-zinc-400 hover:text-white"><?= auth()->name ?></a>
            <?php else: ?>
                <a href="/login" class="text-sm bg-white text-zinc-900 px-4 py-1.5 rounded hover:bg-zinc-200">Sign In</a>
            <?php endif; ?>

        </nav>

    </header>

    <main class="max-w-4xl mx-auto px-4 py-8">

        <?php if ($message = flash()->get('message')): ?>
            <div class="mb-6 px-4 py-3 bg-emerald-900/50 border border-emerald-800 text-emerald-300 text-sm rounded">
                <?= $message ?>
            </div>
        <?php endif; ?>

        <?php require APP_PATH . "/views/{$view}.view.php" ?>

    </main>

</body>
</html>
