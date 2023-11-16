<x-tenancy-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Tareas
    </h2>
  </x-slot>
  <x-container class="py-12">
    <form action="{{ route('tasks.update', $task) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="card">
        <div class="card-body">
          <div class="mb-4">
            <x-input-label>Nombre:</x-input-label>
            <x-text-input 
              type="text"
              name="name"
              class="w-full mt-2"
              placeholder="Escriba un nombre"
              value="{{ old('name', $task->name) }}">
            </x-text-input>
            <x-input-error :messages="$errors->first('name')" />
          </div>
          <div class="mb-4">
            <x-input-label>Descripción:</x-input-label>
            <textarea
              name="description"
              class="w-full form-control mt-2"
              placeholder="Ingrese una descripción">
              {{ old('description', $task->description) }}
            </textarea>
            <x-input-error :messages="$errors->first('description')" />
          </div>
          <div class="mb-4">
            <x-input-label>Imagen:</x-input-label>
            <input
              type="file"
              name="image_url"
              class="mt-2" />
          </div>
          <div class="flex justify-end">
            <button
              class="btn btn-blue">Actualizar</button>
          </div>
        </div>
      </div>
    </form>
  </x-container>
</x-tenancy-layout>