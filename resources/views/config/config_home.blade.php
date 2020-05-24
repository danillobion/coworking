@extends('layouts.app')

@section('content')
<div class="container">
  @foreach($allHome as $item)
    <div class="row justify-content-center">
        <!-- apresentacao -->
        <div class="col-md-12">
            <div class="card" style="margin-bottom:2rem;">
                <div class="card-header">Configurações do bloco apresentação</div>
                <div class="card-body">
                    <form id="idForm" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                        <div class="col-md-12">
                          <label>Título<a style="color:red;">*</a></label>
                          <input class="form-control @error('titulo1') is-invalid @enderror form-control" type="text" id="idTitulo" name="titulo1" value="{{$item->titulo1}}">
                          @error('titulo1')
                            <div >
                              <a style="color:red;">{{ $message }}</a>
                            </div>
                          @enderror
                        </div>
                        <div class="col-md-12">
                          <label>Subtítulo<a style="color:red;">*</a></label>
                          <input class="form-control @error('subtitulo1') is-invalid @enderror form-control" type="text" name="subtitulo1" value="{{$item->subtitulo1}}">
                          @error('subtitulo1')
                            <div >
                              <a style="color:red;">{{ $message }}</a>
                            </div>
                          @enderror
                        </div>
                        <div class="col-md-12">
                          <label>Texto<a style="color:red;">*</a></label>
                          <textarea class="form-control @error('texto') is-invalid @enderror form-control" type="text" name="texto" value="{{ $item->texto }}" rows="10">{{ $item->texto }}</textarea>
                          @error('texto')
                            <div >
                              <a style="color:red;">{{ $message }}</a>
                            </div>
                          @enderror
                      </div>
                        <div class="col-md-12">
                          <button type="button" class="btn btn-success" onclick="blocoApresentacao()" style="margin-top:2rem; margin-bottom:1rem; width:100%;">Atualizar</button>
                        </div>
                    </div>
                  </form>
            </div>
        </div>
    </div>
    <!-- detalhe -->
    <div class="col-md-12">
        <div class="card" style="margin-bottom:2rem;">
            <div class="card-header">Configurações do bloco detalhe</div>
            <div class="card-body">
                <form id="idForm2" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <label>Título<a style="color:red;">*</a></label>
                      <input class="form-control @error('titulo2') is-invalid @enderror form-control" type="text" name="titulo2" value="{{ $item->titulo2 }}">
                      @error('titulo2')
                        <div >
                          <a style="color:red;">{{ $message }}</a>
                        </div>
                      @enderror
                    </div>
                    <div class="col-md-12">
                      <label>Subtítulo</label>
                      <input class="form-control @error('subtitulo2') is-invalid @enderror form-control" type="text" name="subtitulo2" value="{{$item->subtitulo2}}">
                      @error('subtitulo2')
                        <div >
                          <a style="color:red;">{{ $message }}</a>
                        </div>
                      @enderror
                    </div>
                    <div class="col-md-12">
                      <button type="button" class="btn btn-success" onclick="blocoDetalhe()" style="margin-top:2rem; margin-bottom:1rem; width:100%;">Atualizar</button>
                    </div>
                </div>
              </form>
          </div>
      </div>
    </div>
    <!-- bloco da esquerda -->
    <div class="col-md-4">
        <div class="card" style="margin-bottom:2rem;">
            <div class="card-header">Bloco da esquerda</div>
            <div class="card-body">
                <form id="idForm3" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <label>Título<a style="color:red;">*</a></label>
                      <input class="form-control @error('titulo3') is-invalid @enderror form-control" type="text" name="titulo3" value="{{ $item->titulo3 }}">
                      @error('titulo3')
                        <div >
                          <a style="color:red;">{{ $message }}</a>
                        </div>
                      @enderror
                    </div>
                    <div class="col-md-12">
                      <label>Subtitulo<a style="color:red;">*</a></label>
                      <textarea class="form-control @error('legenda1') is-invalid @enderror form-control" type="text" name="legenda1" value="{{ $item->legenda1 }}" rows="10">{{ $item->legenda1 }}</textarea>
                      @error('legenda1')
                        <div >
                          <a style="color:red;">{{ $message }}</a>
                        </div>
                      @enderror
                    </div>
                    <div class="col-md-12">
                      <button type="button" class="btn btn-success" onclick="blocoDetalheEsquerda()" style="margin-top:2rem; margin-bottom:1rem; width:100%;">Atualizar</button>
                    </div>
                </div>
              </form>
          </div>
      </div>
    </div>
    <!-- bloco do centro -->
    <div class="col-md-4">
        <div class="card" style="margin-bottom:2rem;">
            <div class="card-header">Bloco do centro</div>
            <div class="card-body">
                <form id="idForm4" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <label>Título<a style="color:red;">*</a></label>
                      <input class="form-control @error('titulo4') is-invalid @enderror form-control" type="text" name="titulo4" value="{{ $item->titulo4 }}">
                      @error('titulo4')
                        <div >
                          <a style="color:red;">{{ $message }}</a>
                        </div>
                      @enderror
                    </div>
                    <div class="col-md-12">
                      <label>Subtitulo<a style="color:red;">*</a></label>
                      <textarea class="form-control @error('legenda2') is-invalid @enderror form-control" type="text" name="legenda2" value="{{ $item->legenda2 }}" rows="10">{{ $item->legenda2 }}</textarea>
                      @error('legenda2')
                        <div >
                          <a style="color:red;">{{ $message }}</a>
                        </div>
                      @enderror
                    </div>
                    <div class="col-md-12">
                      <button type="button" class="btn btn-success" onclick="blocoDetalheCentro()" style="margin-top:2rem; margin-bottom:1rem; width:100%;">Atualizar</button>
                    </div>
                </div>
              </form>
          </div>
      </div>
  </div>
  <!-- bloco do direita -->
  <div class="col-md-4">
      <div class="card" style="margin-bottom:2rem;">
          <div class="card-header">Bloco da direita</div>
          <div class="card-body">
              <form id="idForm5" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-12">
                    <label>Título<a style="color:red;">*</a></label>
                    <input class="form-control @error('titulo5') is-invalid @enderror form-control" type="text" name="titulo5" value="{{ $item->titulo5 }}">
                    @error('titulo5')
                      <div >
                        <a style="color:red;">{{ $message }}</a>
                      </div>
                    @enderror
                  </div>
                  <div class="col-md-12">
                    <label>Subtitulo<a style="color:red;">*</a></label>
                    <textarea class="form-control @error('legenda3') is-invalid @enderror form-control" type="text" name="legenda3" value="{{ $item->legenda3 }}" rows="10">{{ $item->legenda3 }}</textarea>
                    @error('legenda3')
                      <div >
                        <a style="color:red;">{{ $message }}</a>
                      </div>
                    @enderror
                  </div>
                  <div class="col-md-12">
                    <button type="button" class="btn btn-success" onclick="blocoDetalheDireita()" style="margin-top:2rem; margin-bottom:1rem; width:100%;">Atualizar</button>
                  </div>
              </div>
            </form>
        </div>
    </div>
    </div>
    <!-- Bloco das imagens -->
    <div class="col-md-12">
        <div class="card" style="margin-bottom:4rem;">
            <div class="card-header">Imagens</div>
            <div class="card-body">
                  <div class="row">
                    <div class="col-md-12" style="margin-bottom:3rem;">
                      <form id="idForm6" method="post" enctype="multipart/form-data">
                        @csrf
                      <label>Imagem Principal(bloco apresentação)</label>
                      <input type="file" class="form-control-file @error('imagemCapa1') is-invalid @enderror form-control" id="imagemCapa1" name="imagemCapa1" value="{{ $item->imagemCapa1 }}" placeholder="Selecione um arquivo" />
                      @error('imagemCapa1')
                        <div >
                          <a style="color:red;">{{ $message }}</a>
                        </div>
                      @enderror
                      </form>
                      <div>
                        <button type="button" class="btn btn-success" onclick="imgBlocoApresentacao()" style="margin-top:2rem; margin-bottom:1rem; width:100%;">Atualizar</button>
                      </div>
                  </div>
                  <div class="col-md-4">
                    <form id="idForm7" method="post" enctype="multipart/form-data">
                      @csrf
                    <label>Imagem da esquerda(bloco detalhe)</label>
                    <input type="file" class="form-control-file @error('imagemCapa2') is-invalid @enderror form-control" id="imagemCapa2" name="imagemCapa2" value="{{ $item->imagemCapa2 }}" placeholder="Selecione um arquivo" />
                    @error('imagemCapa2')
                      <div >
                        <a style="color:red;">{{ $message }}</a>
                      </div>
                    @enderror
                    </form>
                    <div>
                      <button type="button" class="btn btn-success" onclick="imgBlocoEsquerda()" style="margin-top:2rem; margin-bottom:1rem; width:100%;">Atualizar</button>
                    </div>
                </div>
                <div class="col-md-4">
                  <form id="idForm8" method="post" enctype="multipart/form-data">
                    @csrf
                  <label>Imagem do centro(bloco detalhe)</label>
                  <input type="file" class="form-control-file @error('imagemCapa3') is-invalid @enderror form-control" id="imagemCapa3" name="imagemCapa3" value="{{ $item->imagemCapa3 }}" placeholder="Selecione um arquivo" />
                  @error('imagemCapa3')
                    <div >
                      <a style="color:red;">{{ $message }}</a>
                    </div>
                  @enderror
                  </form>
                  <div>
                    <button type="button" class="btn btn-success" onclick="imgBlocoCentro()" style="margin-top:2rem; margin-bottom:1rem; width:100%;">Atualizar</button>
                  </div>
              </div>
              <div class="col-md-4">
                <form id="idForm9" method="post" enctype="multipart/form-data">
                  @csrf
                <label>Imagem da direita(bloco detalhe)</label>
                <input type="file" class="form-control-file @error('imagemCapa4') is-invalid @enderror form-control" id="imagemCapa4" name="imagemCapa4" value="{{ $item->imagemCapa4 }}" placeholder="Selecione um arquivo" />
                @error('imagemCapa4')
                  <div >
                    <a style="color:red;">{{ $message }}</a>
                  </div>
                @enderror
                </form>
                <div>
                  <button type="button" class="btn btn-success" onclick="imgBlocoDireita()" style="margin-top:2rem; margin-bottom:1rem; width:100%;">Atualizar</button>
                </div>
            </div>
              </div>
          </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
