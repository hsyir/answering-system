@extends("answering::layout")
@section("content_header")
    @component("components.breadcrump",
    ["items"=> ["Dashboard" =>"/dashboard","Cities" =>route("answering.cities.index"),"current"=>"ویرایش اطلاعات شهر"]])
    @endcomponent
@endsection

@php
    use Hsy\Html\Facades\Html;
@endphp
@section("content")
    <x-success></x-success>
        @include("answering::departments._form",["action"=>"edit"])
@endsection
