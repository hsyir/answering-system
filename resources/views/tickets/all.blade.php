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
        <div class="card-header">درخواست ها</div>
        <div class="card-body">
            <table class="table ">
                <thead>
                <tr>
                    <th>شماره پیگیری</th>
                    <th>دپارتمان</th>
                    <th>موضوع درخواست</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->id }}</td>
                        <td>{{ $ticket->department->name }}</td>
                        <td><a href="{{route("answering.tickets.show",$ticket) }}">{{  $ticket->ticketSubject->title }}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
