<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verify Email</title>

    {{-- Memuat file CSS yang di-compile oleh Vite --}}
    @vite('resources/css/app.css')
</head>

<body class="bg-[#f7f6f2] font-sans">

    <main class="min-h-screen flex items-center justify-center py-12 px-4">
        <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8 md:p-10 text-center">

            <h2 class="text-3xl font-bold text-[#3b5440] mb-4">
                Verifikasi Alamat Email Anda
            </h2>

            {{-- Pesan sukses jika email berhasil dikirim ulang --}}
            @if (session('resent'))
            <div class="bg-green-100 border border-green-200 text-green-800 rounded-lg p-4 my-6" role="alert">
                Link verifikasi baru telah dikirimkan ke alamat email Anda.
            </div>
            @endif

            <p class="text-gray-600 mb-6">
                Sebelum melanjutkan, silakan cek email verifikasi di inbox atau spam Anda untuk menemukan link verifikasi. Email telah dikirim ke <strong class="text-gray-800">{{ Auth::user()->email }}</strong>.
            </p>

            <p class="text-gray-600 mb-8">
                Jika Anda tidak menerima email, klik tombol di bawah untuk mengirim ulang.
            </p>

            <div class="space-y-4">
                {{-- Form untuk mengirim ulang email verifikasi --}}
                <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="w-full bg-[#3b5440] hover:bg-white hover:text-[#3b5440] hover:outline-2 text-white font-bold py-3 px-6 rounded-full hover:bg-opacity-90 transition-all cursor-pointer text-lg">
                        Kirim Email Verifikasi
                    </button>
                </form>


                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-gray-500 hover:text-gray-700 hover:underline font-medium">
                        Kembali ke HomePage
                    </button>
                </form>
            </div>
        </div>
    </main>

</body>

</html>