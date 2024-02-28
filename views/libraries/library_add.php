<?php include ROOT . '/views/layouts/header.php'; ?>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
            <li class="breadcrumb-item"><a href="/">Library</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>/libraries">Библиотеки</a></li>
            <li class="breadcrumb-item active" aria-current="page">Добавить</li>
        </ol>
    </nav>

    <div class="row">
    <div class="col-md-12 col-lg-6 lg-offset-3">
        <h4 class="mb-3">Запись о Библиотеке</h4>
        <form action="<?php echo URL; ?>/libraries/store" method="POST"  class="needs-validation" novalidate="" enctype="multipart/form-data">
            <div class="row g-3">
                <div class="col-sm-12">
                    <label for="name" class="form-label">Библиотека</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="" value="" required="">
                    <div class="invalid-feedback">Это поле необходимо заполнить</div>
                </div>
                <div class="col-sm-12">
                    <label for="address" class="form-label">Адрес</label>
                    <input name="address" type="text" class="form-control" id="address" placeholder="" value="" required="">
                    <div class="invalid-feedback">Valid last name is required.</div>
                </div>
                <div class="col-sm-12">
                    <label for="link" class="form-label">2GIS</label>
                    <input name="link" type="text" class="form-control" id="link" placeholder="" value="" required="">
                    <div class="invalid-feedback">Valid last name is required.</div>
                </div>
                <label for="history">История</label>
                <div class="form-floating">
                    <textarea name="history" class="form-control" placeholder="Leave a comment here" id="history"></textarea>
                </div>
                <!-- <div class="col-sm-6">
                    <label for="name" class="form-label">Телефон</label>
                    <input name="telephone" type="text" class="form-control" id="name" placeholder="" value="" required="">
                    <div class="invalid-feedback">Это поле необходимо заполнить</div>
                </div> -->
                <div class="col-6">
                    <label for="telephone" class="form-label">Телефон</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text">+ 7</span>
                        <input name="telephone" type="number" class="form-control" placeholder="" required="">
                    <div class="invalid-feedback">
                    Your username is required.   
                    </div>
              </div>
            </div>
                <div class="col-sm-6">
                    <label for="address" class="form-label">Сайт</label>
                    <input name="site" type="text" class="form-control" id="address" placeholder="" value="" required="">
                    <div class="invalid-feedback">Valid last name is required.</div>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Добавить фотографию</label>
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
                    <label class="form-check-label" >Черновик</label>
                </div>
            </div>
            <hr class="my-4">
            <button name="submit" type="submit" class="w-100 btn btn-primary btn-lg">Добавить запись</button>
        </form>
      </div>
    </div>
</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>