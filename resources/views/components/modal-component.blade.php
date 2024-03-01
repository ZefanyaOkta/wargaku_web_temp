<dialog id="{{ $modalId }}" class="modal modal-bottom sm:modal-middle" data-theme="cupcake">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
          </form>
        <h3 class="font-bold text-lg">{{$title}}</h3>
        {{$slot}}
    </div>
</dialog>
