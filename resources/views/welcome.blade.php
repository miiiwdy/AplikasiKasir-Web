<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EasyCashier</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
</head>

<body>

    <main>
        <section>
            <div class="field">
                <h1>Welcome!</h1>
                <p style="margin-bottom: 25px">Enter your email and password to login <br>EasyCashier</p>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="email">
                        <h6>Email</h6>
                            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus
                                autocomplete="username" class="inputemail" />
                            <x-input-error :messages="$errors->get('email')" />
                    </div>
                    <div class="password">
                        <h6>Password</h6>
                            <x-text-input id="password" type="password" name="password" required
                                autocomplete="current-password" class="inputpassword"/>
                            <x-input-error :messages="$errors->get('password')" />
                    </div>
                    <div class="tombollogins">
                        <x-primary-button class="loginbutton">
                            {{ __('Login') }}
                        </x-primary-button>
                    </div>
                </form>
                @if (Route::has('register'))
                <span style="display: flex; flex-direction: row; font-size: 15px;">
                    <p>Don’t have an account? <a href="{{ route('register') }}" style="font-weight: 700; background: #17C1E8;background: linear-gradient(to right, #17C1E8 0%, #1784E8 65%);-webkit-background-clip: text;-webkit-text-fill-color: transparent; cursor: pointer">Register</a></p>
                </span>
                @endif
            </div>
        </section>
        <aside>
            <img src="{{ asset('assets/img/dashboardpageimg.png') }}" alt="asideimg">
        </aside>
    </main>
</body>

<style>
    * {
        margin: 0;
        font-family: 'Open Sans', sans-serif;
    }

    html,
    body {
        width: 100%;
        height: 100%;
        margin: 0;
        overflow: hidden;
    }

    /* main */
    main {
        display: flex;
        width: 100%;
        height: 100vh;
    }

    /* sectionfield */
    section {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin-left: 20%
    }

    .field {
        width: 55%;
        height: auto;
        justify-content: center;
    }
    .field h1 {
        font-weight: 700;
        font-size: 40px;
        background: #17C1E8;
        background: linear-gradient(to right, #17C1E8 0%, #1784E8 65%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .field p {
        color: #67748E;
    }
    .field h6 {
        color: #293c5b;
        font-size: 14px
    }
    .inputemail, .inputpassword {
        padding: 11px;
        border-radius: 8px;
        border: 1.6px solid rgb(202, 214, 227);
        width: 75%;
        background-color: transparent;
        margin-bottom: 15px;
    }
    .loginbutton {
        cursor: pointer;
        margin-top: 15px;
        margin-bottom: 10px;
        width: 82%;
        padding: 12px;
        border-radius: 8px;
        border: none;
        color: white;
        font-weight: 600;
        background: rgb(23,193,232);
        background: linear-gradient(90deg, rgba(23,193,232,1) 10%, rgba(23,132,232,1) 100%);
    }

    /* aside */
    aside {
        position: relative;
        width: 30%;
        height: 100vh;
    }

    aside img {
        position: absolute;
        top: 0;
        right: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>

</html>
