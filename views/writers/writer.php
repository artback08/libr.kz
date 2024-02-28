<?php require_once ROOT . '/views/layouts/header.php'; ?>

    <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
        <li class="breadcrumb-item"><a href="/">Library</a></li>
        <li class="breadcrumb-item"><a href="<?php echo URL ?>/writers">Писатели</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $writer['name']; ?></li>
        <?php if(User::loggedIn()){ ?><li class="breadcrumb-item"><a href="<?php echo URL ?>/writers/edit/<?php echo $writer['id'] ?>"><span class="badge text-bg-info rounded-pill">Редактировать</span></a></li><?php } ?>
          <?php if(User::loggedIn()){ ?><li class="breadcrumb-item"><a href="<?php echo URL ?>/writers/destroy/<?php echo $writer['id'] ?>"><span class="badge text-bg-danger rounded-pill">Удалить</span></a></li><?php } ?>
      </ol>
    </nav>
    
    <div class="row">
      <h6>Писатели</h6>
        <div class="col-lg-12">
          <div class="text-center">
            <img src="<?php echo URL; ?>/uploads/img/writers/<?php echo $writer['photo']; ?>" class="align-items-center" height="250" alt="<?php echo $writer['name']; ?>">
          </div>
          <h2 class="fw-normal text-center"><?php echo $writer['name']; ?></h2>
          <div class="writer__years text-center mb-3">
            ( <?php echo years($writer['years']); ?> гг. )
          </div>
          <p><?php echo $writer['biography']; ?></p>
        </div>
    </div>

  </div>
  

<?php require_once ROOT . '/views/layouts/footer.php'; ?>