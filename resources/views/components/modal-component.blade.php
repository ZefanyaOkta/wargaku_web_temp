<dialog id="{{ $modalId }}" class="modal modal-bottom sm:modal-middle" data-theme="cupcake">
    <div style="max-width: 52rem" class="modal-box w-full">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
          </form>
        <h3 class="font-bold text-lg">{{$title}}</h3>
        {{$slot}}
    </div>
</dialog>
