{{-- variables de entrada class,id,panelTitle,badge,panelBody,panelFooter --}}

<div class="card card-{{ $class or 'default' }}">

  <div class="card-header">

    <h5 class="card-title">

        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <i class="{{ $iconTitle or '' }} text-{{ $class or 'default' }}"></i>
            </div>
            <div class="col-sm-8 text-{{$class or ''}}">
              <div class="row">
                <div class="col-sm-12">
                  <h2><span class="badge badge-{{ $class or 'default' }} float-right">{{$total or ''}}</span></h2>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 text-right ">
                  {{ $title or ''}}
                </div>
              </div>
            </div>
          </div>
        </div>

    </h5>

  </div>

  <div class="card-body p-1 m-1 ">

    {{-- <div class="card-header" id="headingOne"> --}}
      <a class="btn btn-link" data-toggle="collapse" href="#{{ $id or '' }}-bodycollapse" role="button" aria-expanded="false" aria-controls="{{ $id or '' }}-bodycollapse" style="text-decoration: none;">
        {{$subtitle or ''}}...
      </a>
    {{-- </div> --}}

    @if (isset($body))

        <div class="collapse" id="{{ $id or '' }}-bodycollapse">
          <div class="card card-body p-1 m-1 border-0">
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