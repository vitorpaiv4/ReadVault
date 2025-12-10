<div class="max-w-md mx-auto">

    <h1 class="text-2xl font-bold text-center mb-8">Welcome</h1>

    <div class="space-y-6">

        <div class="border border-zinc-800 rounded">

            <div class="px-4 py-3 border-b border-zinc-800">
                <h2 class="font-medium text-sm">Sign In</h2>
            </div>

            <form class="p-4 space-y-4" method="POST">

                <?php if ($errors = flash()->get('errors_login')): ?>
                    <div class="px-3 py-2 bg-red-900/50 border border-red-800 text-red-300 text-xs rounded">
                        <?php foreach ($errors as $error): ?>
                            <p><?= $error ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <div>
                    <label class="text-xs text-zinc-500">Email</label>
                    <input type="email" name="email" class="w-full mt-1 px-3 py-2 bg-zinc-900 border border-zinc-800 rounded text-sm focus:outline-none focus:border-zinc-700">
                </div>

                <div>
                    <label class="text-xs text-zinc-500">Password</label>
                    <input type="password" name="password" class="w-full mt-1 px-3 py-2 bg-zinc-900 border border-zinc-800 rounded text-sm focus:outline-none focus:border-zinc-700">
                </div>

                <button type="submit" class="w-full py-2 bg-white text-zinc-900 text-sm font-medium rounded hover:bg-zinc-200">
                    Sign In
                </button>

            </form>

        </div>

        <div class="border border-zinc-800 rounded">

            <div class="px-4 py-3 border-b border-zinc-800">
                <h2 class="font-medium text-sm">Create Account</h2>
            </div>

            <form class="p-4 space-y-4" method="POST" action="/register">

                <?php if ($errors = flash()->get('errors_register')): ?>
                    <div class="px-3 py-2 bg-red-900/50 border border-red-800 text-red-300 text-xs rounded">
                        <?php foreach ($errors as $error): ?>
                            <p><?= $error ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <div>
                    <label class="text-xs text-zinc-500">Name</label>
                    <input type="text" name="name" class="w-full mt-1 px-3 py-2 bg-zinc-900 border border-zinc-800 rounded text-sm focus:outline-none focus:border-zinc-700">
                </div>

                <div>
                    <label class="text-xs text-zinc-500">Email</label>
                    <input type="email" name="email" class="w-full mt-1 px-3 py-2 bg-zinc-900 border border-zinc-800 rounded text-sm focus:outline-none focus:border-zinc-700">
                </div>

                <div>
                    <label class="text-xs text-zinc-500">Confirm Email</label>
                    <input type="email" name="email_confirmation" class="w-full mt-1 px-3 py-2 bg-zinc-900 border border-zinc-800 rounded text-sm focus:outline-none focus:border-zinc-700">
                </div>

                <div>
                    <label class="text-xs text-zinc-500">Password</label>
                    <input type="password" name="password" class="w-full mt-1 px-3 py-2 bg-zinc-900 border border-zinc-800 rounded text-sm focus:outline-none focus:border-zinc-700">
                    <p class="text-xs text-zinc-600 mt-1">Min 8 characters with a special character</p>
                </div>

                <button type="submit" class="w-full py-2 bg-zinc-800 text-white text-sm font-medium rounded hover:bg-zinc-700">
                    Create Account
                </button>

            </form>

        </div>

    </div>

</div>
