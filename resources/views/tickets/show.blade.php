@extends("answering::layout")
@section("content_header")
    @component("components.breadcrump",
    ["items"=> ["Dashboard" =>"","Tickets" =>route("answering.tickets.index"),"current"=>"مشاهده تیکت"]])
    @endcomponent
@endsection
@php
    use Hsy\Html\Facades\Html
@endphp
@section("content")


    <x-success></x-success>
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card ">
                <div class="card-header">
                    مشاهده جزییات تیکت
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">

                            {{

                                Html::info()
                                    ->value($ticket->created_at_fa_ftt)
                                    ->label("تاریخ ایجاد")
                                    ->icon("edit")
                            }}
                            {{

                                Html::info()
                                    ->value($ticket->creator->name)
                                    ->label("کاربر ایجاد کننده")
                                    ->icon("user-plus")
                            }}
                            {{

                                Html::info()
                                    ->value($ticket->user->name)
                                    ->label("کاربر مسئول")
                                    ->icon("user")
                            }}
                            {{

                                 Html::info()
                                    ->value($ticket->priority_id)
                                    ->label("اولویت")
                                    ->icon("")
                            }}
                            {{

                                 Html::info()
                                    ->value($ticket->status_id)
                                    ->label("وضعیت")
                                    ->icon("")
                            }}


                            {{

                                Html::info()
                                    ->value($ticket->ticketSubject->title)
                                    ->label("موضوع درخواست")
                                    ->icon("office")
                            }}
                            {{
                                Html::info()
                                    ->when($ticket->isFieldDefined("body"))
                                    ->value($ticket->body)
                                    ->label("متن درخواست")
                                    ->icon("office")
                            }}
                            {{

                                Html::info()
                                    ->value($ticket->department->name)
                                    ->label("دپارتمان")
                                    ->icon("office")
                            }}
                            {{

                                Html::info()
                                    ->when($ticket->isFieldDefined("mobile_number"))
                                    ->value($ticket->mobile_number)
                                    ->label("شماره موبایل")
                                    ->icon("")
                            }}
                            {{

                                Html::info()
                                    ->when($ticket->isFieldDefined("phone_number"))
                                    ->value($ticket->phone_number)
                                    ->label("شماره تلفن ثابت")
                                    ->icon("")
                            }}
                            {{

                                Html::info()
                                    ->when($ticket->isFieldDefined("address"))
                                    ->value($ticket->address)
                                    ->label("آدرس")
                                    ->icon("")
                            }}
                            {{

                                Html::info()
                                    ->when($ticket->isFieldDefined("extra_mobile_number"))
                                    ->value($ticket->extra_mobile_number)
                                    ->label("شماره موبایل دوم")
                                    ->icon("")
                            }}
                            {{

                                Html::info()
                                    ->value($ticket->caller_name)
                                    ->label("نام تماس گیرنده")
                                    ->icon("")
                            }}
                            {{

                                Html::info()
                                    ->when($ticket->isFieldDefined("national_code"))
                                    ->value($ticket->national_code)
                                    ->label("کد ملی")
                                    ->icon("")
                            }}
                            {{

                                Html::info()
                                    ->when($ticket->isFieldDefined("city_id"))
                                    ->value($ticket->city->name)
                                    ->label("شهر")
                                    ->icon("")
                            }}
                            {{

                                Html::info()
                                    ->when($ticket->isFieldDefined("office_id"))
                                    ->value($ticket->office->name)
                                    ->label("اداره")
                                    ->icon("")
                            }}
                            {{

                                Html::info()
                                    ->when($ticket->isFieldDefined("email"))
                                    ->value($ticket->email)
                                    ->label("ایمیل")
                                    ->icon("")

                            }}

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
