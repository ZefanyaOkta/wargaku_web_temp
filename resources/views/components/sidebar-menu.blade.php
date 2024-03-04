<li>
    <a class="group relative flex items-center gap-4 px-4 py-2 text-md font-light text-gray-200 duration-300 ease-in-out hover:bg-white hover:text-primaryRed rounded-lg hover:shadow-md dark:hover:bg-meta-4"
        href="{{ route($href) }}" @click="selected = (selected === '{{ $title }}' ? '' : '{{ $title }}')"
        :class="{ 'bg-white text-primaryRed': (selected === '{{ $title }}') && (page === '{{ $title }}') }">

        <i class="{{ $icon ?? "" }}"></i>

        {{ $title }}
    </a>
</li>
