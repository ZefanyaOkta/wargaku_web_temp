<button
    onclick="{{ $modalId }}.showModal()"
    class="bg-primary cursor-pointer text-white px-3 py-2 m-1 rounded text-sm">
    <i class="fa-solid fa-pen-to-square fa-white"></i>
</button>


<dialog id="{{ $modalId }}" class="modal modal-bottom sm:modal-middle" data-theme="cupcake">
    <div class="modal-box">
        <h3 class="font-bold text-lg">Edit Client</h3>
        <form action="{{ route('dashboard.admin.oauth.store') }}" method="POST">
            @csrf
            <div class="p-3">
                <div class="mb-3">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Nama Client<span class="text-meta-1">*</span>
                    </label>
                    <input type="text" name="name" @if(isset($data)) value="{{ $data->name }}" @endif
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                </div>

                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Callback URL<span class="text-meta-1">*</span>
                    </label>
                    <input type="text" name="redirect" @if(isset($data)) value="{{ $data->redirect }}" @endif
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
