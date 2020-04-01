@extends('layouts.app')


@section('content')

    <h1 class="display-4 text-center mb-5">{{ env('APP_NAME') }}</h4>
    <p class="text-center">
        Welcome to {{ env('APP_NAME') }}. You can read more about the site from <a href="{{ route('about.index') }}">here.</a>
    </p>

    <div class="d-flex flex-column flex-lg-row justify-content-around text-center mt-5">

        <div class="mb-5">
            <img src="{{ asset('img/paper.jpg') }}" class="img img-thumbnail rounded-circle"> <br><br>
            <a href="{{ route('papers.index') }}" class="h5">Past Exam Papers</a>
            <p>Downloadable PDFs of past examination papers.</p>
        </div>

        <div>
            <img src="{{ asset('img/material.jpg') }}" class="img img-thumbnail rounded-circle"> <br><br>
            <a href="{{ route('materials.index') }}" class="h5">Course Materials</a>
            <p>Downloadable Course Materials.</p>
        </div>

    </div>        


@endsection