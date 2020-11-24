@extends("answering::layout")
@section("content_header")
    @component("components.breadcrump",
    ["items"=> ["Dashboard" =>"/dashboard","Ticket Subjects" =>route("answering.ticketSubjects.index"),"current"=>"ویرایش اطلاعات موضوع تیکت"]])
    @endcomponent
@endsection

@php
    use Hsy\Html\Facades\Html;
@endphp
@section("content")
    <x-errors></x-errors>
    <x-success></x-success>
    @include("answering::ticketSubjects._form",["action"=>"edit"])
@endsection
