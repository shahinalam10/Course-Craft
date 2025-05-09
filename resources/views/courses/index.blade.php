@extends('layouts.master')

@section('title', 'Course List')

@section('content')
        <div class="course-list-container">
            <div class="course-list-card">
            <div class="cl-header-container">
            <div class="cl-header">
                <!-- Home Link -->
                <a href="{{ url('/') }}" class="cl-home-link">
                    <i class="fas fa-home me-2"></i>Home
                </a>
                
                <!-- Title -->
                <h2 class="cl-title">
                    <i class="fas fa-book-open me-2"></i>Course Management
                </h2>
                
                <!-- Add Course Button -->
                <a href="{{ route('courses.create') }}" class="cl-add-btn">
                    <i class="fas fa-plus-circle me-2"></i>Add New Course
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="course-list-alert alert-success">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            </div>
        @endif

        <div class="course-list-search-container">
            <form method="GET" class="course-list-search-form">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input type="text" name="search" value="{{ $search }}" placeholder="Search courses..." class="form-control course-list-search-input">
                    <button type="submit" class="btn btn-course-list-search">
                        <i class="fas fa-filter me-2"></i>Filter
                    </button>
                </div>
            </form>
        </div>

        <div class="course-list-table-container">
            <div class="table-responsive">
                <table class="table course-list-table">
                    <thead class="course-list-table-header">
                        <tr>
                            <th><i class="fas fa-book me-2"></i>Title</th>
                            <th><i class="fas fa-layer-group me-2"></i>Level</th>
                            <th><i class="fas fa-tag me-2"></i>Category</th>
                            <th><i class="fa-solid fa-bangladeshi-taka-sign me-2"></i>Price</th>
                            <th><i class="fas fa-cogs me-2"></i>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($courses as $course)
                        <tr class="course-list-table-row">
                            <td data-label="Title">{{ $course->title }}</td>
                            <td data-label="Level"><span class="course-list-badge level-{{ strtolower($course->level) }}">{{ $course->level }}</span></td>
                            <td data-label="Category">{{ $course->category }}</td>
                            <td data-label="Price"><i class="fa-solid fa-bangladeshi-taka-sign"></i> {{ number_format($course->price, 2) }}</td>
                            <td data-label="Actions" class="course-list-actions">
                                <a href="{{ route('courses.show', $course) }}" class="btn btn-course-list-action btn-view" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('courses.edit', $course) }}" class="btn btn-course-list-action btn-edit" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('courses.destroy', $course) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this course?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-course-list-action btn-delete" title="Delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr class="course-list-table-empty">
                            <td colspan="5">
                                <div class="text-center py-4">
                                    <i class="fas fa-book-open fa-2x mb-3" style="color: #6B7280;"></i>
                                    <h5>No courses found</h5>
                                    <p class="text-muted">Create your first course by clicking "Add New Course"</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            @if($courses->hasPages())
            <div class="course-list-pagination">
                <nav aria-label="Course pagination">
                    <ul class="pagination justify-content-center">
                        {{-- Previous Page Link --}}
                        @if($courses->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link"><i class="fas fa-chevron-left"></i></span>
                            </li>
                        @else
                            <li class="page-item">
                                <a href="{{ $courses->previousPageUrl() }}" class="page-link" rel="prev">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach($courses->links()->elements[0] as $page => $url)
                            @if($page == $courses->currentPage())
                                <li class="page-item active" aria-current="page">
                                    <span class="page-link">{{ $page }}</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if($courses->hasMorePages())
                            <li class="page-item">
                                <a href="{{ $courses->nextPageUrl() }}" class="page-link" rel="next">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link"><i class="fas fa-chevron-right"></i></span>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
            @endif
        </div>
    </div>
</div>

<style>
    /* Color variables matching homepage */
    :root {
        --primary-color: #4F46E5;
        --primary-hover: #4338CA;
        --secondary-color: #7C3AED;
        --accent-color: #10B981;
        --text-dark: #1F2937;
        --text-light: #6B7280;
        --light-bg: #F9FAFB;
        --card-bg: #FFFFFF;
        --card-border: #E5E7EB;
        --hover-bg: #F3F4F6;
    }
</style>

<!-- Include Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection