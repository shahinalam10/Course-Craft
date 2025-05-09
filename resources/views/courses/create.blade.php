@extends('layouts.master')

@section('title', 'Create Course')

@section('content')
<div class="cc-container">
    <div class="cc-card">
        <!-- Card Header -->
      <div class="cc-card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
            <h2 class="cc-card-title m-0">
                <i class="fas fa-plus-circle me-2"></i>Create New Course
            </h2>
            <a href="{{ route('courses.index') }}" class="btn btn-sm btn-outline-light px-4">
                <i class="fas fa-arrow-left me-1"></i> Back
            </a>
        </div>


        <div class="cc-card-body">
            @if(session('success'))
                <div class="cc-alert cc-alert-success">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                </div>
            @endif

            <form id="cc-form" action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf

                <!-- Course Fields -->
                <div class="cc-form-group">
                    <label class="cc-form-label">Course Title</label>
                    <input type="text" name="title" class="cc-form-control" required placeholder="Please provide a course title">
                </div>

                <div class="cc-form-group">
                    <label class="cc-form-label">Feature Video URL</label>
                    <input type="url" name="feature_video" class="cc-form-control" required placeholder="Please provide a valid video URL.">
                </div>

                <div class="cc-form-row">
                    <div class="cc-form-group cc-col">
                        <label class="cc-form-label">Level</label>
                        <select name="level" class="cc-form-control" required>
                            <option value="">--Select Level--</option>
                            <option>Beginner</option>
                            <option>Intermediate</option>
                            <option>Advanced</option>
                        </select>
                    </div>

                    <div class="cc-form-group cc-col">
                        <label class="cc-form-label">Category</label>
                        <select name="category" class="cc-form-control" required>
                            <option value="">--Select Category--</option>
                            <option>Programming</option>
                            <option>Design</option>
                            <option>Marketing</option>
                            <option>Cyber Security</option>
                        </select>
                    </div>
                </div>

                <div class="cc-form-group">
                    <label class="cc-form-label">Course Price</label>
                    <input type="number" name="price" class="cc-form-control" required min="0" placeholder="0.00">
                </div>

                <div class="cc-form-group">
                    <label class="cc-form-label">Course Summary</label>
                    <textarea name="summary" class="cc-form-control" rows="4" required placeholder="Write Summery"></textarea>
                </div>
                
                <div class="cc-form-group">
                    <label class="cc-form-label">Feature Image (jpg/png)</label>
                    <input type="file" name="feature_image" class="cc-form-control" accept="image/jpeg,image/png">
                </div>

                <!-- Module Section -->
                <div class="cc-section-divider"></div>
                <h3 class="cc-section-title"><i class="fas fa-layer-group me-2"></i>Modules</h3>
                <div id="cc-modules-wrapper">
                    <div class="cc-module cc-accordion-item">
                        <div class="cc-accordion-header">
                            <div class="cc-accordion-header-inner">
                                <button class="cc-accordion-button" type="button" data-toggle="cc-accordion" data-target="#cc-module-0">
                                    <strong>Module 1</strong>
                                </button>
                                <button type="button" class="cc-remove-module">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div id="cc-module-0" class="cc-accordion-collapse">
                            <div class="cc-accordion-body">
                                <div class="cc-form-group">
                                    <label class="cc-form-label">Module Title</label>
                                    <input type="text" name="modules[0][title]" class="cc-form-control" required placeholder="Please provide a module title">
                                </div>

                                <!-- Content Section -->
                                <div class="cc-contents-wrapper">
                                    <h4 class="cc-contents-title"><i class="fas fa-list-ul me-2"></i>Contents</h4>
                                    <div class="cc-content-block cc-accordion-item">
                                        <div class="cc-accordion-header">
                                            <div class="cc-accordion-header-inner">
                                                <button class="cc-accordion-button" type="button" data-toggle="cc-accordion" data-target="#cc-content-0-0">
                                                    <strong>Content 1</strong>
                                                </button>
                                                <button type="button" class="cc-remove-content">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div id="cc-content-0-0" class="cc-accordion-collapse">
                                            <div class="cc-accordion-body">
                                                <div class="cc-form-group">
                                                    <label class="cc-form-label">Content Title</label>
                                                    <input type="text" name="modules[0][contents][0][title]" class="cc-form-control" required placeholder="Please provide a content title.">
                                                </div>
                                                <div class="cc-form-group">
                                                    <label class="cc-form-label">Video Source Type</label>
                                                    <select name="modules[0][contents][0][source_type]" class="cc-form-control" required>
                                                        <option value="">--Select Source--</option>
                                                        <option value="YouTube">YouTube</option>
                                                        <option value="Vimeo">Vimeo</option>
                                                        <option value="Upload">Upload</option>
                                                    </select>
                                                </div>
                                                <div class="cc-form-group">
                                                    <label class="cc-form-label">Video URL</label>
                                                    <input type="text" name="modules[0][contents][0][video_url]" class="cc-form-control" required placeholder="Please provide a valid video URL.">
                                                </div>
                                                <div class="cc-form-group">
                                                    <label class="cc-form-label">Video Length</label>
                                                    <input type="text" name="modules[0][contents][0][video_length]" class="cc-form-control" required placeholder="Please provide video length.">                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="cc-btn cc-btn-secondary cc-add-content">
                                        <i class="fas fa-plus me-2"></i>Add Content
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="button" class="cc-btn cc-btn-success" id="cc-add-module">
                    <i class="fas fa-plus me-2"></i>Add Module
                </button>

                <div class="cc-form-actions">
                    <button type="submit" class="cc-btn cc-btn-primary">
                        <i class="fas fa-save me-2"></i>Create Course
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
let ccModuleIndex = 1;
let ccContentIndexes = [1]; // Track content indexes for each module

