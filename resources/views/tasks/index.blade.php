@php
    use App\Helpers\TaskStatusHelper;
    use App\Helpers\UserHelper;
@endphp
@extends('layouts.app')
@section('content')

    <div class="grid col-span-full">
        <h1 class="max-w-2xl mb-4 text-4xl leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">
            {{ __('layout.task_header') }} </h1>
        @auth()
            <div>
                @csrf
                <a href="{{ route('tasks.create') }}"
                   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    {{ __('layout.create_button') }}           </a>
            </div>
        @endauth
        <table class="mt-4">
            <thead class="border-b-2 border-solid border-black text-left" style="text-align: left">
            <tr>
                <th>{{ __('layout.table_id') }}</th>
                <th>{{ __('layout.table_task_status') }}</th>
                <th>{{ __('layout.table_name') }}</th>
                <th>{{ __('layout.table_creater') }}</th>
                <th>{{ __('layout.table_assigned') }}</th>
                <th>{{ __('layout.table_date_of_creation') }}</th>
                @auth()
                    <th>{{ __('layout.table_actions') }}</th>
                @endauth
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr class="border-b border-dashed text-left">
                    <td>{{ $task->id }}</td>
                    <td>{{ TaskStatusHelper::getNameStatus($task->status_id) }}</td>
                    <td><a href="{{ route('tasks.show', $task) }}">{{ $task->name }}</a></td>
                    <td>{{ UserHelper::getNameUser($task->created_by_id) }}</td>
                    <td>{{ UserHelper::getNameUser($task->assigned_to_id) }}</td>
                    <td>{{ $task->created_at }}</td>
                    @auth()
                        <td>
                            @if(Auth::id() === $task->created_by_id)
                            <a
                                class="text-red-600 hover:text-red-900"
                                rel="nofollow"
                                data-method="delete"
                                data-confirm="{{ __('layout.table_delete_question') }}"
                                href="{{ route('tasks.destroy', $task) }}"
                            >
                                {{ __('layout.table_delete') }}
                            </a>
                            @endif
                            <a class="text-blue-600 hover:text-blue-900"
                               href="{{ route("tasks.edit", $task) }}"
                            >
                                {{ __('layout.table_edit') }}
                            </a>
                        </td>
                    @endauth
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @auth()
        <div class="mt-4 grid col-span-full">{{ $tasks->links() }}</div>
    @endauth
@endsection
