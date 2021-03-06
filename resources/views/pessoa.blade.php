@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <!-- Alunos -->
      @if(count($allAluno)>0)
        <div class="col-md-8 titulo2" style="margin-bottom:0.5rem;margin-top: -1rem;text-align:center;">Discentes</div>
      @endif
      <div class="col-md-12">
        <div class="row justify-content-center">
          @foreach ($allAluno as $item)
            <div class="col-md-2 cardPessoa">
                @if($item->lattes != "")
                  <a href="{{$item->lattes}}" target="tab" style="color: inherit; text-decoration: none;">
                @else
                  <a>
                @endif
              <div class="row justify-content-center" style="text-align:center;">
                  <div class="col-md-12" style="margin-top:25px;margin-bottom:5px;">
                    @if(isset($item->imagemCapa) && $item->imagemCapa!="")
                    <td><img src="{{asset('storage/imagens/pessoas/' . $item->imagemCapa)}}" alt="..." class="imagemCards"></td>
                    @endif
                  </div>
                  <div class="col-md-12" style="padding-bottom:45px;">
                    @if(strlen($item->nome) > 18)
                      <?php $detaa = substr($item->nome, 0, 18) ?>
                      <div class="cardPessoaNome"  style="text-align:center;">{{$detaa}}...</div>
                    @else
                      <div class="cardPessoaNome" style="text-align:center;">{{$item->nome}}</div>
                    @endif
                  </div>
              </div>
            </a>
            </div>
          @endforeach
        </div>
      </div>
      <!-- Professores -->
      @if(count($allProfessor)>0)
        <div class="col-md-8 titulo2" style="margin-bottom:0.5rem;margin-top: 1rem;text-align:center;">Docentes</div>
      @endif
      <div class="col-md-12">
        <div class="row justify-content-center">
          @foreach ($allProfessor as $item)
          <div class="col-md-2 cardPessoa">
              @if($item->lattes != "")
                <a href="{{$item->lattes}}" target="tab" style="color: inherit; text-decoration: none;">
              @else
                <a>
              @endif
              <div class="row justify-content-center" style="text-align:center;">
                  <div class="col-md-12" style="margin-top:25px;margin-bottom:5px;">
                    @if(isset($item->imagemCapa) && $item->imagemCapa!="")
                    <td><img src="{{asset('storage/imagens/pessoas/' . $item->imagemCapa)}}" alt="..." style="border-radius: 100px;" class="imagemCards"></td>
                    @endif
                  </div>
                  <div class="col-md-12">
                    @if(strlen($item->nome) > 18)
                      <?php $detaa = substr($item->nome, 0, 18) ?>
                      <div class="cardPessoaNome" style="text-align:center;">{{$detaa}}...</div>
                    @else
                      <div class="cardPessoaNome" style="text-align:center;">{{$item->nome}}</div>
                    @endif
                  </div>
                  <div class="col-md-12 cardPessoaArea" style="padding-bottom:45px;">
                    @if(strlen($item->area) > 18)
                      <?php $detaa = substr($item->area, 0, 18) ?>
                      <div  style="text-align:center;">{{$detaa}}...</div>
                    @else
                      <div  style="text-align:center;">{{$item->area}}</div>
                    @endif
                  </div>
              </div>
            </a>

          </div>
          @endforeach
        </div>
      </div>
      <!-- Egresso -->
      @if(count($allEgresso)>0)
        <div class="col-md-8 titulo2" style="margin-bottom:0.5rem;margin-top: 1rem;text-align:center;">Egresso</div>
      @endif
      <div class="col-md-12">
        <div class="row justify-content-center">
          @foreach ($allEgresso as $item)
          <div class="col-md-2 cardPessoa">
              @if($item->lattes != "")
                <a href="{{$item->lattes}}" target="tab" style="color: inherit; text-decoration: none;">
              @else
                <a>
              @endif
              <div class="row justify-content-center" style="text-align:center;">
                  <div class="col-md-12" style="margin-top:25px;margin-bottom:5px;">
                    @if(isset($item->imagemCapa) && $item->imagemCapa!="")
                    <td><img src="{{asset('storage/imagens/pessoas/' . $item->imagemCapa)}}" alt="..." style="border-radius: 100px;" class="imagemCards"></td>
                    @endif
                  </div>
                  <div class="col-md-12" style="padding-bottom:45px;">
                    @if(strlen($item->nome) > 18)
                      <?php $detaa = substr($item->nome, 0, 18) ?>
                      <div class="cardPessoaNome" style="text-align:center;">{{$detaa}}...</div>
                    @else
                      <div class="cardPessoaNome" style="text-align:center;">{{$item->nome}}</div>
                    @endif
                  </div>
              </div>
            </a>

          </div>
          @endforeach
        </div>
      </div>

        <div class="col-md-12" style="margin-bottom:2rem;">
          <div class="row justify-content-center">
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
