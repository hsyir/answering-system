@extends("answering::layout")
@section("content_header")
    @component("components.breadcrump",["items"=> ["Dashboard" =>"","current"=>"گزارش ها"]])
    @endcomponent
@endsection

@php
    use Hsy\Html\Facades\Html;
@endphp
@section("content")

    <div class="card">
        <div class="card-header">گزارش ها</div>
        <div class="card-body">
            <a href="{{ route("answering.reports.ticketsReport") }}">گزارش تیکت ها</a>
        </div>
    </div>

@endsection
