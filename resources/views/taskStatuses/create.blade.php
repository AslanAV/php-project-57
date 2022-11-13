@extends('layouts.app')
@section('content')

@auth()
    <div class="grid col-span-full">
        <h1 class="max-w-2xl mb-4 text-4xl leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">Создать статус</h1>

        <form method="POST" action="{{ route('task_statuses.store') }}" accept-charset="UTF-8" class="w-50">
            @csrf
            <div class="flex flex-col">
                <div>
                    <label for="name">Имя</label>
                </div>
                <div class="mt-2">
                    <input class="rounded border-gray-300 w-1/3" name="name" type="text" id="name">
                </div>
                @includeWhen($errors->any() ,'layouts.errors-validation')
                <div class="mt-2">
                    <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit" value="Создать">
                </div>
            </div>
        </form>
    </div>
@endauth

@endsection
