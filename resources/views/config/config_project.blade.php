@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" style="margin-top:-2rem;text-align:right;">
          <a href="{{ route('create_project') }}" class="btn btn-primary btn-lg">Criar um novo projeto</a>
        </div>
        <div class="col-md-12" style="margin-top:1rem;margin-bottom:5rem;">
            <div class="card">
                <div class="card-header">Projetos cadastrados</div>

                <div class="card-body">
                  <table class="table table-sm table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Views</th>
                        <th scope="col">Data de criação</th>
                        <th scope="col">Opções</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $cont=1 ?>
                      @foreach ($allProject as $item)
                      <tr>
                        <th scope="row">{{$cont}}</th>
                        <td>{{$item->titulo}}</td>
                        <td>{{$item->visualizacao}}</td>
                        <td>{{$item->created_at->format('d/m/Y')}}</td>
                        <td>
                          <div>
                              <!-- <button class="btn btn-primary btn-sm" id="ver{{$item->id}}" type="button" name="ver" value="{{$item}}" onclick="ver({{$item}})">Ver</button> -->
                              <!-- <button class="btn btn-secondary btn-sm" id="edit{{$item->id}}" type="button" name="editar" value="{{$item}}" onclick="editar({{$item}})">Editar</button> -->
                              <form id="formDelete" action="{{route('delete_project')}}" method="post">
                                @csrf
                                <input type="hidden" name="idProjeto" value="{{$item->id}}">
                              </form>
                              <a class="btn btn-secondary btn-sm" href="{{ route('edit_project', ['idProject'=>$item->id,]) }}" >Editar Projeto</a>
                              <a class="btn btn-secondary btn-sm" href="{{ route('select_project', ['idProject'=>$item->id,]) }}" >Editar Coo/Mem</a>
                              <button class="btn btn-danger btn-sm" id="delete{{$item->id}}" type="button" onclick="deletar()">Deletar</button>
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
    // document.getElementById("idDescricao").value = $item.conteudo;
    tinymce.get("idDescricao").setContent($item.conteudo);
    document.getElementById("idTipo").value = $item.tipo;
    document.getElementById("idCoordenador").value = $item.coordenador;

    document.getElementById("idTitulo").disabled = true;
    // document.getElementById("idDescricao").disabled = true;
    tinymce.get("idDescricao").setMode('readonly');
    document.getElementById("idTipo").disabled = true;
    document.getElementById("idCoordenador").disabled = true;

    // document.getElementById("botaoSalvarAtualizar").innerHTML = "Salvar";
    // document.getElementById("botaoSalvarAtualizar").style.display = "none";
  }
  function editar($item){
    document.getElementById("idTemp").value = $item.id;
    document.getElementById("idTitulo").value = $item.titulo;
    // document.getElementById("idDescricao").value = $item.conteudo;
    tinymce.get("idDescricao").setContent($item.conteudo);
    document.getElementById("idTipo").value = $item.tipo;
    document.getElementById("idCoordenador").value = $item.coordenador;

    document.getElementById("idTitulo").disabled = false;
    // document.getElementById("idDescricao").disabled = false;
    tinymce.get("idDescricao").setMode('design');
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
    // document.getElementById("idDescricao").value = '';
    tinymce.get("idDescricao").setContent("");
    document.getElementById("idTipo").value = '';
    document.getElementById("idCoordenador").value = '';

    document.getElementById("idTitulo").disabled = false;
    // document.getElementById("idDescricao").disabled = false;
    tinymce.get("idDescricao").setMode('design');
    document.getElementById("idTipo").disabled = false;
    document.getElementById("idCoordenador").disabled = false;

    document.getElementById("idForm").action = "{{route('add_project')}}";
  }
  function deletar(){
    if(confirm("Você deseja deletar?")){
        document.getElementById("formDelete").submit();
    }
  }
</script>
@endsection
