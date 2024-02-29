<x-app-layout>
    <div class="mb-6 flex flex-row gap-3 items-center justify-between">
        <h2 class="text-xl font-bold text-black dark:text-white">
            Pengaturan OAuth
        </h2>

        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="font-medium" href="index.html">Dashboard /</a>
                </li>
                <li class="font-medium text-primary">Tables</li>
            </ol>
        </nav>
    </div>

    <div class="w-full py-4 dark:bg-black px-8 mb-3 bg-white shadow-xl rounded-lg h-fit">
        <div>
            <livewire:o-auth-client-table />
        </div>
    </div>


    <dialog id="modal_1" class="modal modal-bottom sm:modal-middle" data-theme="light">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Hello!</h3>
            <p class="py-4">Press ESC key or click the button below to close</p>
            <div class="modal-action">
                <form method="dialog">
                    <!-- if there is a button in form, it will close the modal -->
                    <button class="btn">Close</button>
                </form>
            </div>
        </div>
    </dialog>
</x-app-layout>
