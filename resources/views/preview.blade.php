@extends('empty_layout')
@section('content')
    <div class="flex justify-center m-10">

        <div class="container rounded border-2">

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 p-2">
                @foreach ($url as $file)
                    <div class="grid gap-4">
                        <div>
                            <a href="{{ $file }}">
                                <img class="h-auto max-w-full rounded-lg" src="{{ $file }}" alt="">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
