<x-add-button modalId="{{$modalId}}" />

<x-modal-component title="Tambah Role" modalId="{{$modalId}}">
    <form action="{{ route('dashboard.admin.roles.store') }}" method="POST">
        @csrf
        <div class="p-3">
            <div class="mb-3">
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Nama Role<span class="text-meta-1">*</span>
                </label>
                <input type="text" name="name"
                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-3 py-2 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
            </div>

            <h3 class="font-bold text-lg py-3">Role Permission</h3>
            <div class="grid grid-cols-3 gap-4 py-3 mb-4" x-data="{ masterCheckbox: false }">
                <div class="flex items" >
                    <input type="checkbox" @click="masterCheckbox = !masterCheckbox"
                    class="rounded border-[1.5px] border-stroke bg-transparent px-3 py-2 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">
                <label class="ml-2 text-black dark:text-white">Administrator</label>
                </div>
                @foreach ($permissions as $permission)
                    <div class="flex items" x-data="{checked: false}">
                        <input type="checkbox" name="permissions[]" value="{{$permission->id}}"
                            class="rounded border-[1.5px] border-stroke bg-transparent px-3 py-2 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                            x-model="checked"
                            x-bind:checked="masterCheckbox"
                            >
                        <label class="ml-2 text-black dark:text-white">{{$permission->name}}</label>
                    </div>
                @endforeach
            </div>

            <button
                class="flex w-full justify-center rounded bg-success p-3 font-medium text-gray hover:bg-opacity-90">
                Tambah Role
            </button>
        </div>
    </form>
</x-modal-component>
