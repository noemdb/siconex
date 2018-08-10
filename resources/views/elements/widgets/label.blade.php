{{-- variables de entrada class,id,panelTitle,badge,panelBody,panelFooter --}}

<div class="card card-{{ $class or 'default' }}">

  <div class="card-header">

    <h5 class="card-title">

        <div class="container">
          <div class="row">
            <div class="col-sm">
              <i class="{{ $iconTitle or '' }} text-{{ $class or 'default' }}"></i> 
            </div>
            <div class="col-sm text-{{$class or ''}} float-right">
                <div class="huge">{{$total or ''}}</div>
              <strong>{{ $title or ''}}</strong> 
            </div>
          </div>
        </div>

    </h5>

  </div>

  <div class="card-body">

    @if (isset($panelControls))
        <div class="float-right">

            <a class="btn btn-link" data-toggle="collapse" href="#bodycollapse" role="button" aria-expanded="false" aria-controls="collapseExample">
                <i class="{{$icon_menus['maximizar'] or ''}} text-danger"></i>
            </a>

        </div>
    @endif

    <h6 class="card-subtitle mb-2 text-muted">
        {{$subtitle or ''}}
    </h6>

    @if (isset($body))

        <div class="collapse" id="bodycollapse">
          <div class="card card-body p-1 m-1">
            {{ $body or '' }}
          </div>
        </div>
        
    @endif
    
  </div>

  @if (isset($footer))
      <div class="card-footer text-muted">
        {{ $footer or '' }}
      </div>
  @endif

</div>