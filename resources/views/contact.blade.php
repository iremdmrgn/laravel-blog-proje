<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            İletişim Formu
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                {{-- Başarılı mesaj --}}
                @if(session('success'))
                    <div class="bg-green-200 text-green-800 p-4 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Hata mesajları --}}
                @if ($errors->any())
                    <div class="bg-red-200 text-red-800 p-4 rounded mb-4">
                        <ul class="list-disc ml-4">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium">Ad Soyad</label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                               class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">E-posta</label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                               class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Konu</label>
                        <input type="text" name="subject" value="{{ old('subject') }}" required
                               class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Mesaj</label>
                        <textarea name="message" rows="5" required
                                  class="w-full border rounded px-3 py-2">{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                        Gönder
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
