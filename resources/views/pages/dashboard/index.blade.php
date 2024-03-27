<x-app-layout page="Beranda">
    <div>
        <div class="mb-6 flex flex-row gap-3 items-center justify-between">
            <h2 class="text-xl font-bold text-graytitle dark:text-white">LAYANAN WARGAKU</h2>

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
            @foreach ($categories as $category)

            {{-- MODAL "CEK GAMIS" --}}
            <dialog id="modal_gamis" class="modal modal-bottom sm:modal-middle" data-theme="cupcake">
                <div style="width: 350px; height: 250px" class="modal-box">
                    <form method="dialog">
                        <div class="flex items-center justify-center mb-10">
                            <img class="w-8 mr-3 opacity-70" src="{{ url('images/icon/icon-info.svg') }}" alt="info">
                            <h3 class="font-normal text-2xl text-graytitle">Info</h3>
                        </div>
                        {{-- CONTENT --}}
                        <div class="items-center justify-center text-center ">
                            <h3 class="items-center justify-center mb-10">NIK 0000111122223333 Termasuk Non Keluarga Miskin.</h3>
                            <button class="bg-primaryRed text-white rounded-lg shadow-md w-70 h-10 hover:opacity-80">Tutup</button>
                        </div>
                        
                    </form>
                </div>
            </dialog>

            {{-- MODAL "PENGADUAN" --}}
            <dialog id="modal_pengaduan" class="modal modal-bottom sm:modal-middle" data-theme="cupcake">
                <div style="width: 400px; height: 330px" class="modal-box">
                    <form method="dialog">
                        <div class="flex items-center justify-center mb-10">
                            <img class="w-8 mr-3 opacity-70" src="{{ url('images/icon/icon-info.svg') }}" alt="info">
                            <h3 class="font-normal text-2xl text-graytitle">Info</h3>
                        </div>
                        {{-- CONTENT --}}
                        <div class="items-center justify-center text-center ">
                            <h3 class="items-center justify-center mb-10">Pastikan Anda memilih topik sesuai dengan pengaduan agar pengaduan yang anda sampaikan dapat diterima oleh OPD (Organisasi Perangkat Daerah) yang berwenang untuk menindaklanjuti pengaduan tersebut.</h3>
                            <button class="bg-primaryRed text-white rounded-lg shadow-md w-70 h-10 hover:opacity-80">Tutup</button>
                        </div>
                        
                    </form>
                </div>
            </dialog>

            <div class="p-5">
                <div class="flex">
                    <i class="pl-2 pb-3 pt-1 pr-2 w-10 opacity-80">
                        {!! file_exists(public_path('images/icon/' . $category->name . '.svg')) ?
                        file_get_contents(public_path('images/icon/' . $category->name . '.svg')) : '' !!}
                    </i>
                    <h3 class="font-medium text-2xl mb-5 text-graytitle dark:text-white">{{ $category->name }}</h3>
                </div>
                <div class="grid grid-cols-1 gap-15 sm:grid-cols-2 md:grid-cols-3 pb-20">
                    {{-- Subcategories --}}
                    @foreach ($category->sub_categories as $subcategory)
                    <a href="{{ $subcategory->link }}"
                        class="flex flex-col items-center justify-center bg-white shadow-md rounded-md transition ease-in-out delay-100 hover:scale-105 duration-300"
                        @if ($subcategory->name === 'Cek Gamis') onclick="openGamisModal(event)" 
                        @elseif ($subcategory->name === 'Media Center') onclick="openPengaduanModal(event)"
                        @endif>
                        {{-- Subcategory image --}}
                        <img class="max-h-40 translate-y-7"
                            src="{{ $subcategory->image }}"
                            alt="subcategory" />
                        {{-- Subcategory title --}}
                        <div
                            class="text-lg w-50 text-center font-medium bg-primaryRed text-white p-3 rounded-md shadow-md translate-y-7 hover:opacity-90">
                            {{ $subcategory->name }}
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script>
        const modal_gamis = document.getElementById('modal_gamis');
        const modal_pengaduan = document.getElementById('modal_pengaduan');

        function openGamisModal(event) {
            event.preventDefault(); // Prevent default anchor behavior
            modal_gamis.showModal(); // Show modal dialog
        }

        function openPengaduanModal(event) {
            event.preventDefault(); // Prevent default anchor behavior
            modal_pengaduan.showModal(); // Show modal dialog
        }

    </script>

    {{-- <div class="col-span-5 xl:col-span-3">
        <div class="rounded-lg shadow-md bg-white dark:border-strokedark dark:bg-boxdark">
            <div class="grid grid-cols-1 gap-15 sm:grid-cols-2 md:grid-cols-3 p-10 pb-20">
                @foreach ($categories as $category)
                <a href="{{ $category->link }}"
    class="flex flex-col items-center justify-center bg-white shadow-md rounded-md transition ease-in-out delay-100
    hover:scale-105 duration-300"> --}}
    {{-- Image --}}
    {{-- <img class="max-h-40 translate-y-7"
                          src="{{ file_exists(public_path('images/categories/' . $category->name . '.jpg')) ? url('images/categories/' . $category->name . '.jpg') : url('images/categories/dummy.png') }}"
    alt="categories" /> --}}

    {{-- Title --}}
    {{-- <div class="text-lg w-50 text-center font-medium bg-primaryRed text-white p-3 rounded-md shadow-md translate-y-7 hover:opacity-90">
                         {{ $category->name }}
    </div>
    </a>
    @endforeach
    </div>
    </div>
    </div> --}}

    {{-- <div class="col-span-5 xl:col-span-3">
        <div class="rounded-lg shadow-md bg-white dark:border-strokedark dark:bg-boxdark">
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 md:grid-cols-3 p-4">
                @foreach ($categories as $category)
                <a href="{{$category->link}}"
    class="flex bg-white p-4 shadow-md rounded-md items-center transition ease-in-out delay-100 hover:scale-105
    duration-300"> --}}
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
