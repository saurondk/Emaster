@extends('layouts.app')

@section('template_title')
    Ordenadores
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                
{{-- Buscador --}}
<div class="body">
    <div class="search">
        <svg class="search__icon" viewBox="0 0 512 512" width="50" title="search">
          <path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z" />
        </svg>
        <form  role="searcho" method="GET" >
        <input type="text" class="search__input" autofocus placeholder=" Buscar" aria-label="Search" name="searcho" id="searcho" >
        </form>
        <svg class="search__close" viewBox="0 0 352 512" width="50" title="times">
          <path d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z" />
        </svg>
        <svg class="search__delete" viewBox="0 0 640 512" width="50" title="backspace">
          <path d="M576 64H205.26A63.97 63.97 0 0 0 160 82.75L9.37 233.37c-12.5 12.5-12.5 32.76 0 45.25L160 429.25c12 12 28.28 18.75 45.25 18.75H576c35.35 0 64-28.65 64-64V128c0-35.35-28.65-64-64-64zm-84.69 254.06c6.25 6.25 6.25 16.38 0 22.63l-22.62 22.62c-6.25 6.25-16.38 6.25-22.63 0L384 301.25l-62.06 62.06c-6.25 6.25-16.38 6.25-22.63 0l-22.62-22.62c-6.25-6.25-6.25-16.38 0-22.63L338.75 256l-62.06-62.06c-6.25-6.25-6.25-16.38 0-22.63l22.62-22.62c6.25-6.25 16.38-6.25 22.63 0L384 210.75l62.06-62.06c6.25-6.25 16.38-6.25 22.63 0l22.62 22.62c6.25 6.25 6.25 16.38 0 22.63L429.25 256l62.06 62.06z" />
        </svg>
      </div>
    </div>
{{-- fin buscador --}}

                <div class="card " id="ordenadorbody">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Ordenadores') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('ordenadores.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Ordenador') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        
                                        
										<th id="sort-usuario"><button class="btn custom-blue-hover">Identificador</button></th>
										<th id="sort-clave"><button class="btn custom-blue-hover">Marca</button></th>
										<th id="sort-fecha_compra"><button class="btn custom-blue-hover">Modelo</button></th>
										<th id="sort-fecha_expiracion"><button class="btn custom-blue-hover">Descripcion</button></th>
										<th id="sort-programa"><button class="btn custom-blue-hover">Ip</button></th>
										<th id="sort-ordenador"><button class="btn custom-blue-hover">Fecha Compra</button></th>
										<th id="sort-aula"><button class="btn custom-blue-hover">Nombre del Aula</button></th>

                                        <th></th>

                                      
                                    </tr>
                                </thead>
                                <tbody class="alldata">
                                    @foreach ($ordenadores as $ordenadore)
                                        <tr>
                                           
                                            
											<td>{{ $ordenadore->Identificador }}</td>
											<td>{{ $ordenadore->marca }}</td>
											<td>{{ $ordenadore->modelo }}</td>
											<td>{{ $ordenadore->descripcion }}</td>
											<td>{{ $ordenadore->ip }}</td>
											<td>{{ $ordenadore->fecha_compra }}</td>
											<td>{{ $ordenadore->aula->nombre }}</td>

                                            <td>
                                                <form action="{{ route('ordenadores.destroy',$ordenadore->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('ordenadores.show',$ordenadore->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('ordenadores.edit',$ordenadore->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Borrar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                 <tbody id="Content" class="searchdata"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $ordenadores->links() !!}
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            let sortOrder = 'asc';
        
            function sortTable(columnIndex, sortOrder, tableBody) {
                const rows = tableBody.querySelectorAll("tr");
                const sortedRows = Array.from(rows).sort((a, b) => {
                    const aText = a.children[columnIndex].innerText;
                    const bText = b.children[columnIndex].innerText;
        
                    if (aText < bText) {
                        return sortOrder === 'asc' ? -1 : 1;
                    }
                    if (aText > bText) {
                        return sortOrder === 'asc' ? 1 : -1;
                    }
                    return 0;
                });
        
                sortedRows.forEach(row => tableBody.appendChild(row));
            }
            $(document).ready(function() {
            // Realiza una búsqueda vacía al cargar la página
            searcho('');
        });
            $('table').on('click', 'th button', function() {
                const columnIndex = $(this).closest('th').index();
                sortOrder = (sortOrder === 'asc') ? 'desc' : 'asc';
        
                if ($('.searchdata').is(":visible")) {
                    sortTable(columnIndex, sortOrder, document.querySelector('tbody.searchdata'));
                } else {
                    sortTable(columnIndex, sortOrder, document.querySelector('tbody.alldata'));
                }
            });
        
            function searcho(value) {
                if (value) {
                    $('.alldata').hide();
                    $('.searchdata').show();
                } else {
                    $('.alldata').show();
                    $('.searchdata').hide();
                }
                $.ajax({
                    type: 'get',
                    url: '{{URL::to('searcho')}}',
                    data: { 'searcho': value },
                    success: function(data) {
                        console.log(data);
                        $('#Content').html(data);
                    }
                });
            }
        
            $('#searcho').on('keyup', function() {
                const inputValue = $(this).val();
                searcho(inputValue);
            });
        
            // Ejecutar la función de ordenación automáticamente después de que la página cargue
            const columnIndex = 0;
            sortTable(columnIndex, sortOrder, document.querySelector('tbody.alldata'));
        });
    </script>

   
    {{-- <script>
        // script para que se ordenen las tablas.
        $(document).ready(function() {
            let sortOrder = 'asc';
        
            function sortTable(columnIndex, sortOrder, tableBody) {
                const rows = tableBody.querySelectorAll("tr");
                const sortedRows = Array.from(rows).sort((a, b) => {
                    const aText = a.children[columnIndex].innerText;
                    const bText = b.children[columnIndex].innerText;
        
                    if (aText < bText) {
                        return sortOrder === 'asc' ? -1 : 1;
                    }
                    if (aText > bText) {
                        return sortOrder === 'asc' ? 1 : -1;
                    }
                    return 0;
                });
        
                sortedRows.forEach(row => tableBody.appendChild(row));
            }
        
            $('table').on('click', 'th button', function() {
                const columnIndex = $(this).closest('th').index();
                sortOrder = (sortOrder === 'asc') ? 'desc' : 'asc';
        
                if ($('.searchdata').is(":visible")) {
                    sortTable(columnIndex, sortOrder, document.querySelector('tbody.searchdata'));
                } else {
                    sortTable(columnIndex, sortOrder, document.querySelector('tbody.alldata'));
                }
            });
        
          
            $(document).ready(function() {
                // Realiza una búsqueda vacía al cargar la página
                searcho('');
            });
        
           
    
        });
    </script>
    
        <script>
            //script para el buscador
              function searcho(value) {
                if (value) {
                    $('.alldata').hide();
                    $('.searchdata').show();
                } else {
                    $('.alldata').show();
                    $('.searchdata').hide();
                }
                $.ajax({
                    type: 'get',
                    url: '{{URL::to('searcho')}}',
                    data: { 'searcho': value },
                    success: function(data) {
                        console.log(data);
                        $('#Content').html(data);
                    }
                });
                $('#searcho').on('keyup', function() {
                const inputValue = $(this).val();
                searcho(inputValue);
            });
            }
        </script> --}}

   
@endsection
