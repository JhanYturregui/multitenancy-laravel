<x-tenancy-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Tareas
    </h2>
  </x-slot>
  <x-container class="py-12">
    <div class="flex justify-end">
      <a 
        href="{{ route('tasks.create') }}"
        class="btn btn-blue"
        id="btnNew">
        Nuevo
      </a>
    </div>

    <div class="relative overflow-x-auto mt-4">
      <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                  <th scope="col" class="px-6 py-3">
                      ID
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Nombre
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Descripción
                  </th>
                  <th scope="col" class="px-6 py-3" colspan="3">
                      Acciones
                  </th>
              </tr>
          </thead>
          <tbody>
              @foreach($tasks as $task)
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      {{ $task->id }}
                  </th>
                  <td class="px-6 py-4">
                    {{ $task->name ?? '' }}
                  </td>
                  <td class="px-6 py-4">
                    {{ $task->description ?? '' }}
                  </td>
                  <td class="px-6 py-4">
                    <div class="flex justify-center">
                      <a href="{{ route('tasks.show', $task) }}" class="btn btn-blue mr-2">Ver</a>
                      <a href="{{ route('tasks.edit', $task) }}" class="btn btn-green mr-2">Editar</a>
                      <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-red mr-2">Eliminar</button>
                      </form>
                    </div>
                  </td>
              </tr>
              @endforeach()
          </tbody>
      </table>
    </div>
    <script src="{{ asset('../js/task.js') }}"></script>
  </x-container>
</x-tenancy-layout>