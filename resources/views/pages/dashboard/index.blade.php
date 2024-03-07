<x-app-layout page="Beranda">
    <div>
        <div class="mb-6 flex flex-row gap-3 items-center justify-between">
            <h2 class="text-xl font-bold text-graytitle dark:text-white">Layanan WargaKu</h2>

            <nav>
                <ol class="flex items-center gap-2">
                    <li>
                        <a class="font-medium" href="index.html">Dashboard /</a>
                    </li>
                    <li class="font-medium text-primary">Layanan WargaKu</li>
                </ol>
            </nav>
        </div>
    </div>


    <div class="col-span-5 xl:col-span-3">
        <div class="rounded-lg shadow-md bg-white dark:border-strokedark dark:bg-boxdark">
            <div class="grid grid-cols-1 gap-15 sm:grid-cols-2 md:grid-cols-3 p-10 pb-20">
                @foreach ($categories as $category)
                <a href="{{ $category->link }}"
                    class="flex flex-col items-center justify-center bg-white shadow-md rounded-md transition ease-in-out delay-100 hover:scale-105 duration-300">
                     {{-- Image --}}
                     <img class="max-h-40 translate-y-7"
                          src="{{ file_exists(public_path('images/categories/' . $category->name . '.jpg')) ? url('images/categories/' . $category->name . '.jpg') : url('images/categories/dummy.png') }}"
                          alt="categories" />
 
                     {{-- Title --}}
                     <div class="text-lg w-50 text-center font-medium bg-primaryRed text-white p-3 rounded-md shadow-md translate-y-7 hover:opacity-90">
                         {{ $category->name }}
                     </div>
                 </a>
                @endforeach
            </div>
        </div>
    </div>

    {{-- <div class="col-span-5 xl:col-span-3">
        <div class="rounded-lg shadow-md bg-white dark:border-strokedark dark:bg-boxdark">
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 md:grid-cols-3 p-4">
                @foreach ($categories as $category)
                <a href="{{$category->link}}"
                    class="flex bg-white p-4 shadow-md rounded-md items-center transition ease-in-out delay-100 hover:scale-105 duration-300"> --}}
                    {{-- categories attribute --}}
                    {{-- - Image - Title - Href/Link --}}
                    {{-- <img class="w-20 ml-2 mr-3" src="{{ $category->image }}" alt="Logo" />
                    <div class="text-lg">{{$category->name}}</div>
                </a>
                @endforeach
            </div>
        </div>
    </div> --}}

    </div>
</x-app-layout>
