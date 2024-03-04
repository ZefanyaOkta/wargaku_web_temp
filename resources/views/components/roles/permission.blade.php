<button
onclick="{{ $modalId }}.showModal()"
    class="bg-success cursor-pointer text-white px-3 py-2 m-1 rounded text-sm">
    <i class="fa-solid fa-key"></i>
</button>

<x-modal-component title="Edit Role Permission" modalId={{$modalId}}>
            <div class="grid grid-cols-3 gap-4 py-3 mb-4" x-data="{ masterCheckbox: false }">
                {{-- <div class="flex items" >
                    <input type="checkbox" @click="masterCheckbox = !masterCheckbox"
                    class="rounded border-[1.5px] border-stroke bg-transparent px-3 py-2 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">
                <label class="ml-2 text-black dark:text-white">check / Uncheck</label>
                </div> --}}
                @foreach ($permissions as $permission)
                    <div class="flex items" x-data="{checked: {{($role->hasPermissionTo($permission->name)) ? 'true' : 'false'}}}">
                        <input type="checkbox" name="permissions[]" value="{{$permission->id}}"
                            class="rounded border-[1.5px] border-stroke bg-transparent px-3 py-2 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                            x-model="checked"
                            disabled
                            {{-- x-bind:checked="masterCheckbox" --}}
                            >
                        <label class="ml-2 text-black dark:text-white">{{$permission->name}}</label>
                    </div>
                @endforeach
            </div>
</x-modal-component>
