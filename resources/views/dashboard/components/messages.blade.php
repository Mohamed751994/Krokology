<!-- Errors -->
@if ($errors->any())
    <div class="div_errors">
        @foreach ($errors->all() as $error)
            <div class="alert border-0 border-danger border-start border-4 bg-danger alert-dismissible fade show">
                <div class="d-flex align-items-center">
                    <div class="fs-3 text-white"><i class="bi bi-x-circle-fill"></i>
                    </div>
                    <div class="ms-3">
                        <div class="text-white">{{$error}}</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    </div>
@endif

<!-- Error -->
@if (Session::has('error'))
    <div class="div_errors">
        <div class="alert border-0 border-danger border-start border-4 bg-danger alert-dismissible fade show ">
            <div class="d-flex align-items-center">
                <div class="fs-3 text-white"><i class="bi bi-x-circle-fill"></i>
                </div>
                <div class="ms-3">
                    <div class="text-white">{{Session::get('error')}}</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif
<!-- end -->
<!-- Success -->
@if(Session::has('success'))
    <div class="div_success">
        <div class="alert border-0 border-success border-start border-4 bg-success alert-dismissible fade show">
            <div class="d-flex align-items-center">
                <div class="fs-3 text-white"><i class="bi bi-check-circle-fill"></i>
                </div>
                <div class="ms-3">
                    <div class="text-white">{{Session::get('success')}}</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif
<!-- end -->
