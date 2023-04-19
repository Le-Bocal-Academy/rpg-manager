@extends('layouts.public')

@section('title', 'S\'inscrire')

@section('content')

    <section>
        <h1>S'inscrire</h1>
        <p>Inscrivez-vous et créez votre premier personnage.</p>

        <form action="{{route('auth.register.process')}}" method="POST">
            
            @csrf

            <div>
                <label for="username">Pseudo</label>
                <input type="text" name="username" id="username" value="{{old('username')}}" required>
            </div>

            <div>
                <label for="firstname">Prénom</label>
                <input type="text" name="firstname" id="firstname" value="{{old('firstname')}}" required>
            </div>

            <div>
                <label for="lastname">Nom</label>
                <input type="text" name="lastname" id="lastname" value="{{old('lastname')}}" required>
            </div>

            <div>
                <label for="email">Adresse e-mail</label>
                <input type="email" name="email" id="email" value="{{old('email')}}" required>
            </div>

            <div>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div>
                <label for="password_confirmation">Confirmation du mot de passe</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>

            <input type="submit" value="C'est parti">
        </form>

        <p>Vous êtes déjà membre ? <a href="{{route('auth.login.show')}}">Connectez-vous</a></p>

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