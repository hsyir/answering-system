@extends("answering::layout")
@section("content_header")
    @component("components.breadcrump",["items"=> ["Dashboard" =>route("admin.dashboard.index"),"current"=>"صف ها"]])
        <a href="{{ route("admin.queues.create") }}" class="btn btn-info btn-sm">جدید</a>
    @endcomponent
@endsection

@php
    use Hsy\Html\Facades\Html;
@endphp
@section("content")
    <x-success></x-success>
    {{ $queues->render() }}
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th></th>
                    <th>نام</th>
                    <th>شماره</th>
                    <th>تعداد کاربر</th>
                    <th>فی ورودی</th>
                    <th>ضریب کسر اعتبار</th>
                </tr>
                </thead>
                <tbody>
                @foreach($queues as $queue)
                    <tr>
                        <td></td>
                        <td><a href="{{ route("admin.queues.show",$queue) }}">{{ $queue->name }}</a></td>
                        <td>{{ $queue->simotel_number }}</td>
                        <td>{{ $queue->users_count }}</td>
                        <td>{{ $queue->entrance_fee }}</td>
                        <td>{{ $queue->credit_ratio }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
