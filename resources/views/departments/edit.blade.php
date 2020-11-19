@extends("answering::layout")
@section("content_header")
    @component("components.breadcrump",
    ["items"=> ["Dashboard" =>"","Departments" =>route("answering.departments.index"),"current"=>"ویرایش اطلاعات صف"]])
    @endcomponent
@endsection

@php
    use Hsy\Html\Facades\Html;
@endphp
@section("content")
    <x-success></x-success>
        @include("answering::departments._form",["action"=>"edit"])
@endsection
