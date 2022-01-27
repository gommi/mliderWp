<?php 
//Template Name: Kontakt Page
get_header(); 
?>

<div class="container">
      <div class="row" id="kontakt">
        <div class="col-12 col-md-6 align-self-center">
          <p class="kontakt_title">Kontakt</p>
          <p class="kontakt_subtitle pt-3">
            M-Lider
          </p>
          <p class="kontakt_info">Njegoševa 60</p>
          <p class="kontakt_info">74400, Derventa</p>
          <br />
          <p class="kontakt_text">Broj telefona: +387 66/064-092</p>
          <p class="kontakt_text">E-mail: m_lider@outlook.com</p>
          <br />
          <p class="kontakt_subtitle pt-3">
            Pratite nas na našim društvenim mrežama:
          </p>
          <p class="kontakt_text">Facebook:&nbsp;<a href="https://www.facebook.com/mlider111" target="_blank">M-Lider</a>
          </p>
          <p class="kontakt_text">
            Instagram:&nbsp;<a href="https://www.instagram.com/mlider4/">M-Lider</a>
          </p>
        </div>
        <div class="col-12 col-md-6 align-self-center">
            <p class="kontakt_subtitle pt-3">Ako imte pitanja budite slobodni da nam pošaljite poruku.</p>
            <?php echo do_shortcode("[contact-form-7 id='91' title='Contact form 1']"); ?>
        </div>
      </div>
    </div>

<?php
    get_footer();
?>