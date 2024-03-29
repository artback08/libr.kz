<?php include ROOT . '/views/layouts/header.php'; ?>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>/libraries">Библиотеки</a></li>
            <li class="breadcrumb-item active" aria-current="page">Обновить</li>
        </ol>
    </nav>

    <div class="row">
    <div class="col-md-12 col-lg-6 lg-offset-3">
        <hr class="my-4">
        <h4 class="mb-3">Редактирование записи о Библиотеке</h4>
        <form action="<?php echo URL; ?>/libraries/update/<?php echo $library['id'] ?>" method="POST"  class="needs-validation" novalidate="" enctype="multipart/form-data">
            <div class="row g-3">
                <div class="col-sm-12">
                    <label for="name" class="form-label">Библиотека</label>
                    <input name="name" type="text" class="form-control" id="name" value="<?php echo $library['name'] ?>">
                </div>
                <div class="col-sm-12">
                    <label for="address" class="form-label">Адрес</label>
                    <input name="address" type="text" class="form-control" value="<?php echo $library['address'] ?>">
                </div>
                <div class="col-sm-12">
                    <label for="link" class="form-label">2GIS</label>
                    <input name="link" type="text" class="form-control" value="<?php echo $library['link'] ?>">
                </div>
                <label for="history">История</label>
                <div class="form-floating">
                    <textarea name="history" class="form-control"><?php echo $library['history'] ?></textarea>
                </div>
                <div class="col-6">
                    <label for="telephone" class="form-label">Телефон</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text">+ 7</span>
                        <input name="telephone" type="number" class="form-control" value="<?php echo $library['telephone'] ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <label for="site" class="form-label">Сайт</label>
                    <input name="site" type="text" class="form-control" value="<?php echo $library['site'] ?>">
                </div>
                <div class="mb-3">
                <img style="width: 150px;" src="<?php echo URL; ?>/uploads/img/libraries/<?php echo $library['photo']; ?>" alt="">
                    <label for="formFile" class="form-label">Загрузить фотографию</label>
                    <input class="form-control" type="file" name="photo">
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
                    <label class="form-check-label" >Черновик</label>
                </div>
            </div>
            <hr class="my-4">
            <button name="update" type="submit" class="w-100 btn btn-primary btn-lg">Обновить запись</button>
        </form>
      </div>
    </div>
</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>