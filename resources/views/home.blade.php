@extends('layout')
@section('title', "Home ")

@section('content')
    <div class="container">
        <h1 class="display-4">Importancia de Layouts Y partes de template</h1>
        <p class="text-justify">Los layouts pueden ayudar mucho a la reutilizacion de codigo, ya que son algo asi como
            plantillas para hacer paginas, en esta se definen partes indispensables de una pagina como el menu y 
            el footer, que seran los mismos en varias paginas, esto permite no tener que escrubir este codigo
            en cada pagina individualmente, simplemente se indica que esa pagina extiende del layout y listo.

            Los template parts son utiles tambien, para tener separados los elements de una pagina y no tener
            todo en un solo archivo gigante.
        </p>

    <h3>Date: {{ $date ?? "not date available" }}</h3>
    </div>    

@endsection