@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="margin-bottom:5rem;">
                <div class="card-header">Editar projeto</div>

                <div class="card-body">
                  <form id="idForm" action="{{ route('update_project') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                      <label>Titulo<a style="color:red;">*</a></label>
                      <input class="form-control @error('titulo') is-invalid @enderror form-control" type="text" id="idTitulo" name="titulo" value="{{ $projeto->titulo }}">
                      @error('titulo')
                        <div >
                          <a style="color:red;">{{ $message }}</a>
                        </div>
                      @enderror
                      <label>Tipo<a style="color:red;">*</a></label>
                      <!-- <input class="form-control @error('tipo') is-invalid @enderror form-control" type="text" id="idTipo" name="tipo" value="{{ $projeto->tipo }}"> -->
                      <select class="browser-default form-control @error('tipo') is-invalid @enderror" name="tipo">
                        <option value="" disable="" selected="" hidden="">-- Selecionar o Tipo --</option>
                        <option value="Desenvolvimento Tecnológico" @if($projeto->tipo == "Desenvolvimento Tecnológico") selected @endif>Desenvolvimento Tecnológico</option>
                        <option value="Ensino" @if($projeto->tipo == "Ensino") selected @endif>Ensino</option>
                        <option value="Extensão" @if($projeto->tipo == "Extensão") selected @endif>Extensão</option>
                        <option value="Pesquisa" @if($projeto->tipo == "Pesquisa") selected @endif>Pesquisa</option>
                      </select>
                      @error('tipo')
                        <div >
                          <a style="color:red;">{{ $message }}</a>
                        </div>
                      @enderror
                      <div class="row" style="margin-left:-15px;margin-right:-15px;">
                        <div class="col-md-6">
                          <label>Data Início<a style="color:red;">*</a></label>
                          <input class="form-control @error('dataInicio') is-invalid @enderror form-control" type="date" id="idDataInicio" name="dataInicio" value="{{ $projeto->dataInicio }}">
                          @error('dataInicio')
                            <div >
                              <a style="color:red;">{{ $message }}</a>
                            </div>
                          @enderror
                        </div>
                        <div class="col-md-6">
                          <label>Data Termino<a style="color:red;">*</a></label>
                          <input class="form-control @error('dataTermino') is-invalid @enderror form-control" type="date" id="iddataTermino" name="dataTermino" value="{{ $projeto->dataTermino }}">
                          @error('dataTermino')
                            <div >
                              <a style="color:red;">{{ $message }}</a>
                            </div>
                          @enderror
                        </div>
                      </div>
                      <label>Descricao<a style="color:red;">*</a></label>
                      <textarea class="form-control @error('descricao') is-invalid @enderror form-control" rows="10" type="text" id="idDescricao" name="descricao">{{ $projeto->conteudo }}</textarea>
                      @error('descricao')
                        <div >
                          <a style="color:red;">{{ $message }}</a>
                        </div>
                      @enderror
                      <label>Imagem<a style="color:red;">*</a></label>
                      <input type="file" class="form-control-file @error('imagemCapa') is-invalid @enderror form-control" id="imagemCapa" name="imagemCapa" value="{{ $projeto->imagemCapa }}" placeholder="Selecione um arquivo" />
                      @error('imagemCapa')
                        <div >
                          <a style="color:red;">{{ $message }}</a>
                        </div>
                      @enderror
                      <input type="hidden" id="idTemp" name="id" value="{{$projeto->id}}">
                      <button class="btn btn-success" id="botaoSalvarAtualizar" type="submit" style="margin-top:2rem; width:100%">Atualizar</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
