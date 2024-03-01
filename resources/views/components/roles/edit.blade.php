<x-edit-button modalId="{{$modalId}}" />


<x-modal-component title={{$title}} modalId={{$modalId}}>
    <form action="{{ route('dashboard.admin.roles.update', ['role' => $role->id] ) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="p-3">
            <div class="mb-3">
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Nama Role<span class="text-meta-1">*</span>
                </label>
                <input type="text" name="name" value="{{$role->name}}"
                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
            </div>

            <button
                class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90">
                {{$title}}
            </button>
        </div>
    </form>
</x-modal-component>
