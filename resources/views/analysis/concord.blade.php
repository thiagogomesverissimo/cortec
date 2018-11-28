@extends('master')

@section('content')
  <div class="container">
    <div class="row align-items-center ">
      <div class="col">
        <p>Foram encontradas {{$ocorrencias->count()}} ocorrências!! Fazer <a href="#">DOWNLOAD</a> do resultado.</p>
        <p>Clique na palavra de busca para obter um contexto expandido com 150 caracteres</p>
      </div>
    </div>
    <div class="row align-items-center mt-3">
      <div class="col">
        <table class="table lista-palavras" id="tbl-lista-palavras">
          <thead>
            <th class="text-center">#</th>
            <th class="text-center">Ocorrência</th>
          </thead>
          @php
            $i = 1;
          @endphp
          @foreach ($ocorrencias as $ocorrencia)
            <tr>
              <td class="text-center">{{$i++}}</td>
              <td class="text-center">{!! $ocorrencia !!}</td>
            </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
@endsection



@section('javascripts')
  @parent
  <script type="text/javascript" src="{{ asset('/js/corpuses/analise_lista_palavras.js') }}"></script>
@endsection