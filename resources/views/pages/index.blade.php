@extends('layouts.app')


@section('header')
    
    <div class="jumbotron jumbotron-fluid bg-white border-bottom p-4 mb-0">

        <div class="container">

            <h2>{{ env('APP_NAME') }}</h2>
            <p>
                Welcome to KTU Repo. <br>
                The digital repository of Koforidua Technical University.
            </p>

            <a href="{{ route('about') }}" class="h6">Read more</a>

        </div>

    </div>

@endsection


@section('content')


    <div class="row row-cols-1 row-cols-lg-2 text-center">

        <div class="col mb-5">
            <div class="bg-white rounded border p-4 p-lg-5">
                <img src="{{ asset('img/paper.jpg') }}" class="rounded-circle">
                <a href="{{ route('papers.index') }}" class="d-block h5 mt-3 mb-1">Past Examination Papers</a>
                <span>Download PDFs of past examination papers.</span>
            </div>
        </div>

        <div class="col mb-5">
            <div class="bg-white rounded border p-4 p-lg-5">
                <img src="{{ asset('img/material.jpg') }}" class="rounded-circle">
                <a href="{{ route('materials.index') }}" class="d-block h5 mt-3 mb-1">Course Materials</a>
                <span>Download Course Materials.</span>
            </div>
        </div>

    </div> 


@endsection