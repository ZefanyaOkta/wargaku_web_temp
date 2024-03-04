<x-edit-button modalId="{{$modalId}}" />


<x-modal-component title={{$title}} modalId={{$modalId}}>
  <form action="{{route('dashboard.admin.oauth.update', ['oauth' => $client->id])}}" method="POST">
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
            <div class="p-1">
                <div class="mb-3">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Nama Client<span class="text-meta-1">*</span>
                    </label>
                    <input type="text" name="name" value="{{$client->name}}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                </div>

                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Callback URL<span class="text-meta-1">*</span>
                    </label>
                    <input type="text" name="redirect" value="{{$client->redirect}}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                </div>

                <button
                    type="submit"
                    class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90">
                    {{$title}}
                </button>
            </div>
        </form>
</x-modal-component>
