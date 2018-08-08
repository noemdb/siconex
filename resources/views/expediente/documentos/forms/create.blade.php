<div class="card bd-callout bd-callout-{{ $class_form_create_task or 'form' }}">
  <div class="card-header font-weight-bold">
    Formulario para el registro de una nuevo Documento.
  </div>
  <div class="card-body">

      {{-- <form> --}}
      {!! Form::open(['route' => 'documentos.store', 'method' => 'POST', 'id'=>'form-documento-create']) !!}

          {{-- partial con el formulario y campos --}}
          @include('expediente.documentos.forms.fields')

          <button type="submit" class="btn-documento-create btn btn-primary btn-block" value="create" data-user="{{$user->id or 'create'}}">
              <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
              Registrar
          </button>
          <button type="reset" class="btn-documento-reset btn btn-info btn-block" value="Reset">
              <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
              Reset
          </button>

      {!! Form::close() !!}
      {{-- </form> --}}

  </div>
</div>