<x-edit-button modalId="{{$modalId}}" />


<x-modal-component title="Tambah Kategori" modalId="{{$modalId}}">
    <form action="{{ route('dashboard.admin.categories.update', ['category' => $kategori->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
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
                <input type="text" name="name" required value="{{$kategori->name}}"
                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-3 py-2 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
            </div>

            {{-- Icon --}}
            <div class="mb-3">
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Icon<span class="text-meta-1">*</span>
                </label>

                <input type="file" name="image" id="image" accept="image/*
                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-3 py-2 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
            </div>

            {{-- Show Image --}}
            <div class="mb-3">
                <img src="{{ asset('storage/categories/' . $kategori->name . '.jpg')}}" id="show" alt="" class="w-20 h-20 ">
            </div>

            <button
                class="flex w-full justify-center rounded bg-success p-3 font-medium text-gray hover:bg-opacity-90">
                Tambah
            </button>
        </div>
    </form>
</x-modal-component>

@push('js')
<script>
    $(document).ready(function() {
        $('#image').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                console.log(e.target.result);
                $('#show').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });

    </script>
@endpush

