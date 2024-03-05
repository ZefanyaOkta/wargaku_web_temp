<x-app-layout page="Roles">
    <div>
        <div class="mb-6 flex flex-row gap-3 items-center justify-between">
            <h2 class="text-xl font-bold text-black dark:text-white">
                Roles
            </h2>

            <nav>
                <ol class="flex items-center gap-2">
                    <li>
                        <a class="font-medium" href="index.html">Dashboard /</a>
                    </li>
                    <li class="font-medium text-primary">Roles</li>
                </ol>
            </nav>
        </div>

        <div class="w-full py-4 dark:bg-black px-8 mb-3 bg-white shadow-xl rounded-lg h-fit">
            <div>
                <livewire:roles-table />
            </div>
        </div>
    </div>

</x-app-layout>
