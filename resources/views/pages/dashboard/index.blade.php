<x-app-layout page="Beranda">
    <div>
        <div class="p-5">
            <span class=" text-3xl text-graytitle font-medium">Layanan WargaKu</span>
        </div>
    </div>

    {{-- <div class="flex">
        <div class="flex w-60 h-30 items-center bg-white shadow-md rounded-md m-3">
            <img class="w-20 ml-2 mr-1" src="{{ url('images/logo/wargaku_photo.png') }}" alt="Logo" />
    <div class="text-lg">Pengaduan Masyarakat</div>
    </div>
    <div class="flex w-60 h-30 items-center bg-white shadow-md rounded-md m-3">
        <img class="w-20 ml-2 mr-1" src="{{ url('images/logo/wargaku_photo.png') }}" alt="Logo" />
        <div class="text-lg">Pengaduan Masyarakat</div>
    </div>
    <div class="flex w-60 h-30 items-center bg-white shadow-md rounded-md m-3">
        <img class="w-20 ml-2 mr-1" src="{{ url('images/logo/wargaku_photo.png') }}" alt="Logo" />
        <div class="text-lg">Pengaduan Masyarakat</div>
    </div>
    </div> --}}

    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 md:grid-cols-3 p-4">
        @foreach ($categories as $category)
        <a href="{{$category->link}}" class="flex bg-white p-4 shadow-md rounded-md items-center transition ease-in-out delay-100 hover:scale-105 duration-300">
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
</x-app-layout>
