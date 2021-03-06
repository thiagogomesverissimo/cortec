@extends('master')

@section('content')
  <form method="POST" name="corpus" action="/corporas/{{ $corpora_id }}/corpus">
      {{ csrf_field() }}

      <div class="form-group">
        <legend class="col-form-label">Idioma</legend>
        <select class="custom-select" id="idioma" name="idioma">
          <option selected value="pt">Português</option>
          <option value="en">Inglês</option>
        </select>
      </div>

      <div class="form-group">
        <legend class="col-form-label">Qual forma inserir o Corpus?</legend>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="modo" id="campo" value="campo" checked data-show="#div_conteudo">
          <label class="form-check-label" for="campo">
            Campo de digitação
          </label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="modo" id="upload" value="upload" data-show="#div_upload">
          <label class="form-check-label" for="upload">
            Upload de arquivo de texto (.txt)
          </label>
        </div>
      </div>

      <div id='fields'>
        <div class="form-group" id="div_conteudo">
          <label for="conteudo">Conteúdo</label>
          <textarea class="form-control" id="conteudo" name="conteudo" rows="5" required oninvalid="LibComet.showHideFields(['#div_conteudo']);document.getElementById('campo').checked=true"></textarea>
        </div>

        <div class="form-group d-none" id="div_upload">
          <label for="upload_field">Upload</label>
          <input type="file" class="form-control-file" id="upload_field" name="upload_field" accept=".txt">
        </div>
      </div>

      <button type="submit" class="btn btn-success">Salvar</button>
  </form>
@endsection


@section('javascripts')
  @parent
  <script type="text/javascript" src="{{ asset('/js/corpuses/form.js') }}"></script>
@endsection
