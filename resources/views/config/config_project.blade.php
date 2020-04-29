@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Cadastrar um projeto</div>

                <div class="card-body">
                  <form id="idForm" method="post" enctype="multipart/form-data">
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
                      <label>Coordenador<a style="color:red;">*</a></label>
                      <input class="form-control @error('coordenador') is-invalid @enderror form-control" type="text" id="idCoordenador" name="coordenador" value="{{ old('coordenador') }}">
                      @error('coordenador')
                        <div >
                          <a style="color:red;">{{ $message }}</a>
                        </div>
                      @enderror
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
                      <button class="btn btn-primary" id="botaoSalvarAtualizar" type="button" onclick="salvar(-1)">Salvar</button>
                      <button class="btn btn-secondary" type="button" onclick="limpar()">Limpar</button>
                  </form>
                </div>
            </div>
        </div>
        <div class="col-md-12" style="margin-top:1rem;">
            <div class="card">
                <div class="card-header">Projetos cadastrados</div>

                <div class="card-body">
                  <table class="table table-sm table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Coordenador(a)</th>
                        <th scope="col">Views</th>
                        <th scope="col">Data</th>
                        <th scope="col">Status</th>
                        <th scope="col">Opções</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $cont=1 ?>
                      @foreach ($allProject as $item)
                      <tr>
                        <th scope="row">{{$cont}}</th>
                        <td>{{$item->titulo}}</td>
                        <td>{{$item->coordenador}}</td>
                        <td>{{$item->visualizacao}}</td>
                        <td>dd/mm/aaaa</td>
                        <td>???</td>
                        <td>
                          <div>
                              <button class="btn btn-primary btn-sm" id="ver{{$item->id}}" type="button" name="ver" value="{{$item}}" onclick="ver({{$item}})">Ver</button>
                              <button class="btn btn-secondary btn-sm" id="edit{{$item->id}}" type="button" name="editar" value="{{$item}}" onclick="editar({{$item}})">Editar</button>
                              <form action="{{route('delete_project')}}" method="post">
                                @csrf
                                <input type="hidden" name="idProjeto" value="{{$item->id}}">
                                <button class="btn btn-danger btn-sm" id="delete{{$item->id}}" type="submit">Deletar</button>
                              </form>

                          </div>
                        </td>
                      </tr>
                      <?php $cont=$cont+1; ?>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="application/javascript">
  function ver($item){
    document.getElementById("idTitulo").value = $item.titulo;
    document.getElementById("idDescricao").value = $item.conteudo;
    document.getElementById("idTipo").value = $item.tipo;
    document.getElementById("idCoordenador").value = $item.coordenador;

    document.getElementById("idTitulo").disabled = true;
    document.getElementById("idDescricao").disabled = true;
    document.getElementById("idTipo").disabled = true;
    document.getElementById("idCoordenador").disabled = true;

    // document.getElementById("botaoSalvarAtualizar").innerHTML = "Salvar";
    // document.getElementById("botaoSalvarAtualizar").style.display = "none";
  }
  function editar($item){
    document.getElementById("idTemp").value = $item.id;
    document.getElementById("idTitulo").value = $item.titulo;
    document.getElementById("idDescricao").value = $item.conteudo;
    document.getElementById("idTipo").value = $item.tipo;
    document.getElementById("idCoordenador").value = $item.coordenador;

    document.getElementById("idTitulo").disabled = false;
    document.getElementById("idDescricao").disabled = false;
    document.getElementById("idTipo").disabled = false;
    document.getElementById("idCoordenador").disabled = false;
  }
  function salvar($id){
    //novo projeto
    if(document.getElementById("idTemp").value == -1){
      document.getElementById("idForm").action = "{{route('add_project')}}";
      document.getElementById("idForm").submit();
    //editar projeto
    }else{
      document.getElementById("idForm").action = "{{route('edit_project')}}";
      document.getElementById("idForm").submit();
    }
  }
  function limpar(){
    document.getElementById("idTemp").value =-1;
    document.getElementById("idTitulo").value = '';
    document.getElementById("idDescricao").value = '';
    document.getElementById("idTipo").value = '';
    document.getElementById("idCoordenador").value = '';

    document.getElementById("idTitulo").disabled = false;
    document.getElementById("idDescricao").disabled = false;
    document.getElementById("idTipo").disabled = false;
    document.getElementById("idCoordenador").disabled = false;

    document.getElementById("idForm").action = "{{route('add_project')}}";
  }
</script>
@endsection
