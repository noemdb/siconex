<nav class="nav nav-masthead justify-content-center">

    <a class="nav-link active" href="#">Inicio</a>

    <a class="nav-link" href="#">Contacto</a>

    <a class="nav-link" href="#">Ayuda</a>

    <a class="nav-link" href="#">

        <a href="#" class="nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Sistemas
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">


            <div class="d-flex flex-row align-items-center">
                <div class="p-2">

                    @component('layouts.partials.card.user')
                        {{--  --}}
                        {{--  --}}
                    @endcomponent

                </div>

                <div class="p-2">

                    @component('layouts.partials.navbar.list')
                        {{--  --}}
                        {{--  --}}
                    @endcomponent

                </div>
            </div>

            {{-- <div class="dropdown-divider"></div> --}}

        </div>

    </a>

</nav>