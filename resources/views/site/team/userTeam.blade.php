@if(!$team)
    <p>U don`t have created teams</p>
    <button class="btn btn-block btn-main" id="openCreateTeamButton">Create team</button>
@else
    <div class="teamItem">
        <div class="color" style="background:{{$team['color']}};"></div>
        <h4>Name: <strong>{{ $team['name'] }}</strong></h4>
        <p>Members count: <strong>{{ $team['member_count'] }}</strong></p>
        <p>Description: {{ $team['description'] }}</p>
        <a href="/t/{{ $team['id'] }}" class="go"></a>
    </div>
@endif