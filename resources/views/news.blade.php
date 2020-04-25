@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
        </div>
    </div>
</div>
@endsection
