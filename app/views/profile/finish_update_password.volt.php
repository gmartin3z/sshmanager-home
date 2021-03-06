{% extends 'main.volt.php' %}

{% block title %}{{ tr('finish_update_password') | upper }}{% endblock %}

{% block css_custom %}
  <style type="text/css">
    .btn-update-captcha {
      padding: 6px 6px;
      font-size: 60%;
      line-height: 1.2;
    }
  </style>
{% endblock %}

{% block content %}
  <aside id="colorlib-hero">
    <div class="flexslider">
      <ul class="slides">
        <li style="background-image: url({{ url('images/main_light.jpg') }});">
          <div class="overlay"></div>
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-8 col-sm-12 col-md-offset-2 slider-text">
                <div class="slider-text-inner text-center">
                  <h2>The Drunk Team Presents</h2>
                  <h1>sshmanager</h1>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </aside>

  <div id="colorlib-contact">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          {{ partial('partials/alerts') }}
        </div>
      </div>
      <div class="row">
        <div class="col-md-10 col-md-offset-1 animate-box">
          <h2>
            <strong>{{ tr('finish_update_password') }}</strong>
            <br>
            <a href="{{ url('perfil') }}" class="btn-warning btn-xs">
              <i class="fa fa-arrow-left"></i> {{ tr('form_back') }}
            </a>
          </h2>
          {{ form('perfil/actualizar-contrasenia/finalizar/' ~ admin_id ~ '/' ~ token, 'method': 'post', 'id': 'frm') }}
            <div class="row form-group">
              <div class="col-md-8">
                <label for="contrasenia">{{ tr('f_upd_password_new_password') }}</label>
                <input type="password" name="contrasenia" class="form-control">
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-8">
                <label for="repetir_contrasenia">{{ tr('f_upd_password_confirm_new_password') }}</label>
                <input type="password" name="repetir_contrasenia" class="form-control">
              </div>
            </div>
            <input type="hidden" name="{{ security.getTokenKey() }}" value="{{ security.getToken() }}">
            <div class="form-group">
              <button type="reset" class="btn btn-danger btn-reset">
                <i class="fa fa-eraser"></i>
                {{ tr('form_clear') }}
              </button>
              <button type="submit" class="btn btn-primary btn-submit">
                <i class="fa fa-chevron-circle-right"></i>
                <span>{{ tr('form_send') }}</span>
              </button>
            </div>
          {{ end_form() }}
        </div>
      </div>
    </div>
  </div>
{% endblock %}

{% block js_custom %}
  <!-- form -->
  <script type="text/javascript" src="{{ url('js/functions/disableFrm.js') }}"></script>
  <script type="text/javascript" src="{{ url('js/functions/resetData.js') }}"></script>

  <script type="text/javascript">
    (function() {
      // config frm
      let frm_options = {
        frm_id: 'frm',
        submit_btn_id: 'btn_submit',
        reset_btn_id: 'btn_reset',
        submit_btn_class: 'btn-submit',
        reset_btn_class: 'btn-reset',
        ondis_btn_spantxt: '{{ tr("form_wait") }}',
        onenb_btn_spantxt: '{{ tr("form_send") }}',
        onenb_btn_icon: 'fa-chevron-circle-right',
        ondis_btn_icon: 'fa-spinner',
        ondis_btn_icon_spin: 'fa-pulse'
      }

      let captcha_options = {
        frm_id: 'frm',
        captcha_btn_id: 'btn_update_captcha',
        captcha_btn_class: 'btn-update-captcha',
        onenb_btn_icon: 'fa-redo',
        ondis_btn_icon_spin: 'fa-spin'
      }

      // initiallize buttons ids
      let btn_submit_frm;
      let btn_reset_frm;

      // set ids
      function setIds() {
        // select buttons by class
        btn_submit_frm = document.getElementsByClassName(frm_options.submit_btn_class)[0];
        btn_reset_frm = document.getElementsByClassName(frm_options.reset_btn_class)[0];

        // assign an Id to each variable
        btn_submit_frm.setAttribute('id', frm_options.submit_btn_id);
        btn_reset_frm.setAttribute('id', frm_options.reset_btn_id);
      }

      setIds();

      // submit data
      btn_submit_frm.addEventListener('click', function prepareData(event) {
        setTimeout(function wait() {
          disableFrm(frm_options);
        }, 0);
      });

      // reset data
      btn_reset_frm.addEventListener('click', function prepareData(event){
        resetData(frm_options.frm_id);
      });
    })();
  </script>
{% endblock %}
