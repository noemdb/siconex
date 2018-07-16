<div class="dropdown btn btn-{{ $class or 'default'}} p-0 m-0" title="{{ $title or 'default'}}">

  <button class="btn btn-{{ $class or 'default'}} dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="{{ $icon or 'default'}}"></i>
  </button>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

    {{ $dropdown or 'dropdown' }}

  </div>

</div>