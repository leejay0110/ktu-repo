@extends('layouts.app')



@section('content')

    <div class="bg-white rounded border shadow-sm p-4">

        <h2>{{ env('APP_NAME') }}</h2>
        <p>
            Hello and welcome to KTU Repo. <br>
            The digital repository of Koforidua Technical University.
        </p>

        <a href="{{ route('about') }}">Read more</a>

    </div>

    <br>

    <div class="row row-cols-1 row-cols-lg-2 text-center">

        <div class="col mb-4">
            <div class="bg-white rounded border shadow-sm p-4">
                <img src="{{ asset('img/paper.jpg') }}" class="rounded-circle">
                <a href="{{ route('papers.index') }}" class="d-block h6 mt-3 mb-1">Past Examination Papers</a>
                <span>Download PDFs of past examination papers.</span>
            </div>
        </div>

        <div class="col mb-4">
            <div class="bg-white rounded border shadow-sm p-4">
                <img src="{{ asset('img/material.jpg') }}" class="rounded-circle">
                <a href="{{ route('materials.index') }}" class="d-block h6 mt-3 mb-1">Course Materials</a>
                <span>Download Course Materials.</span>
            </div>
        </div>

    </div> 


@endsection