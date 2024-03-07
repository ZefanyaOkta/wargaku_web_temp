<li>
    <a class="group relative flex items-center gap-2 px-4 py-2 text-md font-normal text-gray-200 duration-300 ease-in-out hover:bg-white hover:text-primaryRed rounded-lg hover:shadow-md dark:hover:bg-meta-4"
        href="{{ route($href) }}" @click="selected = (selected === '{{ $title }}' ? '' : '{{ $title }}')"
        :class="{ 'bg-white text-primaryRed': (selected === '{{ $title }}') && (page === '{{ $title }}') }">

        <span class="w-6">
            <i class="{{ $icon ?? "" }}"></i>
        </span>

        {{ $title }}
    </a>
</li>
