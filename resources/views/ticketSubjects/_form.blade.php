<form action="{{ route('answering.ticketSubjects.store')  }}"
      method="post" enctype="multipart/form-data">
    @csrf
    @php

        $departments = \Hsy\AnsweringSystem\Models\Department::all()
        ->mapWithKeys(function($item){
            return [$item["id"]=>$item["name"]];
        });
    @endphp

    {{ Html::hidden()->name('ticketSubject_id')->value($ticketSubject->id)->when( $action=='edit') }}
    {{ Html::method()->value("PUT")->when($action=='edit') }}

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    {{
                    Html::text("title")
                    ->value(old("title",$ticketSubject->title))
                    ->label("موضوع")
                    ->description("")
                     }}
                    {{
                    Html::text("description")
                    ->value(old("description",$ticketSubject->description))
                    ->label("توضح بیشتر")
                    ->description("")
                     }}
                    {{
                    Html::select("department_id")
                    ->value(old("department_id",$ticketSubject->department_id))
                    ->select_options($departments)
                    ->caption("دپارتمان")
                    ->description("")
                     }}
                    {{
                    Html::select("priority")
                    ->value(old("priority",$ticketSubject->priority))
                    ->select_options([1=>"High",2=>"Low"])
                    ->caption("اولویت")
                    ->description("")
                     }}
                    @foreach(config("answering.ticket_subjects_fields",[]) as $field=>$config)
                        {{
                            Html::checkbox("fields[{$field}]")
                            ->label($config["label"])
                            ->value($field)
                            ->checked(
                                old(
                                    "fields.{$field}",
                                    isset($ticketSubject->fields[$field])
                                    )
                                )
                        }}
                    @endforeach
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
