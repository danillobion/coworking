@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8 titulo2" style="margin-bottom:1rem;margin-top: -1rem;text-align:center;">News</div>
  </div>
</div>
@if(isset($destaqueNews->destaque) == 1)
  <div style="background-color:#2abf9a; margin-bottom:2rem; padding-bottom:2rem;">
    <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="row justify-content-center">
              <div class="col-md-12">
                <a class="btn" href="{{ route('show_news', ['idNews'=>$destaqueNews->id,]) }}" style="padding-left: 0rem; ">
                  @if(strlen($destaqueNews->titulo) > 60)
                    <?php $detaa = substr($item->titulo, 0, 60) ?>
                    <div class="titulo_card" style="text-align:left; font-size:30px">{{$detaa}}...</div>
                  @else
                    <div class="titulo_card" style="text-align:left; font-size:30px">{{$destaqueNews->titulo}}</div>
                  @endif
                </a>
              </div>
              <div class="col-md-4">
                @if(isset($destaqueNews->imagemCapa) && $destaqueNews->imagemCapa!="")
                  <td><img src="{{asset('storage/imagens/news/' . $destaqueNews->imagemCapa)}}" alt="..." style="border-radius: 15px; width:220px"></td>
                @endif
              </div>
              <div class="col-md-8">
                <div class="col-md-12">
                  <div class="row" style="margin-left:-15px; margin-right:-15px;">
                    <?php
                      $dataehora = explode(" ", $destaqueNews->created_at);
                      $data = $dataehora[0];
                    ?>
                    <div class="col-sm-3 subtitulo_card" style="color:black">{{$data}}</div>
                    <div class="col-sm-1 subtitulo_card" style="color:black">{{$destaqueNews->visualizacao}}</div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="row" style="margin-left:-15px; margin-right:-15px;">
                    @if(strlen($destaqueNews->conteudo) > 150)
                      <?php
                          $text1 = strip_tags($destaqueNews->conteudo);
                          $deta = substr($text1, 0, 150);
                      ?>
                      <div class="col-md-12 detalhe_card">{!! $deta !!}...</div>
                    @else
                      <?php $deta = strip_tags($destaqueNews->conteudo)?>
                      <div class="col-md-12 detalhe_card">{!! $deta !!}</div>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
@endif

<div class="container">
    <div class="row justify-content-center">
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
                      <?php
                          $text1 = strip_tags($item->conteudo);
                          $deta = substr($text1, 0, 150);
                      ?>
                      <div class="col-md-12 detalhe_card">{!! $deta !!}...</div>
                    @else
                      <?php $deta = strip_tags($item->conteudo)?>
                      <div class="col-md-12 detalhe_card">{!! $deta !!}</div>
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
      <div class="col-md-12" style="margin-bottom:2rem;">
        <div class="row justify-content-center">
          <span>{{$allNews->links()}}</span>
        </div>
      </div>
    </div>
    </div>
</div>
<script type="application/javascript">

  function showProject($id){
    document.getElementById("show"+$id).submit();
  }

</script>
@endsection
