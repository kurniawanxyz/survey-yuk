<form action="{{ route('forgot-password') }}" method="POST">
    @csrf
    <label for="email">Masukkan Email Anda</label>
    <input type="email" name="email" id="email" value="{{ old('email') }}">
    @error('email')
        <p style="color:red">{{ $message }}</p>
    @enderror
    <button type="submit">Check</button>
</form>
