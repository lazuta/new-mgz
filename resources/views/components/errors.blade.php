@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" id="success-alert" role="alert">
        @foreach ($errors->all() as $error)
            <p class="errors"> * {{ $error }}</p>
        @endforeach
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif