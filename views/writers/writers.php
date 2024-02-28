<?php require_once ROOT . '/views/layouts/header.php'; ?>
<!-- <?php require_once ROOT . '/views/layouts/sidebar.php'; ?> -->

    <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
        <li class="breadcrumb-item"><a href="<?php echo URL ?>">Library</a></li>
        <li class="breadcrumb-item"><a href="<?php echo URL ?>/writers">Писатели</a></li>
        <?php if(User::loggedIn()){ ?><li class="breadcrumb-item active" aria-current="page"><a href="<?php echo URL ?>/writers/add"><span class="badge text-bg-warning rounded-pill">Добавить</span></a></li><?php } ?>
      </ol>
    </nav>
    <div class="row">
      <h6>Писатели</h6>

      <?php foreach ($writers as $writer): ?>
        <div class="col-lg-4 text-center mb-5">
          
          <img src="<?php echo URL; ?>/uploads/img/writers/<?php echo $writer['photo']; ?>" class=" cover" height="140"  alt="<?php echo $writer['name']; ?>">
          
          <h2 class="fw-normal"><?php echo $writer['name']; ?></h2>
          <p><?php echo substr($writer['biography'], 0, 251); ?>...</p>
          <p><a class="btn btn-secondary" href="http://<?php echo SITE; ?>/writers/<?php echo $writer['id'] ?>">Подробнее »</a></p>
        </div>
      <?php endforeach; ?>


  </div>
  

<?php require_once ROOT . '/views/layouts/footer.php'; ?>