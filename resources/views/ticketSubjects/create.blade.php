@extends("answering::layout")
@section("content_header")
    @component("components.breadcrump",
    ["items"=> ["Ticket Subjects" =>"","current"=>"تعریف دپارتمان جدید"]])
    @endcomponent
@endsection

@php
    use Hsy\Html\Facades\Html;
@endphp
@section("content")
    <x-errors></x-errors>
    <x-success></x-success>
        @include("answering::ticketSubjects._form",["action"=>"create"])
@endsection
