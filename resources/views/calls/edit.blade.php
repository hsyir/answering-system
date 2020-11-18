@extends("back.layout.app")
@section("content_header")
    @component("components.breadcrump",
    ["items"=> ["Dashboard" =>route("admin.queues.index"),"Users" =>route("admin.queues.index"),"current"=>"ویرایش اطلاعات صف"]])
    @endcomponent
@endsection

@php
    use Hsy\Html\Facades\Html;
@endphp
@section("content")
    <x-success></x-success>
        @include("back.queues._form",["action"=>"edit"])
@endsection
