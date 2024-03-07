<x-add-button modalId="{{$modalId}}" />

<x-modal-component title="Tambah Kategori" modalId="{{$modalId}}">
    <form action="{{ route('dashboard.admin.categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if($errors->any())
        <x-alert type="danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-alert>
    @endif
        <div class="p-3">
            <div class="mb-3">
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Judul<span class="text-meta-1">*</span>
                </label>
                <input type="text" name="name" required
                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-3 py-2 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
            </div>

            {{-- Icon --}}
            <div class="mb-3">
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Icon<span class="text-meta-1">*</span>

                </label>

                <input type="file" name="image" required accept="image/*"
                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-3 py-2 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
            </div>


            <button
                class="flex w-full justify-center rounded bg-success p-3 font-medium text-gray hover:bg-opacity-90">
                Tambah
            </button>
        </div>
    </form>
</x-modal-component>
