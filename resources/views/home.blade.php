@extends('empty_layout')
@section('content')

    <div class="relative overflow-x-auto mt-10 ml-20 mr-20">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Уникальное название изображение
                </th>
                <th scope="col" class="px-6 py-3">
                    Дата загрузки
                </th>
                <th scope="col" class="px-6 py-3">
                    Действие
                    <a type="submit"
                       class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4"
                       href="{{ route('preview') }}">Preview</a>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($model as $items)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $items->file_name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $items->created_at }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('download', $items->file_name) }}">
                            <button
                                class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800 cursor-pointer">

                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-download" viewBox="0 0 16 16">
                                    <path
                                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                                    <path
                                        d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
                                </svg>
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
