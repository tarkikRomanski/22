<div class="modal-header">
    <h5 class="modal-title">Daily statistic</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <h1>Hello, {{ Auth::user()->name }}</h1>
    <small>{{ \Carbon\Carbon::today()->toDateString() }}</small>
    <h2>Today U have:</h2>
    @if($todayTask)
        <p>{{ $todayTask }} tasks</p>
    @endif
    @if($overTask)
        <p>{{ $overTask }} overdue tasks</p>
    @endif
    @if($teamTask)
        <p>U need complate {{ $teamTask }} task in team</p>
    @endif
    @if($ownerTeamTask)
        <p>U have {{ $ownerTeamTask }} task in team</p>
    @endif
    @if($invite)
        <p>{{ $invite }} invites in team</p>
    @endif
    <h3>Successful work!</h3>
    <div class="col-12" style="text-align: center;">
        <img src="/img/giphy11.gif">
    </div>
</div>

{{ Form::close() }}
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>