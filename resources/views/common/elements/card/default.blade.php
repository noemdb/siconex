<div class="card {{$textalign or 'text-justify'}} bd-callout bd-callout-{{$class or ''}} mt-2">
  @isset($imgurl)
    <img class="card-img-top" src="{{$imgurl}}" alt="Card image cap">
  @endisset
  <div class="card-header">
    {{$header or ''}}
  </div>
  <div class="card-body">
    {{$body or ''}}
    @isset($buttomtext)
      <a href="{{$buttomurl or ''}}" class="btn btn-{{$btnclass or 'primary'}} float-right">{{$buttomtext or ''}}</a>
    @endisset
  </div>
  @isset($footertext)
  <div class="card-footer text-muted">
    {{$footertext or ''}}
  </div>
  @endisset
</div>