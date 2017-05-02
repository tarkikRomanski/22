@if(!$teams)
    <p>U are not part of the aqueous team</p>
@else
    @if(isset($invite))
        <h3>U invites</h3>
    @endif
    @foreach($teams as $team)
        <div class="teamItem">
            <div class="color" style="background:{{$team->color}};"></div>
            <h4>Name: <strong>{{ $team->name }}</strong></h4>
            <p>Description: {{ $team->description }}</p>
            <a href="/t/{{ $team->id }}" class="go"></a>
            @if(isset($invite))
                <a href="team/confirm/{{ $team->member_id }}" class="confirmInvite"></a>
            @endif
        </div>
    @endforeach
@endif