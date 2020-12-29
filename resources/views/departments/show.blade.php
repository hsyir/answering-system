@extends("answering::layout")
@section("content_header")
    @component("components.breadcrump",
    ["items"=> ["Dashboard" =>"","Queues" =>route("answering.departments.index"),"current"=>"مشاهده دپارتمان"]])
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
                    اطلاعات دپارتمان
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="text-success h4"><i class="fa fa-user"></i> {{ $department->name }} </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
{{--                            {{ Html::info()->value($department->comment)->label("توضیحات")->icon("info") }}--}}
{{--                            {{ Html::info()->value($department->created_at_fa_ftt)->label("زمان ثبت نام صف")->icon("plus") }}--}}
{{--                            {{ Html::info()->value($department->updated_at_fa_ftt)->label("زمان آخرین ویرایش")->icon("edit") }}--}}
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="float-left">
                        <a class="btn btn-outline-success btn-sm" href="{{ route("answering.departments.edit",$department) }}"><i
                                class="fa fa-edit"></i> ویرایش مشخصات </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">افزودن کاربر به صف</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <x-errors></x-errors>
                        </div>
                    </div>
                    <form action="{{ route('answering.departments.addUser',$department)  }}"
                          method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label for="user_select" class="col-form-label text-md-right">نام کاربر</label>
                                    <x-select-user></x-select-user>
                                    <small>کاربر مورد نظر خود را انتخاب کنید</small>
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
                <div class="card-header">افراد حاضر در دپارتمان</div>
                <div class="card-body">

                    <table class="table">
                        <thead>
                        <tr>
                            <th>نام کاربر</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($department->users as $user )
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>
                                    <form action="{{ route("answering.departments.removeUser",$department) }}" method="post">
                                        @method("DELETE")
                                        @csrf
                                        {{ Html::hidden("user_id")->value($user->id) }}
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
