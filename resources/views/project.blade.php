@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 titulo2" style="margin-bottom:1rem;margin-top: -1rem;text-align:center;">Projetos</div>
        <div class="col-md-8" style="margin-bottom:1rem;">
          @foreach ($allProject as $item)
          <ul class="list-group" style="margin-bottom:1rem;">
            <li class="list-group-item" style="cursor:pointer;">
              <a class="btn" href="{{ route('show_project', ['idProject'=>$item->id,]) }}">
                <div class="row">
                  <div class="col-md-3" style="text-align:center">
                    @if(isset($item->imagemCapa) && $item->imagemCapa!="")
                    <td><img src="{{asset('storage/imagens/projects/' . $item->imagemCapa)}}" alt="..." style="border-radius: 15px; width:120px;"></td>
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
                          <div class="col-sm-3 subtitulo_card">{{$item->created_at->format('d-m-Y')}}</div>
                          <div class="col-sm-9 subtitulo_card">{{$item->tipo}}</div>
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
            <span>{{$allProject->links()}}</span>
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
