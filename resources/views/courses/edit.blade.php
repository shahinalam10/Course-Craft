@extends('layouts.master')

@section('title', 'Edit Course')

@section('content')
<div class="ce-container">
    <div class="ce-card">
        <!-- Card Header -->
        <div class="ce-card-header">
            <h2 class="ce-card-title">
                <i class="fas fa-edit me-2"></i>Edit Course: {{ $course->title }}
            </h2>
        </div>

        <div class="ce-card-body">
            @if(session('success'))
                <div class="ce-alert ce-alert-success">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                </div>
            @endif

            <form action="{{ route('courses.update', $course) }}" method="POST" enctype="multipart/form-data" class="ce-form" novalidate>
                @csrf
                @method('PUT')

                <!-- Course Fields -->
                <div class="ce-form-group">
                    <label class="ce-form-label">Course Title</label>
                    <input type="text" name="title" class="ce-form-control" required value="{{ old('title', $course->title) }}">
                    <div class="ce-invalid-feedback">Title is required.</div>
                </div>

                <div class="ce-form-group">
                    <label class="ce-form-label">Feature Video URL</label>
                    <input type="url" name="feature_video" class="ce-form-control" required value="{{ old('feature_video', $course->feature_video) }}">
                    <div class="ce-invalid-feedback">Valid video URL is required.</div>
                </div>

                <div class="ce-form-row">
                    <div class="ce-form-group ce-col">
                        <label class="ce-form-label">Level</label>
                        <select name="level" class="ce-form-control" required>
                            <option value="">--Select Level--</option>
                            @foreach(['Beginner','Intermediate','Advanced'] as $level)
                                <option value="{{ $level }}" {{ $course->level === $level ? 'selected' : '' }}>{{ $level }}</option>
                            @endforeach
                        </select>
                        <div class="ce-invalid-feedback">Please select level.</div>
                    </div>

                    <div class="ce-form-group ce-col">
                        <label class="ce-form-label">Category</label>
                        <select name="category" class="ce-form-control" required>
                            <option value="">--Select Category--</option>
                            @foreach(['Programming','Design','Marketing'] as $cat)
                                <option value="{{ $cat }}" {{ $course->category === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                            @endforeach
                        </select>
                        <div class="ce-invalid-feedback">Please select category.</div>
                    </div>
                </div>

                <div class="ce-form-group">
                    <label class="ce-form-label">Course Price</label>
                    <input type="number" name="price" class="ce-form-control" required value="{{ old('price', $course->price) }}">
                    <div class="ce-invalid-feedback">Price is required.</div>
                </div>

                <div class="ce-form-group">
                    <label class="ce-form-label">Course Summary</label>
                    <textarea name="summary" class="ce-form-control" rows="4" required>{{ old('summary', $course->summary) }}</textarea>
                    <div class="ce-invalid-feedback">Summary is required.</div>
                </div>

                <div class="ce-form-group">
                    <label class="ce-form-label">Feature Image (optional)</label>
                    <input type="file" name="feature_image" class="ce-form-control" accept="image/*">
                    <div class="ce-invalid-feedback">Must be an image file.</div>
                    @if($course->feature_image)
                        <div class="ce-image-preview mt-2">
                            <img src="{{ asset('storage/'.$course->feature_image) }}" alt="Current Image" class="ce-thumbnail">
                            <a href="#" class="ce-remove-image" data-id="{{ $course->id }}">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                    @endif
                </div>

                <div class="ce-form-actions">
                    <button type="submit" class="ce-btn ce-btn-primary">
                        <i class="fas fa-save me-2"></i>Update Course
                    </button>
                    <a href="{{ route('courses.index') }}" class="ce-btn ce-btn-secondary">
                        <i class="fas fa-times me-2"></i>Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
(function () {
    'use strict';
    const forms = document.querySelectorAll('.ce-form');
    Array.from(forms).forEach(function (form) {
        form.addEventListener('submit', function (e) {
            if (!form.checkValidity()) {
                e.preventDefault();
                e.stopPropagation();
            }
            form.classList.add('ce-was-validated');
        }, false);
    });
    
    // Image removal handler
    document.querySelectorAll('.ce-remove-image').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            if(confirm('Are you sure you want to remove this image?')) {
                // Implement image removal logic here
                console.log('Remove image for course:', this.dataset.id);
            }
        });
    });
})();
</script>
@endpush

