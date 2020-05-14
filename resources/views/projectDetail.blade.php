@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10 titulo2" style="text-align: center; margin-bottom:1rem">Projeto</div>
      <div class="col-md-10"  style="margin-bottom:1rem;">
        <div class="row" style="margin-bottom:2rem;">
          <div class="col-md-12 titulo_card" style="text-align: left; margin-bottom:5px; font-size:25px">{{$projectDetail->titulo}}</div>
          <div class="col-md-12" style="text-align: left;">
            <div class="row justify-content-left">
              <div class="col-md-2 titulo2" style="font-size:15px;">{{$projectDetail->created_at->format('d-m-Y')}}</div>
              <div class="col-md-1 titulo2" style="font-size:15px;">Views:{{$projectDetail->visualizacao}}</div>
              <div class="col-md-4 titulo2" style="font-size:15px;">Tipo:{{$projectDetail->tipo}}</div>
            </div>
          </div>
          <label class="col-md-7 detalhe_card">
              <p>{!! $projectDetail->conteudo !!}</p>
          </label>
          <div class="col-md-5" style="text-align:left;">
            <div class="row">
              <div class="col-md-12">
                @if(isset($projectDetail->imagemCapa) && $projectDetail->imagemCapa!="")
                <td><img src="{{asset('storage/imagens/projects/' . $projectDetail->imagemCapa)}}" alt="..." width="270px;" style="border-radius: 15px;"></td>
                @endif
              </div>
              <div class="col-md-11" style="text-align:center;">
                <label class="titulo2"style="font-size:15px; margin-top:0.5rem;">Coordenador(es) do Projeto:</label>
                <ul class="list-group" style="text-align:left;" >
                  @foreach($allCoordenadoresProject as $itemCoordenador)
                  <a href="{{$itemCoordenador->pessoa->lattes}}" target="tab" style="text-decoration: none;">
                    <li class="list-group-item list-group-item-action" style="margin-top:3px;">
                      <div class="btn-group" style="margin-right:-15px; margin-left:-15px">
                        <div style="width:60px; height: 60px;margin-left:5px;margin-right:5px; text-align:center;">
                          @if(isset($itemCoordenador->pessoa->imagemCapa) && $itemCoordenador->pessoa->imagemCapa!="")
                          <td><img src="{{asset('storage/imagens/pessoas/' . $itemCoordenador->pessoa->imagemCapa)}}" alt="..." width="50px;" class="imagemCards2" style="border-radius: 100px;"></td>
                          @endif
                        </div>
                        <div>
                          <div class="form-group" style="margin-top:10px; color:black;">
                            <div style="font-weight:bold; font-family:arial">{{$itemCoordenador->pessoa->nome}}</div>
                            <div>{{$itemCoordenador->pessoa->area}}</div>
                          </div>
                        </div>
                      </div>
                    </li>
                  </a>
                  @endforeach
                </ul>
              </div>
              <div class="col-md-11" style="text-align:center;">
                <label class="titulo2"style="font-size:15px; margin-top:0.5rem;">Membro(s) do Projeto:</label>
                <ul class="list-group" style="text-align:left;" >
                  @foreach($allMembrosProject as $itemMembro)
                  <a href="{{$itemMembro->pessoa->lattes}}" target="tab" style="text-decoration: none;">
                    <li class="list-group-item list-group-item-action" style="margin-top:3px;">
                      <div class="btn-group" style="margin-right:-15px; margin-left:-15px">
                        <div style="width:60px; height: 60px;margin-left:5px;margin-right:5px; text-align:center;">
                          @if(isset($itemMembro->pessoa->imagemCapa) && $itemMembro->pessoa->imagemCapa!="")
                          <td><img src="{{asset('storage/imagens/pessoas/' . $itemMembro->pessoa->imagemCapa)}}" alt="..." width="50px;" class="imagemCards2" style="border-radius: 100px;"></td>
                          @endif
                        </div>
                        <div>
                          <div class="form-group" style="margin-top:10px; color:black;">
                            <div style="font-weight:bold; font-family:arial">{{$itemMembro->pessoa->nome}}</div>
                            <div>{{$itemMembro->pessoa->tipo}}</div>
                          </div>
                        </div>
                      </div>
                    </li>
                  </a>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
