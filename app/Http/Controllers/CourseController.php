<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Module;
use App\Models\Content;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $courses = Course::when($search, fn($q) => $q->where('title', 'like', "%$search%"))
            ->latest()
            ->paginate(10);

        return view('courses.index', compact('courses', 'search'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'feature_video' => 'required|url',
            'level' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
            'summary' => 'required',
            'feature_image' => 'nullable|image|mimes:jpg,jpeg,png|max:8048',
            'modules' => 'array',
            'modules.*.title' => 'required|string',
            'modules.*.contents.*.title' => 'required|string',
            'modules.*.contents.*.source_type' => 'required|string',
            'modules.*.contents.*.video_url' => 'required|url',
            'modules.*.contents.*.video_length' => 'required|string',
        ]);

        // File upload
        $featureImagePath = null;
        if ($request->hasFile('feature_image')) {
            $featureImagePath = $request->file('feature_image')->store('courses', 'public');
        }

        $course = Course::create([
            'title' => $request->title,
            'feature_video' => $request->feature_video,
            'level' => $request->level,
            'category' => $request->category,
            'price' => $request->price,
            'summary' => $request->summary,
            'feature_image' => $featureImagePath, // Assign the path here
        ]);

        foreach ($request->modules ?? [] as $moduleData) {
            $module = $course->modules()->create([
                'title' => $moduleData['title']
            ]);

            if (!empty($moduleData['contents'])) {
                foreach ($moduleData['contents'] as $contentData) {
                    $module->contents()->create([
                        'title' => $contentData['title'],
                        'source_type' => $contentData['source_type'],
                        'video_url' => $contentData['video_url'],
                        'video_length' => $contentData['video_length'],
                    ]);
                }
            }
        }

        return redirect()->route('courses.create')->with('success', 'Course with modules and contents created successfully!');
    }
        public function show(Course $course)
    {
        $course->load('modules.contents');
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        $course->load('modules.contents');
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required',
            'feature_video' => 'required|url',
            'level' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
            'summary' => 'required',
            'feature_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('feature_image')) {
            $path = $request->file('feature_image')->store('courses', 'public');
            $course->feature_image = $path;
        }

        $course->update($request->only([
            'title', 'feature_video', 'level', 'category', 'price', 'summary'
        ]));

        $course->save();

        return redirect()->route('courses.index')->with('success', 'Course updated successfully!');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted.');
    }
}
