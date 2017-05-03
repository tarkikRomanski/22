@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="wrapContent row">
            <div class="col-md-4">
                <div class="row wrapBar">
                    {{ Html::image('/img/'. Auth::user()->image . '.png', Auth::user()->name, ['class'=>'avatar center-block']) }}
                    <div class="col-12">
                        <h3>{{ Auth::user()->name }}</h3>
                        <button class="btn btn-block btn-default" id="showDailyStatistic">Show Daily Statistic</button>
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
                    <nav id="imgNav" class="imgNav">
                        <div class="row">
                            <div data-target="team" class="col-2 navItem">
                                {{ Html::image('img/member.png', 'Teams') }}
                                <strong>Teams</strong>
                            </div>

                            <div data-target="event" class="col-2 navItem">
                                {{ Html::image('img/file.png', 'Events') }}
                                <strong>Events</strong>
                            </div>
                        </div>
                    </nav>

                    <div id="mainContentBlock">
                        <div class="loader">Loading...</div>
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
