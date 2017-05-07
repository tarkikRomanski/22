@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="wrapContent row">
            <div class="col-md-4 col-sm-3">
                <div class="row wrapBar">
                    {{ Html::image('/img/'. $user->image . '.png', $user->name, ['class'=>'avatar center-block']) }}
                    <div class="col-12">
                        <h3>{{ $user->name }}</h3>
                        <p>Email: <strong>{{ $user->email }}</strong></p>
                        <p>Sex:
                            <strong>
                                {{ Html::image('/img/'.($user->sex==0?'male':'female').'.png') }}
                            </strong>
                        </p>
                    </div>
                    <div class="col-12">



                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-9">
                <h1 class="modal-title">Daily statistic</h1>

                <small>{{ \Carbon\Carbon::today()->toDateString() }}</small>
                <h2>Today {{ $user->name }} have:</h2>
                @if($todayTask)
                    <p>{{ $todayTask }} tasks</p>
                @endif
                @if($overTask)
                    <p>{{ $overTask }} overdue tasks</p>
                @endif
                @if($teamTask)
                    <p>{{ $user->name }} need complate {{ $teamTask }} task in team</p>
                @endif
                @if($ownerTeamTask)
                    <p>{{ $user->name }} have {{ $ownerTeamTask }} task in team</p>
                @endif
                @if($invite)
                    <p>{{ $invite }} invites in team</p>
                @endif
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
