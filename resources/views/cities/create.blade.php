@extends("answering::layout")
@section("content_header")
    @component("components.breadcrump",
    ["items"=> ["Dashboard"=>"/dashboard","Cities" =>"","current"=>"ثبت شهر جدید"]])
    @endcomponent
@endsection

@php
    use Hsy\Html\Facades\Html;
@endphp
@section("content")
    <x-errors></x-errors>
    <x-success></x-success>
        @include("answering::cities._form",["action"=>"create"])
@endsection
