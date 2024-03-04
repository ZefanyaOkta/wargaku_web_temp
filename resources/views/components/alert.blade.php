<div class="flex rounded-lg p-4 mb-4 text-sm
  @if($type=='success')
  bg-success text-white
  @elseif ($type=='warning')
  bg-warning text-white
  @elseif($type=='danger')
  bg-danger text-white
  @endif
" role="alert">
  {{$slot}}
</div>
