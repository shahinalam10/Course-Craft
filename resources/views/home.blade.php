@extends('layouts.master')

@section('title', 'Home')

@section('content')
 <section class="course-craft-hero">
        <div class="course-craft-hero-overlay"></div>
        <div class="course-craft-bubbles">
            <div class="course-craft-bubble"></div>
            <div class="course-craft-bubble"></div>
            <div class="course-craft-bubble"></div>
            <div class="course-craft-bubble"></div>
            <div class="course-craft-bubble"></div>
            <div class="course-craft-bubble"></div>
            <div class="course-craft-bubble"></div>
            <div class="course-craft-bubble"></div>
        </div>
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="course-craft-hero-content">
                        <h1 class="course-craft-title">Build Professional Courses with Ease</h1>
                        <p class="course-craft-subtitle">Course Craft empowers educators to create, organize, and deliver stunning learning experiences with our intuitive platform.</p>
                        <div class="course-craft-btn-container">
                            <a href="{{route('courses.index')}}" class="btn btn-course-craft btn-course-craft-primary me-2">
                               Course Details
                            </a>
                            <a href="{{route('courses.create')}}" class="btn btn-course-craft btn-course-craft-secondary">
                                Create New Course
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
