<div class="card-footer message_form">
    <h5 class="card-title">Добавить ревьюирование</h5>
    <form action="{{ route('reviewer.review') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="reviewer_id" value="{{ $article->reviewer->id }}">
        <input type="hidden" name="article_id" value="{{ $article->id }}">
        <div class="form-group">
            <label for="file">Загрузка файла</label>
            <input type="file" class="form-control-file" name="file" id="file">
            <small id="passwordHelpBlock" class="form-text text-muted" style="color: red !important;">
                Поддерживаются файлы с разрешением .pdf!
            </small>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Отправить</button>
    </form>
</div>
