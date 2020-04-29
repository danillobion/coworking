@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Cadastrar uma news</div>

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
                      <label>Descricao<a style="color:red;">*</a></label>
                      <textarea class="form-control @error('descricao') is-invalid @enderror form-control" rows="10" type="text" id="idDescricao" name="descricao">{{ old('descricao') }}</textarea>
                      @error('descricao')
                        <div >
                          <a style="color:red;">{{ $message }}</a>
                        </div>
                      @enderror
                      <label>Destaque<a style="color:red;">*</a></label>
                      <!-- <input class="form-control" type="text" id="idCoordenador" name="coordenador" value=""> -->
                      <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio1" name="customRadio" value="true" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio1">Sim, quero deixar essa notícia em destaque</label>
                      </div>
                      <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio2" name="customRadio" value="false" class="custom-control-input" checked="true">
                        <label class="custom-control-label" for="customRadio2">Não.</label>
                      </div>
                      <label>Imagem</label>
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
                <div class="card-header">News cadastradas</div>

                <div class="card-body">
                  <table class="table table-sm table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Conteudo(a)</th>
                        <th scope="col">Views</th>
                        <th scope="col">Data</th>
                        <th scope="col">Destaque</th>
                        <th scope="col">Status</th>
                        <th scope="col">Opções</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $cont=1 ?>
                      @foreach ($allNews as $item)
                      <tr>
                        <th scope="row">{{$cont}}</th>
                        <td>{{$item->titulo}}</td>
                        <td>{{$item->conteudo}}</td>
                        <td>{{$item->visualizacao}}</td>
                        <td>dd/mm/aaaa</td>
                        @if($item->destaque == 0)
                          <td>NÃO</td>
                        @else
                          <td>SIM</td>
                        @endif
                        <td>???</td>
                        <td>
                          <div>
                              <button class="btn btn-primary btn-sm" id="ver{{$item->id}}" type="button" name="ver" value="{{$item}}" onclick="ver({{$item}})">Ver</button>
                              <button class="btn btn-secondary btn-sm" id="edit{{$item->id}}" type="button" name="editar" value="{{$item}}" onclick="editar({{$item}})">Editar</button>
                              <form action="{{route('delete_news')}}" method="post">
                                @csrf
                                <input type="hidden" name="idNews" value="{{$item->id}}">
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

    if($item.destaque == true){
      document.getElementById("customRadio1").checked = true;
      document.getElementById("customRadio2").checked = false;
    }else{
      document.getElementById("customRadio1").checked = false;
      document.getElementById("customRadio2").checked = true;
    }

    document.getElementById("idTitulo").disabled = true;
    document.getElementById("idDescricao").disabled = true;
    document.getElementById("customRadio1").disabled = true;
    document.getElementById("customRadio2").disabled = true;
  }
  function editar($item){
    console.log($item.id);
    document.getElementById("idTemp").value = $item.id;
    document.getElementById("idTitulo").value = $item.titulo;
    document.getElementById("idDescricao").value = $item.conteudo;
    if($item.destaque == true){
      document.getElementById("customRadio1").checked = true;
      document.getElementById("customRadio2").checked = false;
    }else{
      document.getElementById("customRadio1").checked = false;
      document.getElementById("customRadio2").checked = true;
    }
    // document.getElementById("imagemCapa").name = $item.imagemCapa;
    // console.log($item.imagemCapa);

    document.getElementById("idTitulo").disabled = false;
    document.getElementById("idDescricao").disabled = false;
    document.getElementById("customRadio1").disabled = false;
    document.getElementById("customRadio2").disabled = false;
  }
  function salvar($id){
    //nova news
    if(document.getElementById("idTemp").value == -1){
      document.getElementById("idForm").action = "{{route('add_news')}}";
      document.getElementById("idForm").submit();
    //editar news
    }else{
      document.getElementById("idForm").action = "{{route('edit_news')}}";
      document.getElementById("idForm").submit();
    }
  }
  function limpar(){
    document.getElementById("idTemp").value =-1;
    document.getElementById("idTitulo").value = '';
    document.getElementById("idDescricao").value = '';

    document.getElementById("idTitulo").disabled = false;
    document.getElementById("idDescricao").disabled = false;

    document.getElementById("idForm").action = "{{route('add_news')}}";

    document.getElementById("customRadio1").checked = false;
    document.getElementById("customRadio2").checked = true;
  }
</script>
@endsection
