@extends('layouts.app')


@section('content')


    <div class="bg-white rounded-lg shadow-sm p-4 p-lg-5 mx-auto mb-5" style="">
    
        <h1>{{ env('APP_NAME') }}</h1>
        <p>
            Welcome to KTU Repo. <br>
            The digital archive of Koforidua Technical University.
        </p>

        <a href="{{ route('about') }}" class="font-weight-bold">Read more</a>

    </div>


    <div class="row row-cols-1 row-cols-lg-2 text-center">

        <div class="col mb-5">
            <div class="bg-white rounded-lg shadow-sm p-4 p-lg-5">
                <img src="{{ asset('img/paper.jpg') }}" class="rounded-circle">
                <a href="{{ route('papers.index') }}" class="d-block h5 font-weight-bold mt-3 mb-1">Past Exam Papers</a>
                <span>PDFs of past examination papers.</span>
            </div>
        </div>

        <div class="col mb-5">
            <div class="bg-white rounded-lg shadow-sm p-4 p-lg-5">
                <img src="{{ asset('img/material.jpg') }}" class="rounded-circle">
                <a href="{{ route('materials.index') }}" class="d-block h5 font-weight-bold mt-3 mb-1">Course Materials</a>
                <span>Downloadable Course Materials.</span>
            </div>
        </div>

    </div> 


@endsection