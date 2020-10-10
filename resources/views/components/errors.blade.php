@IF($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert-pages">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Ошибка!</div>
                        <div class="p text-gray-800">{{ $error }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@ENDIF