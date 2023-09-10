<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Inquilinos
    </h2>
  </x-slot>

  <x-container>
    <div class="card p-4">
      <div class="car-body">
        <div class="flex justify-end mb-6">
          <a href="{{ route('tenants.create') }}" class="btn btn-blue">
            Nuevo
          </a>
        </div>
        
        
        <div class="relative overflow-x-auto">
          <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                      <th scope="col" class="px-6 py-3">
                          ID
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Dominio
                      </th>
                      <th scope="col" class="px-6 py-3" colspan="2">
                          Acciones
                      </th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($tenants as $tenant)
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                          {{ $tenant->id }}
                      </th>
                      <td class="px-6 py-4">
                        {{ $tenant->domains->first()->domain ?? '' }}
                      </td>
                      <td class="px-6 py-4">
                        <div class="flex justify-center">
                          <a href="{{ route('tenants.edit', $tenant) }}" class="btn btn-green mr-2">Editar</a>
                          <form action="{{ route('tenants.destroy', $tenant) }}" method="POST">
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
      </div>
    </div>

  </x-container>
</x-app-layout>