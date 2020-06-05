@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <!-- titulo -->
      <div class="col-md-8 titulo2" style="margin-bottom:1rem;margin-top: -1rem;text-align:center;">Mídia</div>
      <!--x titulo x-->
      <!-- midia -->
      <div class="col-md-12" style="text-align:center; margin-bottom:4rem;">
        <div class="row justify-content-between">
          <div class="col-sm-12">
            <div class="content node-page">
                <div class="field field-name-body field-type-text-with-summary field-label-hidden">
                  <div class="field-items">
                    <div class="field-item even" property="content:encoded">
                      <!-- SnapWidget -->
                      <script src="https://snapwidget.com/js/snapwidget.js">
                      </script>
                      <p><a href="https://www.instagram.com/bccufape/" target="tab">
                        <img src="{{asset('imagens/logo_instagram_preto.svg')}}" alt="..." style="width:35px"><label style="margin-left:5px;">@bccufape</label>
                      </a></p>
                      <p><iframe src="https://snapwidget.com/embed/831402" class="snapwidget-widget styleFrameMidia" allowtransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; "></iframe></p>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>

      </div>
      <!--x midia x-->

    </div>
</div>
@endsection
