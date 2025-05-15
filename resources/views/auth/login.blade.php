<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('img/l-favicon.png') }}" type="image/png">    <!-- Bootstrap CSS -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">
    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/fonts/line-icons.css') }}">
    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/morris/morris.css') }}">
    <!-- Main Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/main.css') }}">
    <!-- Responsive Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/responsive.css') }}">

</head>
<style>
    .login-form-input{
        width: 25%;
    }
    @media (max-width: 800px) {

        .login-form-input{
            width: 90%;
        }
    }
</style>
<body>
    <x-form method="POST" action="{{ route('login') }}" style="width: 100vw; height: 100vh;display: flex; flex-direction: column; align-items: center; justify-content: center;">
        @csrf
        <img class="mb-4" src="{{ asset('img/logo1.png') }}" alt="" width="200px">
        <x-form-group class="login-form-input">
            <x-form-label for="exampleInputUsername">@lang('Username')</x-form-label>
            <x-form-input name="username" id="exampleInputUsername" placeholder="Username" :value="old('username')"></x-form-input>
            <x-form-input-error name="username"></x-form-input-error>
        </x-form-group>
        <x-form-group class="login-form-input">
            <x-form-label for="exampleInputPassword">@lang('Password')</x-form-label>
            <x-form-input name="password" id="exampleInputPassword" placeholder="Password" :value="old('password')"></x-form-input>
            <x-form-input-error name="password"></x-form-input-error>
            <p>@lang('Forgot your password?')<a href="mailto:majd@kheder.me"> @lang('contact technical support')</a> (demo link)</p>
        </x-form-group>
        <x-form-group class="login-form-input">
            <x-form-button class="w-100">@lang('submit')</x-form-button>
        </x-form-group>
    </x-form>
</body>
