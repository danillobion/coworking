@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Cadastrar um projeto</div>

                <div class="card-body">
                  <form id="idForm" action="{{ route('add_project') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                      <label>Titulo<a style="color:red;">*</a></label>
                      <input class="form-control @error('titulo') is-invalid @enderror form-control" type="text" id="idTitulo" name="titulo" value="{{ old('titulo') }}">
                      @error('titulo')
                        <div >
                          <a style="color:red;">{{ $message }}</a>
                        </div>
                      @enderror
                      <label>Tipo<a style="color:red;">*</a></label>
                      <input class="form-control @error('tipo') is-invalid @enderror form-control" type="text" id="idTipo" name="tipo" value="{{ old('tipo') }}">
                      @error('tipo')
                        <div >
                          <a style="color:red;">{{ $message }}</a>
                        </div>
                      @enderror
                      <div class="row" style="margin-left:-15px;margin-right:-15px;">
                        <div class="col-md-6">
                          <label>Data Início<a style="color:red;">*</a></label>
                          <input class="form-control @error('dataInicio') is-invalid @enderror form-control" type="date" id="idDataInicio" name="dataInicio" value="{{ old('dataInicio') }}">
                          @error('dataInicio')
                            <div >
                              <a style="color:red;">{{ $message }}</a>
                            </div>
                          @enderror
                        </div>
                        <div class="col-md-6">
                          <label>Data Termino<a style="color:red;">*</a></label>
                          <input class="form-control @error('dataTermino') is-invalid @enderror form-control" type="date" id="iddataTermino" name="dataTermino" value="{{ old('dataTermino') }}">
                          @error('dataTermino')
                            <div >
                              <a style="color:red;">{{ $message }}</a>
                            </div>
                          @enderror
                        </div>
                      </div>
                      <label>Descricao<a style="color:red;">*</a></label>
                      <textarea class="form-control @error('descricao') is-invalid @enderror form-control" rows="10" type="text" id="idDescricao" name="descricao">{{ old('descricao') }}</textarea>
                      @error('descricao')
                        <div >
                          <a style="color:red;">{{ $message }}</a>
                        </div>
                      @enderror
                      <label>Imagem<a style="color:red;">*</a></label>
                      <input type="file" class="form-control-file @error('imagemCapa') is-invalid @enderror form-control" id="imagemCapa" name="imagemCapa" value="{{ old('imagemCapa') }}" placeholder="Selecione um arquivo" />
                      @error('imagemCapa')
                        <div >
                          <a style="color:red;">{{ $message }}</a>
                        </div>
                      @enderror
                      <input type="hidden" id="idTemp" name="id" value=-1>
                      <button class="btn btn-primary" id="botaoSalvarAtualizar" type="submit" >Salvar</button>
                      <!-- <button class="btn btn-secondary" type="button" onclick="limpar()">Limpar</button> -->
                  </form>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
