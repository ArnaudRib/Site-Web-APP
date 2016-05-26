<!--Partie Popup-->
<div id="popup" class="popup">
  <p class="closeButtonPopup" onclick="closePopUp()" style="top:65px;">&#10006;</p>
  <div id="division1" class="division1" style="width:90%; height:90%;">
    <div class="Recherche">
      <h2 style="margin-left:10%; margin-right:10%; text-align:left; font-size:1.8em; display:inline-block;">Sports</h2>
      <input id="search" type="text" name="search" class="searchbar" placeholder="Recherche..." onkeyup="getresults(this.value)"  autocomplete="off" spellcheck="false"/>
    </div>
    <div id="PhotoSport">
    </div>
  </div>
</div>

<!--Contenu de la page-->
<nav id="content">
  <!--Partie Photographie-->
  <section>
    <div onclick="popup()" class="ligne1">
      <div class="div1 usualbackground">
        <span class="Police1">Sports</span>
        <div class="img1 usualbackground" style="background-image:url('/asset/images/sport.png');"></div>
      </div>
    </div>
    <div class="ligne2">
      <a style="color:green;" href='<?php goToPage('forum');?>'>
        <div class="div3 usualbackground">
          <span class="Police2"> Forums</a></span>
        <div class="img2 usualbackground" style="background-image:url('<?php echo image('sport2.jpg')?>');"></div>
      </div></a><a style="color:green;" href='<?php goToPage('aide');?>'><div class="div3 usualbackground">
        <span class="Police2">Aide</span>
        <div class="img2 usualbackground" style="background-image:url('<?php echo image('sport4.jpg')?>');"></div>
      </a>
      </div>
    </div>
  </section>

  <!--Partie Texte-->
  <aside>
    <div class="div2 usualbackground">
      <div class="img3 usualbackground" style="background-image:url('/asset/images/chintoc.jpg');"></div>
      <div class="div2bis">
        <div class="Haut1" style="padding:20px; text-align:justify; font-size:20px;">
          <p><strong>MySporteam</strong> vous permet d'intéragir avec des personnes ayant les mêmes passions que vous ! </br></br>
            En vous inscrivant, vous pourrez participer à des cours, des entraînements, des compétitions proche
            de chez vous, et communiquer avec des passionnés du sport !</p>
          </div><div class="Bas1">
            <div id="bouttoninscription">
              <a href="<?php goToPage('inscription')?>">
                <button class="button">Première visite?</br><span style="font-size:15px;">Inscrivez vous!</span></button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </aside>
  </nav>

  <?php CreateSlider(['sport.png', 'sport2.jpg', 'sport3.jpg'], 'Fade', '100%', '400px'); ?>
  <?php CreateSlider(['sport.png', 'sport2.jpg', 'sport3.jpg'], 'Slide', '100%', '400px'); ?>
