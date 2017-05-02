@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="wrapContent row">
            <div class="col-md-4">
                <div class="row wrapBar">
                    {{ Html::image('/img/'. Auth::user()->image . '.png', Auth::user()->name, ['class'=>'avatar center-block']) }}
                    <div class="col-12">
                        <h3>{{ Auth::user()->name }}</h3>
                        <p>Email: <strong>{{ Auth::user()->email }}</strong></p>
                        <p>
                            Sex:
                            <strong>
                                {{ Html::image('/img/'.(Auth::user()->sex==0?'male':'female').'.png') }}
                            </strong></p>
                    </div>
                    <div class="col-12">
                        <div id="todoListBlock"><div class="loader">Loading...</div></div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mainBlock">
                <main>
                    <nav class="imgNav">
                        <div class="row">
                            <div class="col-2 navItem activeItem">
                                {{ Html::image('img/member.png', 'Teams') }}
                                <strong>Teams</strong>
                            </div>
                        </div>
                    </nav>

                    <div id="mainContentBlock">
                        <h2>U created teams</h2>
                        <div id="createdTeamsBlock" class="mb-3">
                            <div class="loader">Loading...</div>
                        </div>
                        <h2>U team</h2>
                        <div id="inviteBlock"></div>
                        <div id="userTeamBlock">
                            <div class="loader">Loading...</div>
                        </div>
                    </div>
                </main>
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
