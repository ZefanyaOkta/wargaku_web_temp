<x-app-layout page="OAuth">
    <div class="mb-6 flex flex-row gap-3 items-center justify-between">
        <h2 class="text-xl font-bold text-graytitle dark:text-white">PENGATURAN OAUTH</h2>

        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="font-medium" href="index.html">Dashboard /</a>
                </li>
                <li class="font-medium text-primary">OAuth</li>
            </ol>
        </nav>
    </div>
    <div class="w-full py-4 dark:bg-black px-8 mb-3 bg-white shadow-xl rounded-lg h-fit">
        <div>
            <livewire:o-auth-client-table />
        </div>
    </div>
</x-app-layout>
