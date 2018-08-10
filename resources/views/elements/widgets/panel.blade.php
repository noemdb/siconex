{{-- variables de entrada class,id,panelTitle,badge,panelBody,panelFooter --}}

<div class="card card-{{ $class or 'default' }}">

  <div class="card-header">

    <h5 class="card-title">
        <i class="{{ $iconTitle or '' }} text-{{ $class or 'default' }}"></i>
        <strong>{{ $title or ''}}</strong>
    </h5>

    @if (isset($panelControls))
        <div class="card-control float-right">
            <span class="label label-info">{{ $badge or '' }}</span>&nbsp;
            <a id="minimizer-{{ $id or '1' }}" data-id="collapse-{{ $id or '1' }}" class="panelButton-info"><i class="glyphicon glyphicon-chevron-up"></i></a>
            <a id="close-{{ $id or '1' }}" data-id="card-{{ $id or '1' }}" class="panelButton-danger" ><i class="fa fa-remove"></i></a>
            
        </div>
    @endif

  </div>

  <div class="card-body">

    <h6 class="card-subtitle mb-2 text-muted">
        {{$subtitle or ''}}
    </h6>

    <p class="card-text">
        @if (isset($panelBody))
            <div class="card-body">
                {{ $panelBody }}
            </div>
        @endif
    </p>
    
  </div>

  @if (isset($panelFooter))
      <div class="card-footer text-muted">
        2 days ago
      </div>
  @endif

</div>

@section('scripts')
    @parent
    <script type="text/javascript">
        $(function(){
        $('#close-{{ $id or '1' }}').on('click',function(){
                var idpanel = $(this).data('id'); //alert(dismiss);
                $('#'+idpanel).fadeOut();
            })
        })
        $(function(){
        $('#minimizer-{{ $id or '1' }}').on('click',function(){
                var collapse = $(this).data('id'); //alert(collapse);
                $('#'+collapse).collapse('toggle');
                $(this).children('i').toggleClass('glyphicon glyphicon-chevron-up glyphicon glyphicon-chevron-down')
            })
        })
    </script>
@endsection

