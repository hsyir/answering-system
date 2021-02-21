@extends("answering::layout")
@section("content_header")
    @component("components.breadcrump",["items"=> ["Dashboard" =>"","current"=>"درخواست ها"]])
    @endcomponent
@endsection

@php
    use Hsy\Html\Facades\Html;
@endphp
@section("content")

    <div class="card">
        <div class="card-header">فیلتر گزارش</div>
        <div class="card-body">
            <form action="{{ route("answering.reports.ticketsReport") }}" method="get">


                @method("put")
                <div class="row">
                    <div class="col-md-6">
                        <department-select
                                :initial_department_id="{{ json_encode(request("department_id")) }}"
                                :initial_subject_id="{{ json_encode(request("ticket_subject_id")) }}"
                                :with_subject_select="{{ json_encode(true) }}">
                        </department-select>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                {{ html::text("from_date")->placeholder("مثل: 1399/01/01")->label("از تاریخ")->value(request("from_date")) }}
                            </div>
                            <div class="col-md-12">
                                {{ html::text("to_date")->placeholder("مثل: 1399/01/01")->label("تا تاریخ")->value(request("to_date")) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" class="btn btn-primary btn-sm">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">درخواست ها</div>
        <div class="card-body">
            {{ $tickets->render() }}
            <table class="table ">
                <thead>
                <tr>
                    <th>شماره پیگیری</th>
                    <th>دپارتمان</th>
                    <th>موضوع درخواست</th>
                    <th>تاریخ</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->id }}</td>
                        <td>{{ $ticket->department_name }}</td>
                        <td><a href="{{route("answering.tickets.show",$ticket) }}">{{  $ticket->subject_title }}</a>
                        </td>
                        <td>{{ $ticket->created_at_fa_ftt }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
