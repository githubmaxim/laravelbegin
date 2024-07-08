<p> My index </p>
@foreach($users2 as $user)
    <span> {{$user->id}}. {{$user->name}} - {{$user->email}} </span><br>
@endforeach
