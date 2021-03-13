<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pedido') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- start -->
                    <div class="hidden sm:block" aria-hidden="true">
                        <div class="py-5">
                            <div class="border-t border-gray-200"></div>
                        </div>
                    </div>

                    <div class="mt-10 sm:mt-0">
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <x-success-message />       
                                <form action="{{ route('edit.task') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $task->id }}" name="id">
                                    <div class="shadow overflow-hidden sm:rounded-md">
                                        <div class="px-4 py-5 bg-white sm:p-6">
                                            <div class="grid grid-cols-6 gap-6">
                                                <div class="col-span-6 sm:col-span-4">
                                                    <label for="usermail" class="block text-sm font-medium text-gray-700">Email</label>
                                                    <input type="text" name="usermail" value="{{$task->usermail}}" id="usermail" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" readonly="true">
                                                </div>
                                                
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="burguer" class="block text-sm font-medium text-gray-700">Hamburguer</label>
                                                    <input type="text" name="burguer" id="burguer" value="{{$task->burguer}}" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" readonly="true">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="drink" class="block text-sm font-medium text-gray-700">Bebida</label>
                                                    <input type="text" name="drink" id="drink" value="{{$task->drink}}" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" readonly="true">
                                                </div>
                                                
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                                    <select id="status" name="status" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                        @if($task->status == 'Entregue')
                                                            <option selected>Entregue</option>
                                                            <option>Lido</option>
                                                            <option>Saiu para entrega</option>
                                                            <option>Finalizado</option>
                                                        @endif
                                                        @if($task->status == 'Lido')
                                                            <option>Entregue</option>
                                                            <option selected>Lido</option>
                                                            <option>Saiu para entrega</option>
                                                            <option>Finalizado</option>
                                                        @endif
                                                        @if($task->status == 'Saiu para entrega')
                                                            <option>Entregue</option>
                                                            <option>Lido</option>
                                                            <option selected>Saiu para entrega</option>
                                                            <option>Finalizado</option>
                                                        @endif
                                                        @if($task->status == 'Finalizado')
                                                            <option>Entregue</option>
                                                            <option>Lido</option>
                                                            <option>Saiu para entrega</option>
                                                            <option selected>Finalizado</option>
                                                        @endif
                                                    </select>
                                                </div>               
                                            </div>
                                        </div>
                                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Atualizar pedido
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>