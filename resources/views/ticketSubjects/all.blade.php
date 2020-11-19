@extends("answering::layout")
@section("content_header")
    @component("components.breadcrump",["items"=> ["Dashboard" =>"","current"=>"موضوعات تیکت ها"]])
        <a href="{{ route("answering.ticketSubjects.create") }}" class="btn btn-info btn-sm">جدید</a>
    @endcomponent
@endsection

@php
    use Hsy\Html\Facades\Html;
@endphp
@section("content")
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th></th>
                    <th>نام</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ticketSubjects as $ticketSubject)
                    <tr>
                        <td></td>
                        <td><a href="{{ route("answering.ticketSubjects.edit",$ticketSubject) }}">{{ $ticketSubject->title }}</a></td>
                        <td><a href="{{ route("answering.departments.show",$ticketSubject->department) }}">{{ $ticketSubject->department->name }}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
