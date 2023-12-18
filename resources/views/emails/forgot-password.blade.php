<p>Hallo {{ $data->user->nama }} <br> Anda telah mengirim konfirmasi Lupa Password, berikut adalah link untuk Lupa Password Anda:</p>
<a href="{{ route('forgot-password-mail', ['token' => $data->token, 'email' => $data->user->email]) }}">{{ route('forgot-password', $data->token, $data->user->email) }}</a>
<p>Jika bukan Anda yang mengirim maka Anda bisa abaikan email ini</p>
