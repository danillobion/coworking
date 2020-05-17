@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="margin-bottom:5rem;">
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
                      <div class="row" style="margin-left:-15px;margin-right:-15px;">
                        <div class="col-md-6">
                          <label>Tipo<a style="color:red;">*</a></label>
                          <select class="browser-default form-control @error('tipo') is-invalid @enderror" name="tipo">
                            <option value="" disable="" selected="" hidden="">-- Selecionar o Tipo --</option>
                            <option value="Desenvolvimento Tecnológico" @if(old('tipo') == "Desenvolvimento Tecnológico") selected @endif>Desenvolvimento Tecnológico</option>
                            <option value="Ensino" @if(old('tipo') == "Ensino") selected @endif>Ensino</option>
                            <option value="Extensão" @if(old('tipo') == "Extensão") selected @endif>Extensão</option>
                            <option value="Pesquisa" @if(old('tipo') == "Pesquisa") selected @endif>Pesquisa</option>
                          </select>
                          @error('tipo')
                          <div >
                            <a style="color:red;">{{ $message }}</a>
                          </div>
                          @enderror
                       </div>
                       <div class="col-md-6">
                         <label>Status<a style="color:red;">*</a></label>
                         <select class="browser-default form-control @error('status') is-invalid @enderror" name="status">
                           <option value="" disable="" selected="" hidden="">-- Selecione o Status --</option>
                           <option value="Andamento" @if(old('status') == "Andamento") selected @endif onclick="atualizarData('andamento')">Andamento</option>
                           <option value="Finalizado" @if(old('status') == "Finalizado") selected @endif onclick="atualizarData('finalizado')">Finalizado</option>
                           <input type="hidden" id="dataTermino" class="form-control @error('dataTermino') is-invalid @enderror form-control" name="dataTermino" value="{{ old('dataTermino') }}">
                         </select>
                         @error('status')
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
                      <button class="btn btn-success" id="botaoSalvarAtualizar" type="submit" style="margin-top:2rem; width:100%">Salvar</button>
                      <!-- <button class="btn btn-secondary" type="button" onclick="limpar()">Limpar</button> -->
                  </form>
                </div>
            </div>
        </div>

    </div>
</div>
<script type="application/javascript">
  function atualizarData($valor){
    // console.log($valor);
    let dNow = new Date();
    let localdate = dNow.getDate() + '/' + (dNow.getMonth()+1) + '/' + dNow.getFullYear();
    if($valor == "andamento"){
      document.getElementById("dataTermino").value = "";
    }else{
      document.getElementById("dataTermino").value = localdate;
    }
  }
</script>
@endsection
