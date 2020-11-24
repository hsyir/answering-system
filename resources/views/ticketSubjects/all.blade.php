@extends("answering::layout")
@section("content_header")
    @component("components.breadcrump",["items"=> ["Dashboard" =>"","current"=>"موضوعات درخواست ها"]])
        <a href="{{ route("answering.ticketSubjects.create") }}" class="btn btn-info btn-sm">جدید</a>
    @endcomponent
@endsection

@php
    use Hsy\Html\Facades\Html;
@endphp
@section("content")
    <div class="alert alert-secondary">
        در این لیست موضوعات از پیش تعریف شده برای درخواست ها بر اساس واحد سازمانی پاسخگو قرار گرفته است.
    </div>
    @foreach($departments as $department)
        <div id="accordion">
            <div class="card">
                <div class="card-header" id="head{{ $department->id }}">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{ $department->id }}"
                                aria-expanded="true" aria-controls="collapse{{ $department->id }}">
                            {{ $department->name }} <span
                                    class="badge badge-secondary"> تعداد موضوعات {{ $department->ticket_subjects_count }}</span>



                        </button>

                        <span class="float-left">
                                    <a href="{{ route("answering.ticketSubjects.create",$department) }}" class="btn btn-sm btn-outline-secondary">افزودن موضوع جدید</a>
                        </span>
                    </h5>
                </div>

                <div id="collapse{{ $department->id }}" class="collapse " aria-labelledby="headingOne"
                     data-parent="#accordion">
                    <div class="card-body">


                        @foreach($department->ticketSubjects()->withCount("tickets")->get() as $subject)
                            <a class="list-group-item list-group-item-action"
                               href="{{ route("answering.ticketSubjects.edit",$subject) }}">
                                {{ $subject->title }}
                                @if($subject->tickets_count > 0)
                                    <span class="badge badge-success">تعداد درخواست ها: {{ $subject->tickets_count }}</span>
                                @endif


                            </a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
