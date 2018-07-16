<div class="card bd-callout bd-callout-{{{ Auth::user()->is_active=="Activo" ? 'primary' : 'default' }}}" style="margin-top: 0rem !important;">

    <img class="card-img-top" style="width: 6rem; margin-left: auto; margin-right: auto;" src="{{ (isset($profile->url_img)) ? asset($profile->url_img) : asset('images/avatar/user_default.png') }}" alt="Card image cap">

    <div class="card-body">

        {{-- <h6 class="badge badge-{{{ Auth::user()->is_active=="Activo" ? 'primary' : 'default' }}} mb-2 float-right">{{ Auth::user()->is_active }}</h6>                 --}}
        <h5 class="card-title text-center">
            {{-- <i class="fas fa-user"></i> --}}

            <b>{{ Auth::user()->username }}</b>
        </h5>

        {{-- <h6 class="card-subtitle mb-2 text-right"> --}}
        {{--   <b>Sesión iniciada correctamete!</b><br>  --}}
        {{-- </h6> --}}

        <p class="card-text">

            {{ Auth::user()->profile->full_name }}<br>
            {{ Auth::user()->email }}<br>
            {{ Auth::user()->is_active }}

            {{-- {{ Auth::user()->profile->created_at }}<br> --}}
            {{-- {{ Auth::user()->profile->updated_at }} --}}
            <div class="text-right">
                <a href="#" class="btn btn-info">Más</a>
            </div>
        </p>



    </div>

</div>