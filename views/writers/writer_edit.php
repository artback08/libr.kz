<?php include ROOT . '/views/layouts/header.php'; ?>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="http://<?php echo SITE; ?>/writers">Авторы</a></li>
            <li class="breadcrumb-item active" aria-current="page">Редактировать</li>
        </ol>
    </nav>

    <div class="row">
    <div class="col-md-12 col-lg-6 lg-offset-3">
        <h4 class="mb-3">Запись о писателе</h4>
        <form action="http://<?php echo SITE; ?>/writers/update/<?php echo $writer['id'] ?>" method="POST"  class="needs-validation" novalidate="" enctype="multipart/form-data">
            <div class="row g-3">
                <div class="col-sm-9">
                    <label for="name" class="form-label">Писатель</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="" value="<?php echo htmlspecialchars($writer['name']); ?>" required="">
                    <div class="invalid-feedback">Это поле необходимо заполнить</div>
                </div>
                <div class="col-sm-3">
                    <label for="years" class="form-label">Годы жизни</label>
                    <input name="years" type="number" class="form-control" id="years" placeholder="" value="<?php echo $writer['years']; ?>" required="">
                    <div class="invalid-feedback">Valid last name is required.</div>
                </div>
                <label for="biography">Биография</label>
                <div class="form-floating">
                    <textarea name="biography" style="height: 500px" class="form-control" placeholder="..." id="biography"><?php echo ($writer['biography']); ?></textarea>
                </div>
                
                <img style="width: 150px;" src="<?php echo URL; ?>/uploads/img/writers/<?php echo $writer['photo']; ?>" alt="">
                
                <div class="mb-3">
                <label for="formFile" class="form-label">Заменить фотографию</label>
                    <input class="form-control" type="file" id="formFile"  name="photo">
                </div>
            </div>
            <hr class="my-4">
            <h4 class="mb-3">Статус публикации</h4>
            <div class="my-3">
                <div class="form-check">
                    <input name="is_published" value="1" type="radio" class="form-check-input" checked="">
                    <label class="form-check-label">Опубликована</label>
                </div>
                <div class="form-check">
                    <input name="is_published" value="0" type="radio" class="form-check-input">
                    <label class="form-check-label">Черновик</label>
                </div>
            </div>
            <hr class="my-4">
            <button class="w-100 btn btn-primary btn-lg" type="submit" name="update">Редактировать</button>
        </form>
      </div>
    </div>
</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>