<x-app-layout page="OAuth">
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


    <dialog id="modal_1" class="modal modal-bottom sm:modal-middle" data-theme="cupcake">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Tambah Client</h3>
            <form action="{{route('dashboard.admin.oauth.store')}}" method="POST">
                @csrf
                <div class="p-3">
                    <div class="mb-3">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Nama Client<span class="text-meta-1">*</span>
                        </label>
                        <input type="text" name="name"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                    </div>

                    <div class="mb-4.5">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Callback URL<span class="text-meta-1">*</span>
                        </label>
                        <input type="text" name="redirect"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                    </div>

                    <button
                        class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90">
                        Tambah Client
                    </button>
                </div>
            </form>
            <div class="modal-action">
                <form method="dialog">
                    <!-- if there is a button in form, it will close the modal -->
                    <button class="btn">Close</button>
                </form>
            </div>
        </div>
    </dialog>
</x-app-layout>
