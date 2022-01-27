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
            <form method="POST" novalidate onSubmit="return false;">
                <div class="row">
                    <div class="col-12 col-md-6 mb-3">
                        <label for="ime" class="form-label">Ime</label>
                        <input type="text" class="form-control" id="ime" placeholder="Ime" required>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label for="prezime" class="form-label">Prezime</label>
                        <input type="text" class="form-control" id="prezime" placeholder="Prezime" required>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="email" class="form-label">Email addresa</label>
                        <input type="email" class="form-control" id="email" placeholder="E-mail" required>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="poruka" class="form-label">Poruka</label>
                        <textarea class="form-control" id="poruka" rows="5" placeholder="Poruka"></textarea>
                    </div>
                </div>
                <button class="btn posalji-btn" type="submit">Pošalji&nbsp;<i class="fas fa-paper-plane"></i></button>
            </form>
        </div>
      </div>
    </div>

<?php
    get_footer();
?>