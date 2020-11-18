@extends("answering::layout")
@section("content_header")
    @component("answering::components.breadcrump",
    ["items"=> ["Calls" =>"","current"=>"تعریف صف جدید"]])
    @endcomponent
@endsection

@php
    use Hsy\Html\Facades\Html;
@endphp
@section("content")
        @include("answering::calls._form",["action"=>"create"])
@endsection
