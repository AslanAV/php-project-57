@extends('layouts.app')
@section('content')

<div class="grid col-span-full">
    <h1 class="max-w-2xl mb-4 text-4xl leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">
        Метки </h1>
    @auth()
    <div>
        @csrf
        <a href="{{ route('labels.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Создать метку            </a>
    </div>
    @endauth
    <table class="mt-4">
        <thead class="border-b-2 border-solid border-black text-left" style="text-align: left">
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Описание</th>
            <th>Дата создания</th>
            @auth()
            <th>Действия</th>
            @endauth
        </tr>
        </thead>
        <tbody>
        @foreach($labels as $label)
        <tr class="border-b border-dashed text-left">
            <td>{{ $label->id }}</td>
            <td>{{ $label->name }}</td>
            <td>{{ $label->description }}</td>
            <td>{{ $label->created_at }}</td>
            @auth()
            <td>
                <a
                    class="text-red-600 hover:text-red-900"
                    rel="nofollow"
                    data-method="delete"
                    data-confirm="Вы уверены?"
                    href="{{ route('labels.destroy', $label) }}"
                >
                    Удалить
                </a>
                <a class="text-blue-600 hover:text-blue-900"
                   href="{{ route("labels.edit", $label) }}"
                >
                    Изменить
                </a>
            </td>
            @endauth
        </tr>
            @endforeach
        </tbody>
    </table>
</div>
@auth()
    {{ $labels->links('pagination::simple-bootstrap-5') }}
@endauth
@endsection
