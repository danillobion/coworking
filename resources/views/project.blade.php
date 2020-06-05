@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <!-- titulo -->
      <div class="col-md-8 titulo2" style="margin-bottom:1rem;margin-top: -1rem;text-align:center;">Projetos</div>
      <!--x titulo x-->
      <!-- Card -->
      <div class="col-md-12" style="text-align:center;">
        <div class="row justify-content-between">
          @foreach($allProject as $item)
            <div class="col-sm-6 styleCardProjecto styleCardWeb">
              <a href="{{ route('show_project', ['idProject'=>$item->id,]) }}" style="color: inherit; text-decoration: none;">
              <div class="row" style="margin-top:15px;margin-bottom: 8px;">
                <div class="col-5">
                  @if($item->imagemCapa != "imagemDefault.png")
                    <img src="{{asset('storage/imagens/projects/' . $item->imagemCapa)}}" alt="..." style="border-radius: 15px; width:100%; margin:5px;">
                  @else
                    <img src="{{asset('imagens/imagemDefault.png')}}" alt="..." style="border-radius: 15px; width:100%; margin:5px;">
                  @endif
                </div>
                <div class="col-7" style="text-align:left;">
                  <div class="form-group">
                    <div class="">
                      @if(strlen($item->titulo) > 60)
                        <?php $detaa = substr($item->titulo, 0, 60) ?>
                        <div class="titulo_card" style="text-align:left;">{{$detaa}}...</div>
                      @else
                        <div class="titulo_card" style="text-align:left;">{{$item->titulo}}</div>
                      @endif
                    </div>
                      <div class="row" style="margin-left:-15px">
                      <div class="col-sm-4 subtitulo_card" style="margin-right:5px;">{{$item->created_at->format('d-m-Y')}}</div>
                      <div class="col-sm-5 subtitulo_card">{{$item->tipo}}</div>
                      </div>
                    <div>
                      @if(strlen($item->conteudo) > 150)
                        <?php
                            $text1 = strip_tags($item->conteudo);
                            $deta = substr($text1, 0, 150);
                        ?>
                        <div class=" detalhe_card">{!! $deta !!}...</div>
                      @else
                        <?php $deta = strip_tags($item->conteudo)?>
                        <div class="detalhe_card">{!! $deta !!}</div>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>

            <div class="col-sm-6 styleCardProjecto styleCardMobile">
              <a href="{{ route('show_project', ['idProject'=>$item->id,]) }}" style="color: inherit; text-decoration: none;">
              <div class="row" style="margin-top:1.5rem;margin-bottom: 2rem;">
                <div class="col-3" style="text-align:left;">
                  @if($item->imagemCapa != "imagemDefault.png")
                    <img src="{{asset('storage/imagens/projects/' . $item->imagemCapa)}}" alt="..." style="border-radius: 10px; width:50px; margin-top:5px;">
                  @else
                    <img src="{{asset('imagens/imagemDefault.png')}}" alt="..." style="border-radius: 10px; width:50px; margin-top:5px;">
                  @endif
                </div>
                <div class="col" style="text-align:left;">
                  @if(strlen($item->titulo) > 55)
                    <?php $detaa = substr($item->titulo, 0, 55) ?>
                    <div class="titulo_card" style="text-align:left;font-size:15px;">{{$detaa}}...</div>
                  @else
                    <div class="titulo_card" style="text-align:left;font-size:15px;">{{$item->titulo}}</div>
                  @endif
                </div>
                <div class="col-12 btn-group">
                  <div class="subtitulo_card" style="font-size:10px;">{{$item->created_at->format('d-m-Y')}}</div>
                  <div class="subtitulo_card" style="font-size:10px;">{{$item->tipo}}</div>
                </div>
                <div class="col-12">
                  @if(strlen($item->conteudo) > 150)
                    <?php
                        $text1 = strip_tags($item->conteudo);
                        $deta = substr($text1, 0, 150);
                    ?>
                    <div class="detalhe_card" style="font-size:12px;">{!! $deta !!}...</div>
                  @else
                    <?php $deta = strip_tags($item->conteudo)?>
                    <div class="detalhe_card" style="font-size:12px;">{!! $deta !!}</div>
                  @endif
                </div>
              </div>
              </a>
            </div>
          @endforeach
        </div>

      </div>
      <!--x Card x-->
      <!-- Paginacao -->
      <div class="col-md-12" style="margin-bottom:2rem;">
        <div class="row justify-content-center">
          <span>{{$allProject->links()}}</span>
        </div>
      </div>
      <!--x Paginacao x-->
    </div>
</div>
<script type="application/javascript">

  function showProject($id){
    document.getElementById("show"+$id).submit();
  }

</script>
@endsection
