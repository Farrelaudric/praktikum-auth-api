<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Products
        </h2>
    </x-slot>

    <div class="p-6">
        @if(Auth::user()->role === 'admin')
            <a href="{{ route('products.create') }}"
               style="padding:10px;background:blue;color:white;">
                Tambah Produk
            </a>
        @else
            <p style="color:gray;">
                Anda tidak memiliki akses untuk menambah produk
            </p>
        @endif
    </div>
</x-app-layout>
