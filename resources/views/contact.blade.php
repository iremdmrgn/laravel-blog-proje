<x-app-layout>
    <x-slot name="header">
        <h2>İletişim Formu</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white shadow p-6 rounded">

                @if(session('success'))
                    <div class="bg-green-200 text-green-800 p-4 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="bg-red-200 text-red-800 p-4 rounded mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="Ad Soyad" value="{{ old('name') }}" class="w-full border rounded p-2 mb-2">
                    <input type="email" name="email" placeholder="E-posta" value="{{ old('email') }}" class="w-full border rounded p-2 mb-2">
                    <input type="text" name="subject" placeholder="Konu" value="{{ old('subject') }}" class="w-full border rounded p-2 mb-2">
                    <textarea name="message" placeholder="Mesajınız" class="w-full border rounded p-2 mb-2">{{ old('message') }}</textarea>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Gönder</button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
