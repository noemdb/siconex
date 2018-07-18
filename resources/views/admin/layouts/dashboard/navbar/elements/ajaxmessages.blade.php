{{-- INI dropdown-messages --}}
<a class="dropdown-toggle alert-primary btn" data-toggle="dropdown" href="#">
    <i class="fa fa-comments fa-fw fa-2x"></i> <i class="fa fa-caret-down"></i>
    <span class="label label-primary" id="span_count_msn"></span>        
</a>

<ul class="dropdown-menu dropdown-messages">    
    <li>
        <ul class="list-group" id="ulresults-messages"></ul>
    </li>
</ul>

@section('scripts')
    @parent

    {{-- INI funciones para generar el badge en la navbar superior --}}
    <script>
 
        $( document ).ready(function() {
            // console.log( "ready!" );
            var count_msn = $('#span_count_msn'); //console.log( count_msn.text() );

            var url = "{{route('getmessenges')}}"; //alert(url);
            $.ajax({
              type: "GET",
              url: url, // This is the URL to the API
              data: { model: 'messeges' } // rango dias meses o años para la data a mostrar
            })
            .done(function( data ) { //console.log(data);
                apidata = JSON.parse(data); //console.log(apidata);
                var num_msn = apidata.length; //console.log(num_msn);
                count_msn.text(num_msn);

                ul = $("#ulresults-messages");
                var limit = apidata.length;
                if(limit>4)
                    limit = 4;
                for (var i = 0, l = limit; i < l; ++i) {
                   ul.append(
                        $('<li class="list-group-item text-overflow">').
                            append(
                                $('<span>').attr('class', 'text-'+apidata[i].tipo).
                                    append(
                                        $('<i>').attr('class', 'fa fa-user fa-fw')
                                )
                            ).append(
                                $('<span>').attr('class', 'text-'+apidata[i].tipo).
                                    append(
                                        ' <b>' + apidata[i].user.username + '</b><br>' + apidata[i].mensaje+'<br>'
                                    ).
                                    append(
                                        $('<span>').attr('class', 'small').append(
                                                apidata[i].created_at
                                            )
                                    )
                            )
                        );
                }
                ul.append("<a href='#'>Mas...</a>")
               
            })
            .fail(function() {
                console.log( "error occured" );
            });

        });

    </script>
    {{-- FIN funciones para generar los Chart --}}

@endsection