<script type="application/javascript">
  function blocoApresentacao(){
    document.getElementById("idForm").action = "{{route('edit_blocoApresentacao')}}";
    document.getElementById("idForm").submit();
  }
  function blocoDetalhe(){
    document.getElementById("idForm2").action = "{{route('edit_blocoDetalhe')}}";
    document.getElementById("idForm2").submit();
  }
  function blocoDetalheEsquerda(){
    document.getElementById("idForm3").action = "{{route('edit_blocoEsquerda')}}";
    document.getElementById("idForm3").submit();
  }
  function blocoDetalheCentro(){
    document.getElementById("idForm4").action = "{{route('edit_blocoCentro')}}";
    document.getElementById("idForm4").submit();
  }
  function blocoDetalheDireita(){
    document.getElementById("idForm5").action = "{{route('edit_blocoDireita')}}";
    document.getElementById("idForm5").submit();
  }
  function imgBlocoApresentacao(){
    document.getElementById("idForm6").action = "{{route('edit_imgPrincipal')}}";
    document.getElementById("idForm6").submit();
  }
  function imgBlocoEsquerda(){
    document.getElementById("idForm7").action = "{{route('edit_imgBlocoEsquerda')}}";
    document.getElementById("idForm7").submit();
  }
  function imgBlocoCentro(){
    document.getElementById("idForm8").action = "{{route('edit_imgBlocoCentro')}}";
    document.getElementById("idForm8").submit();
  }
  function imgBlocoDireita(){
    document.getElementById("idForm9").action = "{{route('edit_imgBlocoDireita')}}";
    document.getElementById("idForm9").submit();
  }

</script>
@endsection
