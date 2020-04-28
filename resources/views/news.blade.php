@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 titulo2" style="margin-bottom:1rem">News</div>
      <div class="col-md-8" style="margin-bottom:1rem;">
        @foreach ($allNews as $item)
        <ul class="list-group" style="margin-bottom:1rem;">
          <li class="list-group-item" style="cursor:pointer;">
            <a class="btn" href="{{ route('show_news', ['idNews'=>$item->id,]) }}">
              <div class="row">
                <div class="col-md-3" style="text-align:center">
                  @if(isset($item->imagemCapa) && $item->imagemCapa!="")
                  <td><img src="{{asset('storage/imagens/news/' . $item->imagemCapa)}}" alt="..." style="border-radius: 15px;"></td>
                  @endif
                </div>
                <div class="col-md-8">
                  <div class="row">
                    <div class="col-md-12 titulo_projeto">
                      @if(strlen($item->titulo) > 60)
                        <?php $detaa = substr($item->titulo, 0, 60) ?>
                        <div class="titulo_card" style="text-align:left;">{{$detaa}}...</div>
                      @else
                        <div class="titulo_card" style="text-align:left;">{{$item->titulo}}</div>
                      @endif
                    </div>
                    <div class="col-md-12" style="width:100%">
                      <div class="row" style="margin-left:-15px; margin-right:-15px;">
                        <?php
                          $dataehora = explode(" ", $item->created_at);
                          $data = $dataehora[0];
                        ?>
                        <div class="col-sm-3 subtitulo_card">{{$data}}</div>
                        <div class="col-sm-1 subtitulo_card">{{$item->visualizacao}}</div>
                      </div>
                    </div>
                    @if(strlen($item->conteudo) > 150)
                      <?php $deta = substr($item->conteudo, 0, 150) ?>
                      <div class="col-md-12 detalhe_card">{{$deta}}...</div>
                    @else
                      <div class="col-md-12 detalhe_card">{{$item->conteudo}}</div>
                    @endif
                  </div>
                </div>
              </div>
          </a>
          </li>
        </ul>
        </form>
        @endforeach
      </div>
    </div>
        <!-- <div class="col-md-8">
            <div class="card">
              <div class="card-header">News</div>

              <div class="card-body">
                  <table class="table table-sm table-hover">
                    <tbody>
                      @foreach ($allNews as $item)
                      <tr>
                        @if(isset($item->imagemCapa) && $item->imagemCapa!="")
                        <td><img src="{{asset('storage/imagens/news/' . $item->imagemCapa)}}" alt="..."></td>
                        @endif
                        <td>{{$item->titulo}}</td>
                        <td>{{$item->conteudo}}</td>
                        <td>{{$item->visualizacao}}</td>
                        <td>dd/mm/aaaa</td>
                        <td>
                          <form action="{{ route('show_news') }}" method="POST" >
                            @csrf
                            <input type="hidden" name="idNews" value="{{$item->id}}">
                            <button type="submit">Leia mais</button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
              </div>
            </div>
        </div> -->
    </div>
</div>
<script type="application/javascript">

  function showProject($id){
    document.getElementById("show"+$id).submit();
  }

</script>
@endsection
