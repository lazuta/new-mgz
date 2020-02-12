<div class="card-footer message_form">
    <h5 class="card-title">Добавить ревьюирование</h5>
    <form action="" method="POST" >
        @csrf
        <input type="hidden" name="id" value="{{ $article->reviewer->id }}">
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Example textarea</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="file">Загрузка файла</label>
            <input type="file" class="form-control-file" name="file" id="file">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Отправить</button>
    </form>
</div>
