@extends('admin.layout.user')

@section('content')
<form action="{{ route('forgot-password-reset') }}" method="post">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="hidden" name="email" value="{{ $email }}">

    <label for="password">Password baru Anda</label>
    <input type="password" name="password" id="password">
    @error('password')
        <p style="color:red">{{ $message }}</p>
    @enderror

    <label for="confirmation_password">Konformasi Password</label>
    <input type="password" name="confirmation_password" id="confirmation_password">
    @error('confirmation_password')
        <p style="color:red">{{ $message }}</p>
    @enderror

    <button type="submit">Ganti Password</button>
</form>
@endsection
