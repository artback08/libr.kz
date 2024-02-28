<?php include ROOT . '/views/layouts/header.php'; ?>

  <!-- CAROUSEL -->
  <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-label="Slide 1" aria-current="true"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <!-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg> -->
        <img src="<?php echo URL ?>/img/carousel/monument.jpg" alt="" width="100%">
        <div class="container">
          <div class="carousel-caption text-start">
            <h1>Памятник Жаяу Мұса Байжанұлы</h1>
            <h2 class="opacity-75">Баянаул</h2>
            <p><a class="btn btn-lg btn-success" href="#">Подробнее</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <!-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg> -->
        <img src="<?php echo URL ?>/img/carousel/library.jpg" alt="" width="100%">
        <div class="container">
          <div class="carousel-caption">
            <h1>Another example headline.</h1>
            <p>Some representative placeholder content for the second slide of the carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="<?php echo URL ?>/img/carousel/museum.jpg" alt="" width="100%">
        <div class="container">
          <div class="carousel-caption text-end">
            <h1>One more for good measure.</h1>
            <p>Some representative placeholder content for the third slide of this carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  
  <div class="container">
    <div class="row">
      <div class="col-lg-4 text-center">
        <img src="<?php URL ?>/uploads/img/writers/1708358069.jpg" alt="" class="bd-placeholder-img rounded-circle" width="140" height="140">
        <h2 class="fw-normal">Аймауытов Жусупбек</h2>
        <p><?php echo substr('Автор учебников «Тәрбиеге көмекші» (Пособие для воспитателя), «Психология», «Жан жүйесі және өнер таңдау». Родился в 1889 году в Баян-Аульском районе Павлодарской области.', 0, 251) ?></p>
        <p><a class="btn btn-success" href="#">Читать подробнее... »</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4 text-center">
      
        <img src="<?php URL ?>/uploads/img/writers/1708358508.jpg" alt="" class="bd-placeholder-img rounded-circle" width="140" height="140">
        <h2 class="fw-normal">Ауталипов Райымкул</h2>
        <p><?php echo substr('Писатель-прозаик. Ауталипов Райымкул родился 1923 году в Павлодарской области, Иртышского района, а. Токты. Окончил Высшие литературные курсы СП СССР (1959-1961), Казахский Государственный университет. Работал в редакции газеты Акмолинской, Карагандинской области' , 0, 251)?></p>
        <p><a class="btn btn-success" href="#">Читать подробнее... »</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4 text-center">
      <img src="<?php URL ?>/uploads/img/writers/writer-36.jpg" alt="" class="bd-placeholder-img rounded-circle" width="140" height="140">
        <h2 class="fw-normal">Сорокин Антон Семенович</h2>
        <p><?php echo substr('Писать начал с 1900 года. Главная тема — власть золота над людьми. Его пьесу «Золото» собирался ставить В. Э. Мейерхольд в театре В. Ф. Комиссаржевской, однако постановка была запрещена цензурой. Вершиной творчества Антона Сорокина является антивоенная повесть «Хохот Жёлтого Дьявола» (впервые опубликована в газете «Омский вестник» в 1914 году).', 0, 251)?></p>
        <p><a class="btn btn-success" href="#">Читать подробнее... »</a></p>
      </div><!-- /.col-lg-4 -->
    </div>
  </div>

  <?php include ROOT . '/views/layouts/footer.php'; ?>