@extends('layouts.public')

@section('title', 'Se connecter')

@section('content')

    <section>
        <h1>Se connecter</h1>
        <p>Connectez-vous pour accéder à vos personnages.</p>

        <form action="{{route('auth.login.process')}}" method="POST">
            
            @csrf

            <div>
                <label for="email">Adresse e-mail</label>
                <input type="email" name="email" id="email" value="{{old('email')}}" required>
            </div>

            <div>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" required>
            </div>

            <input type="submit" value="C'est parti">
        </form>

        <p>Vous n'êtes pas encore membre ? <a href="{{route('auth.register.show')}}">Inscrivez-vous</a></p>

        @if($errors->any())
            <div class="errors">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </section>
@endsection