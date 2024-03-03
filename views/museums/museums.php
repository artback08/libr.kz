<?php include ROOT . '/views/layouts/header.php'; ?>
  
<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
      <li class="breadcrumb-item"><a href="<?php echo URL ?>">Главная</a></li>
      <li class="breadcrumb-item"><a href="<?php echo URL ?>/museums">Памятные места</a></li>
      
      <?php if(User::loggedIn()){ ?> 
      <li class="breadcrumb-item active" aria-current="page">
        <a href="<?php echo URL ?>/museums/add">
          <span class="badge text-bg-warning rounded-pill">Добавить</span>
        </a>
      </li>
      <?php } ?>

    </ol>
  </nav>
  <div class="row">
    <h6>Памятные места</h6>
    
    <div class="row mb-2 mt-5">
      
    <?php foreach ($museums as $museum): ?>
      
      <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <a href="<?php echo $museum['link'] ?>"></a><strong class="d-inline-block mb-2 text-primary-emphasis">Показать на карте</strong></a>
            <h3 class="mb-0"><?php echo $museum['name'] ?></h3>
            
            <?php if($museum['telephone'] != 0){ ?>
            <div class="mb-1 text-body-secondary"><?php echo $museum['telephone'] ?></div>
            <?php } ?>
            
            <?php if($museum['email'] != ''){ ?>
            <p class="card-text mb-auto"><?php echo $museum['email'] ?></p>
            <?php } ?>
            
            <a href="<?php echo URL ?>/museums/<?php echo $museum['id'] ?>" class="icon-link gap-1 icon-link-hover stretched-link">
              Подробнее
            </a>
          </div>
          <div class="col-auto d-none d-lg-block">
            <img class="bg-placeholder-img" width="200" height="250" src="<?php echo URL ?>/uploads/img/museums/<?php echo $museum['photo'] ?>" alt="">
            </div>
        </div>
      </div>
      <?php endforeach; ?>

    </div>
    
    
  </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>