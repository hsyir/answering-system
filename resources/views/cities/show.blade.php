@extends("answering::layout")
@section("content_header")
    @component("components.breadcrump",
    ["items"=> ["Dashboard" =>"","Cities" =>route("answering.cities.index"),"current"=>"مشاهده شهر"]])
    @endcomponent
@endsection
@php
    use Hsy\Html\Facades\Html;
@endphp
@section("content")


    <x-success></x-success>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card ">
                <div class="card-header">
                    اطلاعات شهر
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="text-success h4"><i class="fa fa-user"></i> {{ $city->name }} </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                            {{--                            {{ Html::info()->value($office->comment)->label("توضیحات")->icon("info") }}--}}
                            {{--                            {{ Html::info()->value($office->created_at_fa_ftt)->label("زمان ثبت نام صف")->icon("plus") }}--}}
                            {{--                            {{ Html::info()->value($office->updated_at_fa_ftt)->label("زمان آخرین ویرایش")->icon("edit") }}--}}
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="float-left">
                        <a class="btn btn-outline-success btn-sm" href="{{ route("answering.cities.edit",$city) }}"><i
                                    class="fa fa-edit"></i> ویرایش مشخصات </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">افزودن اداره در شهر</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">


                            <x-errors></x-errors>
                        </div>
                    </div>
                    <form action="{{ route('answering.cities.addOffice',$city)  }}"
                          method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group "> {{
                            Html::text("id")
                            ->value(old("id"))
                            ->label("کد اداره")
                            ->description("")
                             }}

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group ">

                                    {{
                                    Html::text("name")
                                    ->value(old("name"))
                                    ->label("نام اداره")
                                    ->description("")
                                     }}

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">{{ Html::submit()->label('ذخیره') }}</div>
                                </div>
                            </div>
                        </div>
                </div>
                </form>

            </div>
        </div>
    </div>
    <div class="col-md-6">

        <div class="card">
            <div class="card-header">ادارات</div>
            <div class="card-body">

                <table class="table">
                    <thead>
                    <tr>
                        <th>نام اداره</th>
                        <th>کد اداره</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($city->offices as $office )
                        <tr>
                            <td>{{ $office->name }}</td>
                            <td>{{ $office->id }}</td>
                            <td>
                                <form action="{{ route("answering.departments.removeUser",$office) }}"
                                      method="post">
                                    @method("DELETE")
                                    @csrf
                                    {{ Html::hidden("user_id")->value($office->id) }}
                                    <button type="submit" class="btn btn-sm btn-outline-danger">del</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
