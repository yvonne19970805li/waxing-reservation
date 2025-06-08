<div>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">補充會員資料</div>

                <div class="card-body">
                    <form method="POST" action="{{url('/signUp') }}">

                        <div class="mb-3">
                            <label for="name" class="form-label">姓名</label>
                            <input type="text" id="name" name="name" class="form-control" required value="{{ old('name') }}">
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">手機號碼</label>
                            <input type="text" id="phone" name="phone" class="form-control" required value="{{ old('phone') }}">
                        </div>
                        
                        <div class="mb-3">
                            <label for="phone" class="form-label">性別</label>
                            <input type="text" id="sexual" name="sexual" class="form-control" required value="{{ old('phone') }}">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">提交</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
