@extends('layouts.app')
@section('content')

<div class="grid col-span-full">
    <h1 class="max-w-2xl mb-4 text-4xl leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">
        Статусы </h1>
    @auth()
    <div>
        @csrf
        <a href="{{ route('task_statuses.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Создать статус            </a>
    </div>
    @endauth
    <table class="mt-4">
        <thead class="border-b-2 border-solid border-black text-left" style="text-align: left">
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Дата создания</th>
            @auth()
            <th>Действия</th>
            @endauth
        </tr>
        </thead>
        <tbody>
        @foreach($taskStatuses as $taskStatus)
        <tr class="border-b border-dashed text-left">
            <td>{{ $taskStatus->id }}</td>
            <td>{{$taskStatus->name}}</td>
            <td>{{ $taskStatus->created_at }}</td>
            @auth()
            <td>
                <form style="display: inline-block" action="{{ route('task_statuses.destroy', $taskStatus) }}" method="POST">
                @method('DELETE')
                @csrf
                    <button type="submit" class="text-red-600 hover:text-red-900">Удалить</button>
                </form>
                <a class="text-blue-600 hover:text-blue-900"
                   href="{{ route("task_statuses.edit", $taskStatus) }}"
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
    {{ $taskStatuses->links('pagination::simple-bootstrap-5') }}
@endauth
@endsection
