@extends("answering::layout")
@section("content_header")
    @component("components.breadcrump",["items"=> ["Dashboard" =>"","current"=>"دپارتمان ها"]])
        <a href="{{ route("answering.departments.create") }}" class="btn btn-info btn-sm">دپارتمان جدید</a>
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
                    <th>نام واحد</th>
                    <th>تعداد موضوعات</th>
                    <th>تعداد درخواست ها</th>
                </tr>

                </thead>
                <tbody>
                @foreach($departments as $department)
                    <tr>
                        <td><a href="{{ route("answering.departments.show",$department) }}">{{ $department->name }}</a></td>
                        <td>{{ $department->ticket_subjects_count }}</td>
                        <td>{{ $department->tickets_count }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
