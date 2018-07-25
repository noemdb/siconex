<div class="card {{$textalign or 'text-justify'}} bd-callout bd-callout-{{$class or ''}} mt-2" id="panel-{{ $id or '' }}">
  
    @isset($imgurl)
        <img class="card-img-top" src="{{$imgurl}}" alt="Card image cap">
    @endisset

    @isset($header)
        <div class="card-header">
            <i class="{{ $iconTitle or '' }} text-{{ $class or 'default' }}"></i>
            <strong class="text-{{ $class or 'default' }}">{{ $header }}</strong>

            @isset($panelControls)
                <div class="float-right">
                    <a id="minimizer-{{ $id or '1' }}" data-id="collapse-{{ $id or '1' }}" class="text text-info p-1" data-toggle="collapse">
                        <i class="fas fa-chevron-up"></i>
                    </a>
                    <a id="close-{{ $id or '1' }}" data-id="panel-{{ $id or '1' }}" class="text text-danger p-1" data-toggle="collapse">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
            @endisset

        </div>
    @endisset

    <div id="collapse-{{ $id or '' }}" class="collapse {{$collapse or 'show'}}">
        
        @isset($body)    
            <div class="card-body p-1 m-1">
                {{$body}}
                @isset($buttomtext)
                  <a href="{{$buttomurl or ''}}" class="btn btn-{{$btnclass or 'primary'}} float-right">{{$buttomtext or ''}}</a>
                @endisset
            </div>    
        @endisset

        @isset($footertext)
            <div class="card-footer text-muted">
                {{$footertext}}
            </div>
        @endisset

    </div>

</div>


{{-- variables de entrada class,id,panelTitle,badge,panelBody,panelFooter --}}

@section('scripts')
    @parent
    <script type="text/javascript">
        
        $(function(){
        $('#close-{{ $id or '1' }}').on('click',function(){
                var idpanel = $(this).data('id'); //alert('123');
                $('#'+idpanel).fadeOut();
            })
        })
        
        $(function(){
        $('#minimizer-{{ $id or '1' }}').on('click',function(){
                var collapse = $(this).data('id'); //alert(collapse);
                $('#'+collapse).collapse('toggle');
                $(this).children('i').toggleClass('fa-chevron-up fa-chevron-down')
            })
        })
    </script>
@endsection

