<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      \App\User::create([
          'name' => 'Administrador',
          'email' => 'admin@admin.com',
          'password' => Hash::make('12345678'),
      ]);
      \App\Configpaginainicial::create([
          'titulo1' => 'Bem vindo ao BCC Coworking',
          'subtitulo1' => 'BCC Coworking - Laboratório de Pesquisa & Desenvolvimento',
          'texto' => '<p style="text-align: left;">O BCC Coworking &eacute; um Laborat&oacute;rio de Pesquisa e Desenvolvimento, concebido pelo curso de Computa&ccedil;&atilde;o, surgindo com o prop&oacute;sito de servir como um local prop&iacute;cio para o desenvolvimento de projetos reais, servindo tamb&eacute;m como fomenta&ccedil;&atilde;o de projetos com iniciativa dos discentes, com supervis&atilde;o de profissionais da &aacute;rea, garantindo o conhecimento e a experi&ecirc;ncia t&eacute;cnica, atrav&eacute;s do uso de pr&aacute;ticas e ferramentas do mercado de trabalho.<br /><br />&Eacute; um local para aperfei&ccedil;oamento da produtividade, sendo importante destacar que n&atilde;o se trata de um espa&ccedil;o f&iacute;sico apenas, &eacute; principalmente um ambiente destinado aos estudantes em busca de conhecimento, experi&ecirc;ncia t&eacute;cnica, autonomia, fomenta&ccedil;&atilde;o e desenvolvimento de projetos.</p>',
          'titulo2' => 'O que oferecemos',
          'subtitulo2' =>'',
          'titulo3' => 'Público alvo',
          'legenda1' => '<ul>
<li style="text-align: center;">Alunos com projetos em desenvolvimento;</li>
<li style="text-align: center;">Alunos buscando a participa&ccedil;&atilde;o em projetos;</li>
<li style="text-align: center;">Professores com projetos em execu&ccedil;&atilde;o (Pesquisa/Ensino/Extens&atilde;o) com foco em aplica&ccedil;&atilde;o comercial e/ou P&amp;D.</li>
</ul>',
          'titulo4' => 'Possibilidades de interações',
          'legenda2' => '<ul>
<li style="text-align: center;">Carga hor&aacute;ria complementar em: Pesquisa, Ensino, Extens&atilde;o; Est&aacute;gio Supervisionado Obrigat&oacute;rio (Coordena&ccedil;&atilde;o de Curso);</li>
<li style="text-align: center;">Trabalho de Conclus&atilde;o de Curso;</li>
<li style="text-align: center;">Oferta e aux&iacute;lio em Cursos de Capacita&ccedil;&atilde;o;</li>
<li style="text-align: center;">Sugest&atilde;o de Processo/Metodologia de Desenvolvimento;</li>
<li style="text-align: center;">Mentoring e Acompanhamento; Espa&ccedil;o f&iacute;sico (lab. 24).</li>
</ul>',
          'titulo5' => 'Benefícios para os discentes ',
          'legenda3' => '<ul>
<li style="text-align: center;">Aprendizagem/Conhecimento e Experi&ecirc;ncia T&eacute;cnica</li>
<li style="text-align: center;">Intera&ccedil;&atilde;o social e Networking</li>
<li style="text-align: center;">Confian&ccedil;a e Autonomia</li>
<li style="text-align: center;">Aumento da Produtividade e Foco</li>
<li style="text-align: center;">Desenvolvimento da Criatividade e Inova&ccedil;&atilde;o</li>
<li style="text-align: center;">Mais disposi&ccedil;&atilde;o e menos Estresse Motiva&ccedil;&atilde;o pela Inova&ccedil;&atilde;o e Diversidade</li>
<li style="text-align: center;">Atua&ccedil;&atilde;o com pr&aacute;ticas e ferramentas do mercado de trabalho.</li>
</ul>',
          'imagemCapa1' => 'imagemHomeDefault1.png',
          'imagemCapa2' => 'imagemHomeDefault2.png',
          'imagemCapa3' => 'imagemHomeDefault3.png',
          'imagemCapa4' => 'imagemHomeDefault4.png',
      ]);
    }
}
