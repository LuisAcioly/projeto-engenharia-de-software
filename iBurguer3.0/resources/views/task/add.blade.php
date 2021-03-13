<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Novo pedido') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- start -->
                    <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="mt-5 md:mt-0 md:col-span-2">
                        <form action="{{ route('task.store') }}" method="POST">
                        @csrf
                            <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                <fieldset>
                                    <div>
                                        <legend class="text-base font-medium text-gray-900">Hamburguer</legend>
                                    </div>
                                    <div class="mt-4 space-y-4">
                                        @foreach($burguers as $burguer)
                                            <div class="flex items-center">
                                                <input id="{{$burguer->name}}" name="burguer" type="radio" value="{{$burguer->name}}" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" required>
                                                <label for="{{$burguer->name}}" class="ml-3 block text-sm font-medium text-gray-700">
                                                    {{$burguer->name}}
                                                </label>
                                                <p class="text-sm text-gray-500 ml-2"> | {{$burguer->blend}}, {{$burguer->additional}}, {{$burguer->salad}}, {{$burguer->sauce}}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div>
                                        <legend class="text-base font-medium text-gray-900">Bebida</legend>
                                    </div>
                                    <div class="mt-4 space-y-4">
                                        @foreach($drinks as $drink)
                                            <div class="flex items-center">
                                                <input id="{{$drink->name}}" name="drink" type="radio" value="{{$drink->name}}" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" required>
                                                <label for="{{$drink->name}}" class="ml-3 block text-sm font-medium text-gray-700">
                                                    {{$drink->name}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </fieldset>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                    Realizar pedido
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