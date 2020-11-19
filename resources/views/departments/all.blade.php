@extends("answering::layout")
@section("content_header")
    @component("components.breadcrump",["items"=> ["Dashboard" =>"","current"=>"صف ها"]])
        <a href="{{ route("answering.departments.create") }}" class="btn btn-info btn-sm">جدید</a>
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
                @foreach($departments as $department)
                    <tr>
                        <td></td>
                        <td><a href="{{ route("answering.departments.edit",$department) }}">{{ $department->name }}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
