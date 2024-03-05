<x-app-layout page="Kategori">
    <div class="mb-6 flex flex-row gap-3 items-center justify-between">
        <h2 class="text-xl font-bold text-black dark:text-white">
            Kategori Menu Beranda
        </h2>

        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="font-medium" href="index.html">Dashboard /</a>
                </li>
                <li class="font-medium text-primary">Kategori</li>
            </ol>
        </nav>
    </div>

    <div class="w-full py-4 dark:bg-black px-8 mb-3 bg-white shadow-xl rounded-lg h-fit">
        <div>
            <livewire:category-table />
        </div>
    </div>
</x-app-layout>
