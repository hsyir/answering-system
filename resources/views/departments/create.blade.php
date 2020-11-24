@extends("answering::layout")
@section("content_header")
    @component("components.breadcrump",
    ["items"=> ["Dashboard"=>"/dashboard","Departments" =>"","current"=>"تعریف دپارتمان جدید"]])
    @endcomponent
@endsection

@php
    use Hsy\Html\Facades\Html;
@endphp
@section("content")
    <x-errors></x-errors>
    <x-success></x-success>
        @include("answering::departments._form",["action"=>"create"])
@endsection
