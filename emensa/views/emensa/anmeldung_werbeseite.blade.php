@extends('werbeseite.layout_werbeseite')

@section('title')
    Anmeldung
@endsection

@section('main')
    <strong>{{$_SESSION['login_result_message']}}</strong>
    <form method="post" action="/verifizierung">
        <label>E-Mail</label><br>
        <input type="email" name="email"><br>
        <label>Passwort</label><br>
        <input type="password" name="password"><br>
        <input type="submit" value="Anmeldung" name="submit">
    </form>
@endsection