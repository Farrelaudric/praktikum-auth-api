<p>Role login: {{ Auth::user()->role }}</p>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Tambah Produk
        </h2>
    </x-slot>

    <div class="p-6">
        <p>Form tambah produk (Admin saja)</p>
    </div>
</x-app-layout>
