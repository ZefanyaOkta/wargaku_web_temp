<x-delete-button modalId="{{$modalId}}" />


<x-modal-component title={{$title}} modalId={{$modalId}}>
<div class="p-4">
    <p class="text-lg mt-4">Apakah anda ingin menghapus permission <b>{{$permission->name}}</b>?</p>
    <form class="w-full max-w-full" action="{{route('dashboard.admin.permissions.destroy', ['permission' => $permission->id])}}" method="POST">
        @csrf
        @method('DELETE')
        @if($errors->any())
            <div class="bg-red-400 border-l-4 border-red-500 p-4 mb-3" role="alert">
                <p class="font-bold text-lg">Validation Error</p>
                @foreach ($errors->all() as $error)
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endforeach
            </div>
        @endif
        <div class="flex flex-wrap mb-2 justify-end">
            <button class="text-gray border-2 border-gray-300 font-bold py-2 px-4 rounded-full mr-2"
                    type="button">
                Batal
            </button>
            <button class="flex w-full justify-center rounded bg-danger p-3 font-medium text-gray hover:bg-opacity-90"  type="submit"">
                Ya
            </button>
        </div>
    </form>
</div>

</x-modal-component>
