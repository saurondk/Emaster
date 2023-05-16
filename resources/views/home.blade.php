@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <div class="card ">
               

                <div class="card-body ">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                      <br>
                      <h1 class="title" style="--duration: 3s">
                       <span style="--delay: 0.5s">Centros de estudio master</span><br>
                        <span style="--delay: 1.5s"> Aplicación para la gestión de licencias y componentes.</span>  <br> 
                    </h1>
                      
                    <hr>
                      <p class="slide">Creado por Aram Hernández Rodríguez</p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <style>
    /* Definir la animación para el título */
    @-webkit-keyframes focus-in-expand {
        0% {
            letter-spacing: -0.5em;
            -webkit-filter: blur(12px);
                    filter: blur(12px);
            opacity: 0;
        }
        100% {
            -webkit-filter: blur(0px);
                    filter: blur(0px);
            opacity: 1;
        }
        }
        @keyframes focus-in-expand {
        0% {
            letter-spacing: -0.5em;
            -webkit-filter: blur(12px);
                    filter: blur(12px);
            opacity: 0;
        }
        100% {
            -webkit-filter: blur(0px);
                    filter: blur(0px);
            opacity: 1;
        }
        }

    
    /* Aplicar la animación al título */
    h1,p {
       
     -webkit-animation: focus-in-expand 0.8s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    animation: focus-in-expand 0.8s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;

    } --}}
  
 
@endsection
