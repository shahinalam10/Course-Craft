@extends('layouts.master')

@section('title', 'Course Details')

@section('content')
<div class="cd-container">
    <div class="cd-card">
        <!-- Card Header -->
        <div class="cd-card-header">
            <h2 class="cd-card-title">
                <i class="fas fa-book-open me-2"></i>Course Details
            </h2>
        </div>

        <!-- Course Content -->
        <div class="cd-content">
            <!-- Back Button -->
            <div class="cd-back">
                <a href="{{ route('courses.index') }}" class="cd-back-btn">
                    <i class="fas fa-arrow-left me-2"></i>Back to Courses
                </a>
            </div>

            <!-- Course Info -->
            <div class="cd-info">
                <h1 class="cd-title">{{ $course->title }}</h1>
                <div class="cd-meta">
                    <span class="cd-badge cd-level-{{ strtolower($course->level) }}">{{ $course->level }}</span>
                    <span class="cd-meta-item"><i class="fas fa-tag me-1"></i>{{ $course->category }}</span>
                    <span class="cd-meta-item"><i class="fa-solid fa-bangladeshi-taka-sign me-1"></i>{{ number_format($course->price, 2) }}</span>
                </div>

                <!-- Image and Summary in one line -->
                <div class="cd-img-summary">
                    @if($course->feature_image)
                    <div class="cd-img-container">
                        <img src="{{ asset('storage/' . $course->feature_image) }}" alt="{{ $course->title }}" class="cd-img">
                    </div>
                    @endif
                    
                    <div class="cd-summary">
                        <h3 class="cd-summary-title"><i class="fas fa-info-circle me-2"></i>Summary</h3>
                        <p>{{ $course->summary }}</p>
                    </div>
                </div>
            </div>

            <!-- Modules Section as Accordion -->
            <div class="cd-modules">
                <h3 class="cd-modules-title"><i class="fas fa-layer-group me-2"></i>Course Modules</h3>
                
                <div class="accordion" id="modulesAccordion">
                    @foreach($course->modules as $module)
                    <div class="accordion-item cd-module-card">
                        <h2 class="accordion-header" id="moduleHeading{{ $loop->index }}">
                            <button class="accordion-button collapsed cd-module-header" type="button" 
                                    data-bs-toggle="collapse" 
                                    data-bs-target="#moduleCollapse{{ $loop->index }}" 
                                    aria-expanded="false" 
                                    aria-controls="moduleCollapse{{ $loop->index }}">
                                <div class="d-flex justify-content-between w-100 align-items-center">
                                    <div>
                                        <i class="fas fa-book me-2"></i>{{ $module->title }}
                                    </div>
                                    <span class="cd-module-count">{{ count($module->contents) }} items</span>
                                </div>
                            </button>
                        </h2>
                        <div id="moduleCollapse{{ $loop->index }}" 
                             class="accordion-collapse collapse" 
                             aria-labelledby="moduleHeading{{ $loop->index }}" 
                             data-bs-parent="#modulesAccordion">
                            <div class="accordion-body p-0">
                                <div class="cd-contents-list">
                                    @foreach($module->contents as $content)
                                    <div class="cd-content-item">
                                        <div class="cd-content-icon">
                                            @if($content->source_type == 'video')
                                                <i class="fas fa-play-circle"></i>
                                            @elseif($content->source_type == 'document')
                                                <i class="fas fa-file-alt"></i>
                                            @elseif($content->source_type == 'quiz')
                                                <i class="fas fa-question-circle"></i>
                                            @else
                                                <i class="fas fa-link"></i>
                                            @endif
                                        </div>
                                        <div class="cd-content-details">
                                            <h5 class="cd-content-title">{{ $content->title }}</h5>
                                            <div class="cd-content-meta">
                                                <span class="cd-content-type">{{ ucfirst($content->source_type) }}</span>
                                                @if($content->video_length)
                                                <span class="cd-content-duration">
                                                    <i class="fas fa-clock me-1"></i>{{ $content->video_length }}
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Color Variables */
    :root {
        --cd-primary: #4F46E5;
        --cd-primary-hover: #4338CA;
        --cd-secondary: #7C3AED;
        --cd-accent: #10B981;
        --cd-text-dark: #1F2937;
        --cd-text-light: #6B7280;
        --cd-light-bg: #F9FAFB;
        --cd-card-bg: #FFFFFF;
        --cd-card-border: #E5E7EB;
        --cd-hover-bg: #F3F4F6;
    }

    /* Base Styles */
    body {
        font-family: 'Inter', sans-serif;
        color: var(--cd-text-dark);
        line-height: 1.6;
        background-color: var(--cd-light-bg);
    }

    /* Accordion Custom Styles */
    .cd-module-card {
        border: 1px solid var(--cd-card-border);
        border-radius: 8px !important;
        margin-bottom: 0.75rem;
        overflow: hidden;
    }

    .cd-module-card:not(:last-child) {
        margin-bottom: 0.75rem;
    }

    .cd-module-header {
        background-color: var(--cd-light-bg);
        color: var(--cd-text-dark);
        font-weight: 500;
        padding: 1rem 1.25rem;
        border: none;
        box-shadow: none;
    }

    .cd-module-header:not(.collapsed) {
        background-color: var(--cd-light-bg);
        color: var(--cd-primary);
    }

    .cd-module-header::after {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%231F2937'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
        transition: transform 0.2s ease-in-out;
    }

    .cd-module-header:not(.collapsed)::after {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%234F46E5'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
    }

    .cd-module-count {
        font-size: 0.8rem;
        background: var(--cd-card-bg);
        padding: 0.25rem 0.5rem;
        border-radius: 50px;
        color: var(--cd-text-light);
    }

    /* Content Items */
    .cd-contents-list {
        padding: 0;
        margin: 0;
        list-style: none;
    }

    .cd-content-item {
        padding: 0.75rem 1.25rem;
        display: flex;
        gap: 1rem;
        align-items: center;
        transition: background 0.2s;
        border-bottom: 1px solid var(--cd-card-border);
    }

    .cd-content-item:last-child {
        border-bottom: none;
    }

    .cd-content-item:hover {
        background: var(--cd-hover-bg);
    }

    .cd-content-icon {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: var(--cd-light-bg);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--cd-primary);
        flex-shrink: 0;
    }

    .cd-content-details {
        flex-grow: 1;
    }

    .cd-content-title {
        font-size: 0.95rem;
        margin: 0 0 0.2rem;
        font-weight: 500;
    }

    .cd-content-meta {
        display: flex;
        gap: 1rem;
        font-size: 0.8rem;
        color: var(--cd-text-light);
    }

    /* Rest of your existing styles... */
</style>

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Font Awesome for icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Manrope:wght@500;600;700&display=swap" rel="stylesheet">
@endsection