@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5" style="margin-top:0.5rem; margin-bottom:1rem;">
            <div class="card">
                <div class="card-header">Cadastrar pessoas</div>

                <div class="card-body">
                  <form id="idForm" method="post" enctype="multipart/form-data">
                    @csrf
                      <label>Tipo<a style="color:red;">*</a></label>
                      <select class="@error('tipo') is-invalid @enderror form-control" id="idTipo" name="tipo" value="{{ old('tipo') }}">

                          <option @if(old('tipo') == "Discente") selected @endif value="Discente" onclick="tipoPessoa(0)">Discente</option>
                          <option @if(old('tipo') == "Docente") selected @endif value="Docente" onclick="tipoPessoa(1)">Docente</option>
                          <option @if(old('tipo') == "Egresso") selected @endif value="Egresso" onclick="tipoPessoa(0)">Egresso</option>

                      </select>
                      @error('tipo')
                      <div >
                        <a style="color:red;">{{ $message }}</a>
                      </div>
                      @enderror
                      <label>Nome<a style="color:red;">*</a></label>
                      <input class="form-control @error('nome') is-invalid @enderror form-control" type="text" id="idNome" name="nome" value="{{ old('nome') }}">
                      @error('nome')
                        <div >
                          <a style="color:red;">{{ $message }}</a>
                        </div>
                      @enderror
                      <div id="idDivArea">
                        <label>Área<a style="color:red;">*</a></label>
                        <input class="form-control @error('area') is-invalid @enderror form-control" type="text" id="idArea" name="area" value="{{ old('area') }}" disabled>
                        @error('area')
                          <div >
                            <a style="color:red;">{{ $message }}</a>
                          </div>
                        @enderror
                      </div>
                      <label>Lattes</label>
                      <input class="form-control @error('lattes') is-invalid @enderror form-control" rows="10" type="text" id="idLattes" name="lattes" placeholder="exemplo: http://buscatextual.cnpq.br/buscatextual/" value="{{ old('lattes') }}"></input>
                      @error('lattes')
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
                      <button class="btn btn-success" id="botaoSalvarAtualizar" type="button" onclick="salvar(-1)" style="margin-top:40px; margin-bottom: 5px; width:100%">Salvar</button>
                  </form>
                </div>
            </div>
        </div>
        <div class="col-md-7" style="margin-top:0.5rem; margin-bottom:1rem;">
            <div class="card">
                <div class="card-header">Lista de pessoas cadastradas</div>

                <div class="card-body">
                  <table class="table table-sm table-hover">
                    <thead>
                      <tr>

                        <th scope="col">Nome</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Área</th>
                        <th scope="col">Data de criação</th>
                        <th scope="col">Opções</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $cont=1 ?>
                      @foreach ($allPessoas as $item)
                      <tr>

                        <td>{{$item->nome}}</td>
                        <td>{{$item->tipo}}</td>
                        @if($item->area == "null")
                          <td>...</td>
                        @else
                          <td>{{$item->area}}</td>
                        @endif
                        <td>{{$item->created_at->format('d/m/Y')}}</td>
                        <td>
                          <div>
                              <button class="btn btn-primary btn-sm" id="ver{{$item->id}}" type="button" name="ver" value="{{$item}}" onclick="ver({{$item}})">Ver</button>
                              <button class="btn btn-secondary btn-sm" id="edit{{$item->id}}" type="button" name="editar" value="{{$item}}" onclick="editar({{$item}})">Editar</button>
                              <form id="formDelete" action="{{route('delete_pessoa')}}" method="post">
                                @csrf
                                <input type="hidden" name="idPessoa" value="{{$item->id}}">
                                <button class="btn btn-danger btn-sm" id="delete{{$item->id}}" type="submit" >Deletar</button>
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
    document.getElementById("idNome").value = $item.nome;
    document.getElementById("idTipo").value = $item.tipo;
    if($item.area == "null"){
      document.getElementById("idArea").value = "";
    }else{
      document.getElementById("idArea").value = $item.area;
    }
    document.getElementById("idLattes").value = $item.lattes;

    document.getElementById("idNome").disabled = true;
    document.getElementById("idTipo").disabled = true;
    document.getElementById("idArea").disabled = true;
    document.getElementById("idLattes").disabled = true;
  }
  function editar($item){
    document.getElementById("idTemp").value = $item.id;
    document.getElementById("idNome").value = $item.nome;
    document.getElementById("idTipo").value = $item.tipo;
    document.getElementById("idLattes").value = $item.lattes;

    if($item.tipo == "Discente" || $item.tipo == "Egresso"){
      document.getElementById("idArea").disabled = true;
      document.getElementById("idArea").value = "null";
    }else{
      document.getElementById("idArea").disabled = false;
      document.getElementById("idArea").value = $item.area;
    }

    document.getElementById("idLattes").value = $item.lattes;

    document.getElementById("idNome").disabled = false;
    document.getElementById("idTipo").disabled = false;
    document.getElementById("idLattes").disabled = false;
  }
  function salvar($id){
    //nova pessoa
    if(document.getElementById("idTemp").value == -1){
      if(document.getElementById("idArea").value == ""){ //aluno e egresso
        console.log(document.getElementById("idArea").value);
        document.getElementById("idArea").value = "null";
        document.getElementById("idForm").action = "{{route('add_pessoa')}}";
        document.getElementById("idForm").submit();
      }else{ //professor
        document.getElementById("idForm").action = "{{route('add_pessoa')}}";
        document.getElementById("idForm").submit();
      }
    //editar pessoa
    }else{
      document.getElementById("idForm").action = "{{route('edit_pessoa')}}";
      document.getElementById("idForm").submit();
    }
  }

  function deletar($valor){
    if(confirm("Você deseja deletar?")){
        document.getElementById("idPessoa".$valor).value = $valor;
        document.getElementById("formDelete").submit();
    }
  }
  function tipoPessoa($valor){
    if($valor == 0){
      document.getElementById("idArea").disabled = true;
      document.getElementById("idArea").placeholder = "";
      document.getElementById("idArea").value = '';
    }else{
      document.getElementById("idArea").disabled = false;
      document.getElementById("idArea").placeholder = "ex. Matemática, Física...";
    }
  }
</script>
@endsection
