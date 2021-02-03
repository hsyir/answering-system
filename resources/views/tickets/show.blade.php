@extends("answering::layout")
@section("content_header")
    @component("components.breadcrump",
    ["items"=> ["Dashboard" =>"","Tickets" =>route("answering.tickets.index"),"current"=>"مشاهده تیکت"]])
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
                    مشاهده جزییات تیکت
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="text-success"> {{ $ticket->ticketSubject->title }} </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {{ Html::info()->value($ticket->ticketSubject->title)->label("موضوع درخواست")->icon("office") }}
        {{ Html::info()->when($ticket->isFieldDefined("body"))->value($ticket->body)->label("متن درخواست")->icon("office") }}
        {{ Html::info()->value($ticket->department->name)->label("دپارتمان")->icon("office") }}
        {{ Html::info()->value($ticket->creator->name)->label("کاربر ایجاد کننده")->icon("user-plus") }}
        {{ Html::info()->value($ticket->user->name)->label("کاربر مسئول")->icon("user-plus") }}
        {{ Html::info()->value($ticket->priority_id)->label("اولویت")->icon("") }}
        {{ Html::info()->value($ticket->status_id)->label("وضعیت")->icon("") }}
        {{ Html::info()->when($ticket->isFieldDefined("mobile_number"))->value($ticket->mobile_number)->label("شماره موبایل")->icon("") }}
        {{ Html::info()->when($ticket->isFieldDefined("phone_number"))->value($ticket->phone_number)->label("شماره تلفن ثابت")->icon("") }}
        {{ Html::info()->when($ticket->isFieldDefined("address"))->value($ticket->address)->label("آدرس")->icon("") }}
        {{ Html::info()->when($ticket->isFieldDefined("extra_mobile_number"))->value($ticket->extra_mobile_number)->label("شماره موبایل دوم")->icon("") }}
        {{ Html::info()->value($ticket->caller_name)->label("نام تماس گیرنده")->icon("") }}
        {{ Html::info()->when($ticket->isFieldDefined("national_code"))->value($ticket->national_code)->label("کد ملی")->icon("") }}
        {{ Html::info()->when($ticket->isFieldDefined("city_id"))->value($ticket->city->name)->label("شهر")->icon("") }}
        {{ Html::info()->when($ticket->isFieldDefined("office_id"))->value($ticket->office->name)->label("اداره")->icon("") }}
        {{ Html::info()->when($ticket->isFieldDefined("email"))->value($ticket->email)->label("ایمیل")->icon("") }}
                        </div>
                        <div class="col-md-6">
{{--                            {{ Html::info()->value($queue->comment)->label("توضیحات")->icon("info") }}--}}
{{--                            {{ Html::info()->value($queue->created_at_fa_ftt)->label("زمان ثبت نام صف")->icon("plus") }}--}}
{{--                            {{ Html::info()->value($queue->updated_at_fa_ftt)->label("زمان آخرین ویرایش")->icon("edit") }}--}}
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="float-left">
                       {{-- <a class="btn btn-outline-success btn-sm" href=""><i
                                class="fa fa-edit"></i> ویرایش مشخصات </a>--}}
                    </div>
                </div>
            </div>
        </div>
       {{-- <div class="col-md-6 mb-4">
            <div class="card ">
                <div class="card-header">
                    گزارش
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <calls-report :queue_id="{{ json_encode($queue->id) }}"></calls-report>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="float-left">

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
                    <form action="{{ route('admin.queues.add')  }}"
                          method="post">
                        @csrf
                        {{ Html::hidden()->name('queue_id')->value($queue->id) }}
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
                <div class="card-header">مشاورین حاضر در صف</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>کاربر</th>
                            <th>داخلی سیموتل</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($queue->users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->simotel_number }}</td>

                                <td>
                                    <form action="{{ route("admin.queues.removeUserFromQueue") }}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        {{ Html::hidden("user_id")->value($user->id) }}
                                        {{ Html::hidden("queue_id")->value($queue->id) }}
                                        <button type="submit" class="btn btn-link text-danger"><i
                                                class="fa fa-window-close "></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-12 mb-4">
            <div class="card ">
                <div class="card-header">
                    آخرین تماس ها
                </div>
                <div class="card-body">
                    @php
                        $report = new \App\Classes\Reports\CallsReports();

                    @endphp

                    <table class="table">
                        <thead>
                        <tr>
                            <th>تاریخ</th>
                            <th>ساعت</th>
                            <th>مدت مکالمه</th>
                            <th>مشاور</th>
                            <th>شماره ورودی</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($report->getCalls($queue->id) as $call)
                            <tr>
                                <td>{{ $call->created_at_fa_f }}</td>
                                <td>{{ $call->created_at->format("H:i:s") }}</td>
                                <td>{{ $call->call_time_readable_short }}</td>
                                <td>{{ $call->user->name }}</td>
                                <td>{{ $call->src_number }}</td>
                                <td>{{ $call->created_at->ago() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="float-left">

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-4">
            <div class="card ">
                <div class="card-header">
درامد مشاورین
                </div>
                <div class="card-body">
                    @php
                        $report = new \App\Classes\Reports\CallsReports();

                    @endphp

                    <table class="table">
                        <thead>
                        <tr>
                            <th>مشاور</th>
                            <th>درامد</th>
                            <th>تعداد تماس</th>
                            <th>مجموع زمان</th>
                            <th>میانگین امتیاز</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($report->usersReport($queue->id) as $report)
                            <tr>
                                <td>{{ $report->user->name }}</td>
                                <td>{{ $report->total_amount }}</td>
                                <td>{{ $report->calls_count }}</td>
                                <td>{{ $report->call_time_readable_short }}</td>
                                <td>{{ $report->poll_score_avg }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="float-left">

                    </div>
                </div>
            </div>
        </div>--}}
    </div>
@endsection
