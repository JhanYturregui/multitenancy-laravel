<x-tenancy-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Tareas
    </h2>
  </x-slot>
  <x-container class="py-12">
    <div class="card">
      <div class="card-body">
        <div class="mb-4">
          <x-input-label>Nombre:</x-input-label>
          <x-text-input 
            type="text"
            name="name"
            class="w-full mt-2"
            placeholder="Escriba un nombre"
            value="{{ $task->name }}"
            readonly>
          </x-text-input>
          <x-input-error :messages="$errors->first('name')" />
        </div>
        <div class="mb-4">
          <x-input-label>Descripción:</x-input-label>
          <textarea
            name="description"
            class="w-full form-control mt-2"
            placeholder="Ingrese una descripción">
            {{ $task->description }}
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
        <div class="mb-4">
          <img src="{{ route('file', $task->image_url) }}" alt="" />
        </div>
        <div class="flex justify-end">
          <a
            href="{{ route('tasks.index') }}"
            class="btn btn-blue">Regresar</a>
        </div>
      </div>
    </div>
  </x-container>  
</x-tenancy-layout>