@extends("answering::layout")
@section("content")
    <div class="card">
        <div class="card-body">
            <h2 class="text-center pt-4">به سامانه پاسخگویی 3128 خوش آمدید</h2>
            <div class="text-center">
                سامانه تیکتینگ و پاسخگویی تلفنی کمیته امداد خراسان رضوی
            </div>
            <div class="text-center pt-4">
                <a href="{{ route("answering.responding.stage") }}" class="btn btn-success ">ورود به پنل پاسخگویی</a>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="p-5">
                        <img src="{{ asset("images/emamreza.jpg") }}" alt="" class="w-100">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection