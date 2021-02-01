@extends("answering::layout")
@section("content_header")
    @component("components.breadcrump",["items"=> ["Dashboard" =>"","current"=>"شهر ها"]])
        <a href="{{ route("answering.cities.create") }}" class="btn btn-info btn-sm">شهر جدید</a>
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
                    <th>نام شهر</th>
                    <th>تعداد اداره</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cities as $city)
                    <tr>
                        <td><a href="{{ route("answering.cities.show",$city) }}">{{ $city->name }}</a></td>
                        <td>{{ $city->offices_count }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
