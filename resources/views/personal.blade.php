@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="wrapContent row">
            <div class="col-md-4 col-sm-3">
                <div class="row wrapBar">
                    {{ Html::image('/img/character_'. $user->image . '.png', $user->name, ['class'=>'avatar center-block']) }}
                    <div class="col-12">
                        <h3>{{ $user->name }}</h3>
                        <p>Email: <strong>{{ $user->email }}</strong></p>
                        <p>Sex: <strong>{{ $user->sex==0?'Male':'Female' }}</strong></p>
                    </div>
                    <div class="col-12"></div>
                </div>
            </div>
        </div>
    </div>

    <div id="modal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            </div>
        </div>
    </div>
@endsection
