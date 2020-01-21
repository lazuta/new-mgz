<div class="list-group-item message_form">
    <h5 class="card-title">Добавить комментарий</h5>
    <form action="{{ route('comment.store') }}" method="POST" >
        @csrf
        <input type="hidden" name="id" value="{{ $article->id }}">
        <div class="form-group">
            <textarea type="text" class="form-control" name="comment" id="comment" aria-describedby="comment" placeholder="Введите заголовок"></textarea>
        </div>
        <div class="form-group">
            <select class="form-control" name="approved">
                <option disabled selected value="null">Решение</option>
                <option value="1">Допустить к публикаиции</option>
                <option value="0">Отказать в публикаиции</option>
                <option value="null">Требутеся доработка</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Отправить</button>
    </form>
</div>
