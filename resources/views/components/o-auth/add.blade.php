<x-add-button modalId="{{$modalId}}" />

<x-modal-component title="Tambah Client" modalId="{{$modalId}}">
    <form action="{{ route('dashboard.admin.oauth.store') }}" method="POST">
        @csrf
        <div class="p-3">
            <div class="mb-3">
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Nama Client<span class="text-meta-1">*</span>
                </label>
                <input type="text" name="name"
                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-3 py-2 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
            </div>

            <div class="mb-4.5">
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Callback URL<span class="text-meta-1">*</span>
                </label>
                <input type="text" name="redirect"
                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
            </div>

            <button
                class="flex w-full justify-center rounded bg-success p-3 font-medium text-gray hover:bg-opacity-90">
                Tambah Client
            </button>
        </div>
    </form>
</x-modal-component>
