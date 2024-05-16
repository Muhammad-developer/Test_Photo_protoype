@extends('empty_layout')
@section('content')

    @if(Session::has('danger'))
        <div id="alert" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Ошибка!</strong>
            <span class="block sm:inline">{{ Session::get('danger') }}</span>
            <button class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="closeWarning('alert')">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 20 20">
                    <title>Close</title>
                    <path
                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                </svg>
            </button>
        </div>
    @endif

    @if(Session::has('success'))
        <div class="bg-indigo-900 text-center py-4 lg:px-4">
            <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">Успешно!</span>
                <span class="font-semibold mr-2 text-left flex-auto">{{ Session::get('success') }}</span>
                <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
            </div>
        </div>
    @endif

    <div class="contain-content h-60 rounded border-2 m-4">
        <output id='result' class="flex justify-center "/>
    </div>

    <form action="{{ route('send-photo') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex justify-center">

            <label for='files'
                   class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/>
                </svg>
            <input type="file" name="files[]" id="files" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center" multiple required>
            </label>
            <input type="submit" value="Отправить" class="rounded bg-green-500 ml-3 p-2.5 font-bold cursor-pointer">
        </div>
    </form>
@endsection


<script>
    function closeWarning(id) {
        let item = document.getElementById(id);
        item.remove();
    }
</script>
