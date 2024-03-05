<x-app-layout page="Beranda">

    {{-- === TITLE === --}}
    <div class="mx-auto max-w-270">
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-title-md2 font-bold text-graytitle dark:text-white">Layanan WargaKu</h2>
        </div>


    </div>

    <div class="col-span-5 xl:col-span-3">
        <div class="rounded-lg shadow-md bg-white dark:border-strokedark dark:bg-boxdark">
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 md:grid-cols-3 p-4">
                @foreach ($categories as $category)
                <a href="{{$category->link}}"
                    class="flex bg-white p-4 shadow-md rounded-md items-center transition ease-in-out delay-100 hover:scale-105 duration-300">
                    {{-- categories attribute --}}
                    {{-- - Image
            - Title
            - Href/Link --}}
                    <img class="w-20 ml-2 mr-3" src="{{ $category->image }}" alt="Logo" />
                    <div class="text-lg">{{$category->name}}</div>
                </a>
                @endforeach
            </div>
        </div>
    </div>

    </div>
</x-app-layout>
