@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <!-- titulo -->
      <div class="col-md-8 titulo2" style="margin-bottom:1rem;margin-top: -1rem;text-align:center;">Mídia</div>
      <!--x titulo x-->
      <!-- midia -->
      <div class="col-md-12" style="text-align:center;">
        <div class="row justify-content-between">
          <div class="col-sm-12">
            <div class="content node-page">
                <div class="field field-name-body field-type-text-with-summary field-label-hidden">
                  <div class="field-items">
                    <div class="field-item even" property="content:encoded">
                      <!-- SnapWidget -->
                      <script src="https://snapwidget.com/js/snapwidget.js">
                      </script>
                      <p>Instagram: @bccufape</p>
                      <p><iframe allowtransparency="true" class="snapwidget-widget" frameborder="0" scrolling="no" src="https://snapwidget.com/embed/386257" style="border:none; overflow:hidden; width:100%; "></iframe></p>
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
