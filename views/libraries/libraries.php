<?php require_once ROOT . '/views/layouts/header.php'; ?>

  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
        <li class="breadcrumb-item"><a href="<?php echo URL ?>">Главная</a></li>
        <li class="breadcrumb-item"><a href="<?php echo URL ?>/libraries">Библиотеки</a></li>
        
        <?php if(User::loggedIn()){ ?>
        <li class="breadcrumb-item active" aria-current="page">
          <a href="<?php echo URL ?>/libraries/add">
            <span class="badge text-bg-warning rounded-pill">Добавить</span>
          </a>
        </li>
        <?php } ?>

      </ol>
    </nav>
    <div class="row">
      <h6>Библиотеки</h6>

      
      <?php foreach ($libraries as $library): ?>
        <div class="col-md-6">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              
              <a href="<?php echo URL ?>/libraries/<?php echo $library['id'] ?>"><h4 class="mb-0"><?php echo $library['name'] ?></h4></a>
              <strong class="d-inline-block mb-2 text-primary-emphasis"><?php echo $library['address'] ?></strong>
              <div class="mb-1 text-body-secondary">+ 7 <?php echo $library['telephone'] ?></div>
              <p class="card-text mb-auto"><?php echo $library['site'] ?></p>
              <a href="<?php echo $library['link'] ?>" target="_blank" class="">
                Показать на карте
                <!-- <svg class="bi"><use xlink:href="#chevron-right"></use></svg> -->
              </a>
            </div>
            <!-- <div class="col-auto d-none d-lg-block"> -->
              <!-- <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
              <!-- <img src="<?php echo URL ?>/uploads/img/libraries/<?php echo $library['photo'] ?>" class="bd-placeholder-img" width="200" alt=""> -->
            <!-- </div> -->
          </div>
        </div>
      
      <?php endforeach; ?>

      

  </div>
  

<?php require_once ROOT . '/views/layouts/footer.php'; ?>