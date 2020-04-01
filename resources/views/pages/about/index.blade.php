@extends('layouts.app')


@section('content')
    
    <h1 class="display-4 text-center mb-5">About KTU Repo</h1>



    <p>
        {{ env('APP_NAME') }} is the institutional repository of Koforidua Technical University.
        {{ env('APP_NAME') }} is an open-access electronic archive for the collection, preservation and distribution of digital materials.
    </p>

    <p>
        The platform was developed by <a href="{{ route('about.developers') }}">four students</a> from the computer science department;
        three networking students and one computer science student.
        The system was built as a final year project work.
    </p>

    <br><br>


    <h5>Why {{ env('APP_NAME') }} was developed</h5>

    <br>

    {{-- <ul>
        <li>{{ env('APP_NAME') }} was developed to assist lecturers in distributing their course materials.</li>
        <li>To help students get easy access to course materials.</li>
        <li>To help students get access to past exam papers</li>
        <li>And to help build an acrhive for the university ar large</li>
    </ul> --}}

    <dl class="row">

        <dt class="col-lg-3">Efficient Distribution</dt>
        <dd class="col-lg-9">
            <p>One reason why we developed this platform was to help make distribution of resources an easier process. With this platform, lecturers or course representatives can easily upload course materials unto the platform without any difficulties.</p>
        </dd>

        <dt class="col-lg-3">Easy Access</dt>
        <dd class="col-lg-9">
            <p>Easy access is anthoer resaon for developing this platform. Users which in most cases are students can access course materials on the platform without any limitation. The platform is an open-access platform; students can download course materials without the need for creating an account.</p>
            
            <p>Also, the platform has a section for downloading past exam papers which is very important to students mostly during exam periods. Students can download the past exam papers so far as they have been uploaded unto the platform by other users.</p>
        </dd>
        <dt class="col-lg-3">Online Repository</dt>
        <dd class="col-lg-9">
            <p>Another reason why this platform was developed was to create an online repository for the university at large. We wanted to help create an archive of digital resources for the university; a single point where users will seek when looking for digital resources like course materils and past exam papers</p>
        </dd>

    </dl>

    {{-- <p>
        <abbr title="Koforidua Technical University Course Materials">KTUCM</abbr> is basically a platform for sharing files.
        The main aim for the development of this platform was to build an archive of course related materials
        which will help students connect easily with course materials and also to help them in their academics.
    </p>

    <p>
        <abbr title="Koforidua Technical University Course Materials">KTUCM</abbr> was developed by a group of four, as a final year project in the year 2020.
        The group consisted of three Computer Network Management students and one Computer Science student.
    </p>

    <p>Most at times students of the university find difficulties in getting access to course materials due to several reasons:</p>
    <ul>
        <li>The lecturer or class representative may not be able to send the course materials to each and everyone or group.</li>
        <li>Students may not be participants of the group for sharing course materials.</li>
        <li>Sometimes, there is a limitation in the total number of people per group.</li>
        <li>Unavailability of the course materials due to deletion or loss</li>
    </ul>

    <p>
        With KTUCM, Students can always visit the platform to search through the archives and download a copy of their course related materials without any restrictions.
        And, students do not have to be part of any group in order to receive course materials.
    </p> --}}


@endsection