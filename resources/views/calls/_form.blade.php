<form action="{{ route('answering.calls.store')  }}"
      method="post" enctype="multipart/form-data">
    @csrf
    {{ Html::hidden()->name('call_id')->value($call->id)->when( $action=='edit') }}
    {{ Html::method()->value("PUT")->when($action=='edit') }}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    {{
                    Html::text("first_name")
                    ->value(old("first_name",$call->callerInfo->first_name))
                    ->label("نام کوچک ")
                    ->description("")
                     }}
                     {{
                    Html::text("last_name")
                    ->value(old("last_name",$call->callerInfo->last_name))
                    ->label("نام خانوادگی ")
                    ->description("")
                     }}
                     {{
                    Html::text("call_date")
                    ->value(old("last_name",$call->callerInfo->last_name))
                    ->label("تاریخ تماس")
                    ->description("")
                     }}
                    {{
                    Html::text("call_time")
                    ->value(old("last_name",$call->callerInfo->last_name))
                    ->label("زمان تماس")
                    ->description("")
                     }}
                    {{
                    Html::text("national_code")
                    ->value(old("last_name",$call->callerInfo->last_name))
                    ->label("کد ملی")
                    ->description("")
                     }}
                    {{
                    Html::text("mobile_number")
                    ->value(old("last_name",$call->callerInfo->last_name))
                    ->label("شماره موبایل")
                    ->description("")
                     }}
                    {{
                    Html::text("mobile_number")
                    ->value(old("last_name",$call->callerInfo->last_name))
                    ->label("شماره ثابت")
                    ->description("")
                     }}
                    {{
                    Html::text("subject")
                    ->value(old("last_name",$call->callerInfo->last_name))
                    ->label("موضوع درخواست")
                    ->description("")
                     }}
                    {{
                    Html::text("ticket_body")
                    ->value(old("last_name",$call->callerInfo->last_name))
                    ->label("شرح درخواست")
                    ->description("")
                     }}
                    {{
                    Html::text("department_id")
                    ->value(old("last_name",$call->callerInfo->last_name))
                    ->label("پیگیری از دپارتمان")
                    ->description("")
                     }}
                    {{
                    Html::text("department_id")
                    ->value(old("last_name",$call->callerInfo->last_name))
                    ->label("جنسیت")
                    ->description("")
                     }}


                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-left">{{ Html::submit()->label('ذخیره') }}</div>
                    </div>
                </div>
                </div>
            </div>

        </div>
    </div>
</form>
