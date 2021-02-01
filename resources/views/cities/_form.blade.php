<form action="{{ route('answering.cities.store')  }}"
      method="post" enctype="multipart/form-data">
    @csrf
    {{ Html::hidden()->name('city_id')->value($city->id)->when( $action=='edit') }}
    {{ Html::method()->value("PUT")->when($action=='edit') }}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    {{
                    Html::text("name")
                    ->value(old("name",$city->name))
                    ->label("نام شهر")
                    ->description("")
                     }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">{{ Html::submit()->label('ذخیره') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
