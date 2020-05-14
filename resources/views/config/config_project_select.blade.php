@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Coordenador</div>
                <div class="card-body">
                  <div style="margin-bottom:2rem;">
                    <label>Selecione o coordenador para o seu projeto</label>
                    <select class="form-control">
                      <option>Selecione...</option>
                      @foreach($resultadoAllCoordenadores as $item)
                        <option onclick="addCoordenador({{$idProjeto}},{{$item->id}})">{{$item->nome}}</option>
                      @endforeach
                    </select>
                  </div>
                  <table class="table table-sm table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Area</th>
                        <th scope="col">Opções</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $cont=1 ?>
                      @foreach($allCoordenadores as $item)
                      <tr>
                        <th scope="row">{{$cont}}</th>
                        <td>{{$item->pessoa->nome}}</td>
                        <td>{{$item->pessoa->area}}</td>
                        <td>
                          <div><form id="formDelete" action="{{route('delete_coordenador')}}" method="post">
                                @csrf
                                <input type="hidden" name="idProjeto" value="{{$idProjeto}}">
                                <input type="hidden" name="idDocente" value="{{$item->pessoa->id}}">
                                <button class="btn btn-danger btn-sm" type="submit">Remover</button>
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

        <div class="col-md-12" style="margin-top:2rem;margin-bottom: 5rem;">
            <div class="card">
                <div class="card-header">Membros</div>
                <div class="card-body">
                  <div style="margin-bottom:2rem;">
                    <label>Selecione os membros do seu projeto</label>
                    <select class="form-control">
                      <option>Selecione...</option>
                      @foreach($resultadoAllMembros as $item)
                        <option onclick="addMembros({{$idProjeto}},{{$item->id}})">{{$item->nome}}</option>
                      @endforeach
                    </select>
                  </div>
                  <table class="table table-sm table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Opções</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $cont=1 ?>
                      @foreach($allMembros as $item)
                      <tr>
                        <th scope="row">{{$cont}}</th>
                        <td>{{$item->pessoa->nome}}</td>
                        <td>{{$item->pessoa->tipo}}</td>
                        <td>
                          <div><form id="formDelete" action="{{route('delete_membro')}}" method="post">
                                @csrf
                                <input type="hidden" name="idProjeto" value="{{$idProjeto}}">
                                <input type="hidden" name="idPessoa" value="{{$item->pessoa->id}}">
                                <button class="btn btn-danger btn-sm" type="submit">Remover</button>
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
<!-- add coordenador -->
<form id="idFormCoordenador" method="post">
  @csrf
  <input type="hidden" id="idProjetoCoordenador" name="idProjeto">
  <input type="hidden" id="idCoordenador" name="idCoordenador">
</form>
<!--x add coordenador x-->
<!-- add membro -->
<form id="idFormMembro" method="post">
  @csrf
  <input type="hidden" id="idProjetoMembro" name="idProjeto">
  <input type="hidden" id="idMembro" name="idMembro">
</form>
<!--x add membro x-->
<script type="application/javascript">
  function addCoordenador($idProjeto, $idCoordenador){
    document.getElementById("idProjetoCoordenador").value = $idProjeto;
    document.getElementById("idCoordenador").value = $idCoordenador;
    document.getElementById("idFormCoordenador").action = "{{route('add_coordenador')}}";
    document.getElementById("idFormCoordenador").submit();
  }
  function addMembros($idProjeto, $idCoordenador){
    document.getElementById("idProjetoMembro").value = $idProjeto;
    document.getElementById("idMembro").value = $idCoordenador;
    document.getElementById("idFormMembro").action = "{{route('add_membro')}}";
    document.getElementById("idFormMembro").submit();
  }
</script>
@endsection