// Real-time validation function
function ccValidateField(field) {
    if (field.checkValidity()) {
        field.classList.remove('cc-is-invalid');
        field.classList.add('cc-is-valid');
    } else {
        field.classList.remove('cc-is-valid');
        field.classList.add('cc-is-invalid');
    }
}

// Add event listeners for real-time validation
document.addEventListener('input', function(e) {
    if (e.target.matches('.cc-form-control')) {
        ccValidateField(e.target);
    }
});

// Form submission validation
document.getElementById('cc-form').addEventListener('submit', function(e) {
    const form = this;
    if (!form.checkValidity()) {
        e.preventDefault();
        e.stopPropagation();
        
        // Validate all fields
        form.querySelectorAll('.cc-form-control').forEach(field => {
            ccValidateField(field);
        });
        
        // Scroll to first invalid field
        const firstInvalid = form.querySelector('.cc-is-invalid');
        if (firstInvalid) {
            firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    }
    
    form.classList.add('cc-was-validated');
}, false);

// Module and Content Management
document.getElementById('cc-add-module').addEventListener('click', function() {
    const wrapper = document.getElementById('cc-modules-wrapper');
    ccContentIndexes.push(1); // Initialize content counter for new module
    
    const moduleNumber = ccModuleIndex + 1;
    const moduleId = `cc-module-${ccModuleIndex}`;
    
    const moduleDiv = document.createElement('div');
    moduleDiv.classList.add('cc-module', 'cc-accordion-item');
    
    moduleDiv.innerHTML = `
        <div class="cc-accordion-header">
            <div class="cc-accordion-header-inner">
                <button class="cc-accordion-button" type="button" data-toggle="cc-accordion" data-target="#${moduleId}">
                    <strong>Module ${moduleNumber}</strong>
                </button>
                <button type="button" class="cc-remove-module">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div id="${moduleId}" class="cc-accordion-collapse">
            <div class="cc-accordion-body">
                <div class="cc-form-group">
                    <label class="cc-form-label">Module Title</label>
                    <input type="text" name="modules[${ccModuleIndex}][title]" class="cc-form-control" required placeholder="Please provide a module title">    
                </div>
                <div class="cc-contents-wrapper">
                    <h4 class="cc-contents-title"><i class="fas fa-list-ul me-2"></i>Contents</h4>
                    <div class="cc-content-block cc-accordion-item">
                        <div class="cc-accordion-header">
                            <div class="cc-accordion-header-inner">
                                <button class="cc-accordion-button" type="button" data-toggle="cc-accordion" data-target="#cc-content-${ccModuleIndex}-0">
                                    <strong>Content 1</strong>
                                </button>
                                <button type="button" class="cc-remove-content">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div id="cc-content-${ccModuleIndex}-0" class="cc-accordion-collapse">
                            <div class="cc-accordion-body">
                                <div class="cc-form-group">
                                    <label class="cc-form-label">Content Title</label>
                                    <input type="text" name="modules[${ccModuleIndex}][contents][0][title]" class="cc-form-control" required placeholder="Please provide a content title."> 
                                </div>
                                <div class="cc-form-group">
                                    <label class="cc-form-label">Video Source Type</label>
                                    <select name="modules[${ccModuleIndex}][contents][0][source_type]" class="cc-form-control" required>
                                        <option value="">--Select Source--</option>
                                        <option value="YouTube">YouTube</option>
                                        <option value="Vimeo">Vimeo</option>
                                        <option value="Upload">Upload</option>
                                    </select>
                                </div>
                                <div class="cc-form-group">
                                    <label class="cc-form-label">Video URL</label>
                                    <input type="text" name="modules[${ccModuleIndex}][contents][0][video_url]" class="cc-form-control" required placeholder="Please provide a valid video URL.">
                                </div>
                                <div class="cc-form-group">
                                    <label class="cc-form-label">Video Length</label>
                                    <input type="text" name="modules[${ccModuleIndex}][contents][0][video_length]" class="cc-form-control" required placeholder="Please provide video length.">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="cc-btn cc-btn-secondary cc-add-content">
                        <i class="fas fa-plus me-2"></i>Add Content
                    </button>
                </div>
            </div>
        </div>
    `;
    
    wrapper.appendChild(moduleDiv);
    
    // Initialize validation for new fields
    moduleDiv.querySelectorAll('.cc-form-control').forEach(field => {
        field.addEventListener('input', function() {
            ccValidateField(this);
        });
    });
    
    ccModuleIndex++;
});

document.addEventListener('click', function(e) {
    // Module removal
    if (e.target.closest('.cc-remove-module')) {
        const moduleIndexToRemove = Array.from(e.target.closest('.cc-module').querySelectorAll('[name^="modules["]'))[0]
            .name.match(/modules\[(\d+)\]/)[1];
        ccContentIndexes.splice(moduleIndexToRemove, 1);
        e.target.closest('.cc-module').remove();
        
        // Renumber remaining modules
        document.querySelectorAll('.cc-module').forEach((moduleEl, index) => {
            const header = moduleEl.querySelector('.cc-accordion-button');
            header.innerHTML = `<strong>Module ${index + 1}</strong>`;
        });
    }

    // Content removal
    if (e.target.closest('.cc-remove-content')) {
        const contentBlock = e.target.closest('.cc-content-block');
        const moduleKey = contentBlock.id.split('-')[3];
        ccContentIndexes[moduleKey]--;
        contentBlock.remove();
        
        // Renumber remaining contents
        const contentsWrapper = e.target.closest('.cc-contents-wrapper');
        contentsWrapper.querySelectorAll('.cc-content-block').forEach((contentEl, index) => {
            const header = contentEl.querySelector('.cc-accordion-button');
            header.innerHTML = `<strong>Content ${index + 1}</strong>`;
        });
    }

    // Content addition
    if (e.target.closest('.cc-add-content')) {
        const contentsWrapper = e.target.closest('.cc-contents-wrapper');
        const moduleKey = Array.from(contentsWrapper.closest('.cc-module').querySelectorAll('[name^="modules["]'))[0]
            .name.match(/modules\[(\d+)\]/)[1];
        
        const contentCount = contentsWrapper.querySelectorAll('.cc-content-block').length;
        const contentNumber = contentCount + 1;
        const contentId = `cc-content-${moduleKey}-${contentCount}`;
        
        ccContentIndexes[moduleKey]++;
        
        const contentBlock = document.createElement('div');
        contentBlock.classList.add('cc-content-block', 'cc-accordion-item');
        contentBlock.innerHTML = `
            <div class="cc-accordion-header">
                <div class="cc-accordion-header-inner">
                    <button class="cc-accordion-button" type="button" data-toggle="cc-accordion" data-target="#${contentId}">
                        <strong>Content ${contentNumber}</strong>
                    </button>
                    <button type="button" class="cc-remove-content">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div id="${contentId}" class="cc-accordion-collapse">
                <div class="cc-accordion-body">
                    <div class="cc-form-group">
                        <label class="cc-form-label">Content Title</label>
                        <input type="text" name="modules[${moduleKey}][contents][${contentCount}][title]" class="cc-form-control" required placeholder="Please provide a content title.">
                    </div>
                    <div class="cc-form-group">
                        <label class="cc-form-label">Video Source Type</label>
                        <select name="modules[${moduleKey}][contents][${contentCount}][source_type]" class="cc-form-control" required>
                            <option value="">--Select Source--</option>
                            <option value="YouTube">YouTube</option>
                            <option value="Vimeo">Vimeo</option>
                            <option value="Upload">Upload</option>
                        </select>
                    </div>
                    <div class="cc-form-group">
                        <label class="cc-form-label">Video URL</label>
                        <input type="text" name="modules[${moduleKey}][contents][${contentCount}][video_url]" class="cc-form-control" required placeholder="Please provide a valid video URL.">
                    </div>
                    <div class="cc-form-group">
                        <label class="cc-form-label">Video Length</label>
                        <input type="text" name="modules[${moduleKey}][contents][${contentCount}][video_length]" class="cc-form-control" required placeholder="Please provide video length.">
                    </div>
                </div>
            </div>
        `;
        
        contentsWrapper.insertBefore(contentBlock, e.target.closest('.cc-add-content'));
        
        // Initialize validation for new fields
        contentBlock.querySelectorAll('.cc-form-control').forEach(field => {
            field.addEventListener('input', function() {
                ccValidateField(this);
            });
        });
    }

    // Accordion toggle
    if (e.target.closest('[data-toggle="cc-accordion"]')) {
        e.preventDefault();
        const target = e.target.closest('[data-toggle="cc-accordion"]');
        const collapseId = target.getAttribute('data-target');
        const collapseElement = document.querySelector(collapseId);
        
        // Toggle the collapse
        collapseElement.classList.toggle('cc-show');
        target.classList.toggle('cc-collapsed');
    }
});
</script>
@endpush

<style>
    /* Color Variables */
    :root {
        --cc-primary: #4F46E5;
        --cc-primary-hover: #4338CA;
        --cc-secondary: #2d2f33;
        --cc-secondary-hover: #1e2022;
        --cc-success: #28a745;
        --cc-success-hover: #218838;
        --cc-danger: #dc3545;
        --cc-info: #17a2b8;
        --cc-light: #f8f9fa;
        --cc-dark: #343a40;
        --cc-text-dark: #212529;
        --cc-text-light: #6c757d;
        --cc-border-color: #dee2e6;
        --cc-focus-color: rgba(79, 70, 229, 0.25);
    }

    /* Base Styles */
    body {
        font-family: 'Inter', sans-serif;
        color: var(--cc-text-dark);
        background-color: #f5f7fb;
    }
</style>

<!-- Font Awesome for icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">