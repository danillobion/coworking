@extends('layouts.app')

@section('content')

<!-- <div class="container"> -->
  <div class="row" style="margin-top:-2rem;">
    <div class="col-md-12" style="margin-left:0px; margin-right:0px; margin-bottom:5px;"></div
    <div class="col-md-12">
      <div class="container">
        <div class="row justify-content-center" style="text-align:center; margin-top:-1rem; margin-bottom:1rem;">
          <div class="col-md-12 titulo" style="font-size:27px;">Bem vindo ao BCC Coworking</div>
          <div class="col-md-12 paragrafo">BCC Coworking - Laboratório de Pesquisa & Desenvolvimento</div>
          <div class="col-md-12">
            <div class="row justify-content-center" style="text-align:center; margin-top:2rem;">
              <div class="col-md-4">
                <img src="{{asset('imagens/img1.png')}}" alt="..." width="435px">
              </div>
              <div class="col-md-1"> </div>
              <div class="col-md-6 paragrafo">
                <p class="paragrafo_tipo2">O BCC Coworking é um Laboratório de Pesquisa e Desenvolvimento, sendo uma iniciativa do curso de Computação, que surgiu com o propósito de servir como um local propício para o desenvolvimento de projetos reais, servindo até como fomento, com supervisão de profissionais da área, garantindo o conhecimento e a experiência técnica, através do uso de práticas e ferramentas do mercado de trabalho. É um ambiente onde o discente tem a oportunidade trazer sua idéia/projeto, de criar, manter e aumentar o networking com outras pessoas de diversas áreas. É um local para aperfeiçoamento da produtividade.
                </p>
                <p class="paragrafo_tipo2">É importante destacar que não se trata de um espaço físico apenas, é principalmente um ambiente destinado aos estudantes em busca de conhecimento, experiência técnica, autonomia, fomentação e desenvolvimento de projetos. É apoiado pelos docentes do curso e da instituição, sendo uma antiga demanda demonstrada pela comunidade BCC.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-12 titulo" style="margin-top:2rem;">
            <label style="font-size:27px; margin-bottom:-1rem;">O que oferecemos</label>
          </div>
          <div class="col-md-12" style="margin-top:2rem; margin-bottom:2rem;">
            <div class="row justify-content-center">
              <div class="col-md-4">
                <div class="row justify-content-center">
                  <div class="col-md-12">
                    <img src="{{asset('imagens/img2.png')}}" alt="..." width="250px">
                  </div>
                  <div class="col-md-12 titulo">
                    Público alvo
                  </div>
                  <div class="col-md-12 paragrafo" style="margin-top:0.5rem;">

                    <ul style="text-align:left;">
                    <li>Alunos com projetos em desenvolvimento;</li>
                    <li>Alunos buscando a participação em projetos;</li>
                    <li>Professores com projetos em execução (Pesquisa/Ensino/Extensão) com foco em aplicação comercial e/ou P&D.</li>
                    </ul>

                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="row justify-content-center">
                  <div class="col">
                    <img src="{{asset('imagens/img3.png')}}" alt="..." width="250px">
                  </div>
                  <div class="col-md-12 titulo">
                    Possibilidades de interações
                  </div>
                  <div class="col-md-12 paragrafo" style="margin-top:0.5rem;">

                      <ul style="text-align:left;">
                        <li>Carga horária complementar em: Pesquisa, Ensino, Extensão;</li>
                        <li>Estágio Supervisionado Obrigatório (Coordenação de Curso);</li>
                        <li>Trabalho de Conclusão de Curso;</li>
                        <li>Oferta e auxílio em Cursos de Capacitação;</li>
                        <li>Sugestão de Processo/Metodologia de Desenvolvimento;</li>
                        <li>Mentoring e Acompanhamento;</li>
                        <li>Espaço físico (lab. 24).</li>
                      </ul>

                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="row justify-content-center">
                  <div class="col">
                    <img src="{{asset('imagens/img4.png')}}" alt="..." width="250px">
                  </div>
                  <div class="col-md-12 titulo">
                    Benefícios para os discentes
                  </div>
                  <div class="col-md-12 paragrafo" style="margin-top:0.5rem;">

                    <ul style="text-align:left;">
                        <li>Aprendizagem/Conhecimento e Experiência Técnica</li>
                        <li>Interação social e Networking</li>
                        <li>Confiança e Autonomia</li>
                        <li>Aumento da Produtividade e Foco</li>
                        <li>Desenvolvimento da Criatividade e Inovação</li>
                        <li>Mais disposição e menos Estresse</li>
                        <li>Motivação pela Inovação e Diversidade</li>
                        <li>Atuação com práticas e ferramentas do mercado de trabalho.</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

  </div>
<!-- </div> -->


@endsection
