<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Novo Hamburguer') }}
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
                            <x-validation-errors class="mb-4" :errors="$errors" />
                            
                            <form action="{{ route('burguer.store') }}" method="POST">
                            @csrf
                                <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                                            <input type="text" name="name" id="name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="blend" class="block text-sm font-medium text-gray-700">Hamburguer</label>
                                            <input type="text" name="blend" id="blend" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="additional" class="block text-sm font-medium text-gray-700">Adicional</label>
                                            <input type="text" name="additional" id="additional" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="salad" class="block text-sm font-medium text-gray-700">Salada</label>
                                            <input type="text" name="salad" id="salad" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="sauce" class="block text-sm font-medium text-gray-700">Molho</label>
                                            <input type="text" name="sauce" id="sauce" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Cadastrar
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