<style>
    /* Color Variables */
    :root {
        --ce-primary: #4F46E5;
        --ce-primary-hover: #4338CA;
        --ce-secondary: #6c757d;
        --ce-accent: #10B981;
        --ce-danger: #dc3545;
        --ce-text-dark: #212529;
        --ce-text-light: #6c757d;
        --ce-light-bg: #f8f9fa;
        --ce-card-bg: #ffffff;
        --ce-card-border: #e9ecef;
        --ce-border-color: #ced4da;
        --ce-focus-color: rgba(79, 70, 229, 0.25);
    }

    /* Base Styles */
    body {
        font-family: 'Inter', sans-serif;
        color: var(--ce-text-dark);
        background-color: var(--ce-light-bg);
    }

    /* Main Container */
    .ce-container {
        padding: 2rem;
        max-width: 1200px;
        margin: 0 auto;
    }

    /* Card Styles */
    .ce-card {
        background: var(--ce-card-bg);
        border-radius: 0.5rem;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        overflow: hidden;
        border: 1px solid var(--ce-card-border);
    }

    /* Card Header */
    .ce-card-header {
        background: var(--ce-primary);
        padding: 1.25rem 1.5rem;
        color: white;
    }

    .ce-card-title {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 600;
        display: flex;
        align-items: center;
    }

    /* Card Body */
    .ce-card-body {
        padding: 1.5rem;
    }

    /* Alert Styles */
    .ce-alert {
        padding: 0.75rem 1.25rem;
        border-radius: 0.25rem;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
    }

    .ce-alert-success {
        background-color: #d1e7dd;
        color: #0f5132;
        border-left: 4px solid var(--ce-accent);
    }

    /* Form Styles */
    .ce-form {
        width: 100%;
    }

    .ce-form-group {
        margin-bottom: 1.25rem;
    }

    .ce-form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: var(--ce-text-dark);
    }

    .ce-form-control {
        display: block;
        width: 100%;
        padding: 0.5rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: var(--ce-text-dark);
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid var(--ce-border-color);
        border-radius: 0.25rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .ce-form-control:focus {
        color: var(--ce-text-dark);
        background-color: #fff;
        border-color: var(--ce-primary);
        outline: 0;
        box-shadow: 0 0 0 0.25rem var(--ce-focus-color);
    }

    .ce-form-control.is-invalid,
    .ce-was-validated .ce-form-control:invalid {
        border-color: var(--ce-danger);
    }

    .ce-form-control.is-invalid:focus,
    .ce-was-validated .ce-form-control:invalid:focus {
        border-color: var(--ce-danger);
        box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25);
    }

    .ce-invalid-feedback {
        width: 100%;
        margin-top: 0.25rem;
        font-size: 0.875rem;
        color: var(--ce-danger);
    }

    /* Form Row */
    .ce-form-row {
        display: flex;
        flex-wrap: wrap;
        margin-right: -0.75rem;
        margin-left: -0.75rem;
    }

    .ce-col {
        flex: 1 0 0%;
        padding-right: 0.75rem;
        padding-left: 0.75rem;
    }

    /* Image Preview */
    .ce-image-preview {
        position: relative;
        display: inline-block;
    }

    .ce-thumbnail {
        height: 150px;
        width: auto;
        border-radius: 0.25rem;
        border: 1px solid var(--ce-border-color);
    }

    .ce-remove-image {
        position: absolute;
        top: 0.5rem;
        right: 0.5rem;
        width: 1.5rem;
        height: 1.5rem;
        background: var(--ce-danger);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
    }

    /* Form Actions */
    .ce-form-actions {
        display: flex;
        gap: 0.75rem;
        margin-top: 2rem;
    }

    /* Button Styles */
    .ce-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 500;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        user-select: none;
        border: 1px solid transparent;
        padding: 0.5rem 1rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        transition: all 0.15s ease-in-out;
        cursor: pointer;
    }

    .ce-btn-primary {
        color: #fff;
        background-color: var(--ce-primary);
        border-color: var(--ce-primary);
    }

    .ce-btn-primary:hover {
        background-color: var(--ce-primary-hover);
        border-color: var(--ce-primary-hover);
    }

    .ce-btn-secondary {
        color: #fff;
        background-color: var(--ce-secondary);
        border-color: var(--ce-secondary);
    }

    .ce-btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .ce-container {
            padding: 1rem;
        }
        
        .ce-card-header,
        .ce-card-body {
            padding: 1.25rem;
        }
        
        .ce-form-row {
            flex-direction: column;
        }
        
        .ce-col {
            padding: 0;
        }
        
        .ce-form-group.ce-col {
            margin-bottom: 1rem;
        }
        
        .ce-form-group.ce-col:last-child {
            margin-bottom: 0;
        }
    }

    @media (max-width: 576px) {
        .ce-card-title {
            font-size: 1.25rem;
        }
        
        .ce-form-actions {
            flex-direction: column;
        }
        
        .ce-btn {
            width: 100%;
        }
    }
</style>

<!-- Font Awesome for icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">