<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Inquilinos
    </h2>
  </x-slot>

  <x-container>
    <div class="card">
      <div class="card-body">
        <form action="{{ route('tenants.update', $tenant) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-4">
            <x-input-label>Nombre</x-input-label>
            <x-text-input name="id" value="{{ old('id', $tenant->id) }}" placeholder="Ingre el nombre" class="w-full mt-2"></x-text-input>
            <x-input-error :messages="$errors->first('id')" />
          </div>
          <div class="flex justify-end">
            <button class="btn btn-blue">Actualizar</button>
          </div>
        </form>
      </div>
    </div>
  </x-container>
</x-app-layout>