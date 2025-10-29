<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{

    public function index()
    {
        // در ادمین همه (draft/published) را ببین
        $blogs = Blog::latest()->paginate(10);
        return view('Admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        $categories = BlogCategory::all();
        return view('Admin.blogs.create', compact('categories'));
    }

    /** فقط کسی که blog-publish دارد یا real Admin است، می‌تواند منتشر کند */
    private function userCanPublish(): bool
    {
        $u = auth()->user();
        if (!$u) return false;

        // اگر واقعاً blog-publish ندادی، یکی از این‌ها را فعال نگه دار:
        return
            // 1) اگر پرمیشن "blog-publish" داری:
            $u->hasPermissionTo('blog-publish')
            // 2) یا اگر گفتی فقط blog-show دادی و همین کافی‌ست:
            || $u->hasPermissionTo('blog-show')
            // 3) یا اگر نقشِ real Admin داشتی و می‌خوای نقش کفایت کنه:
            || $u->roles()->where('name', 'real Admin')->exists();
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'title'               => 'required|array',
            'title.fa'            => 'required|string|max:255',
            'title.en'            => 'required|string|max:255',
            'slug'                => 'nullable|string|max:255|unique:blogs,slug',
            'short_description'   => 'nullable|array',
            'content'             => 'nullable|array',
            'image'               => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'status'              => 'nullable|in:draft,published',
            'published_at'        => 'nullable|date',
            'categories'          => 'nullable|array',
            'categories.*'        => 'exists:blog_categories,id',
        ]);

        // اسلاگ
        if (empty($data['slug'])) {
            $base = $data['title']['en'] ?? $data['title']['fa'] ?? Str::random(6);
            $slug = Str::slug($base) ?: 'post-'.Str::random(6);
            $unique = $slug; $i = 1;
            while (Blog::where('slug', $unique)->exists()) { $unique = $slug.'-'.$i++; }
            $data['slug'] = $unique;
        }

        // آپلود تصویر
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        // اعمال منطق انتشار
        if ($this->userCanPublish() && ($data['status'] ?? 'draft') === 'published') {
            $data['status'] = 'published';
            $data['published_at'] = $data['published_at'] ?? now();
        } else {
            $data['status'] = 'draft';
            $data['published_at'] = null;
        }

        $data['user_id'] = auth()->id();

        $blog = Blog::create($data);

        // دسته‌بندی‌ها
        if (!empty($data['categories'])) {
            $blog->categories()->sync($data['categories']);
        }

        return redirect()->route('blogs.index')->with('success', 'مقاله با موفقیت ایجاد شد.');
    }

    public function show(string $id)
    {
        // اگر نمایش تکی ادمین می‌خواهی بعداً تکمیل کن
        abort(404);
    }

    public function edit(Blog $blog)
    {
        $categories = BlogCategory::all();
        return view('Admin.blogs.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, Blog $blog)
    {
       $data = $request->validate([
            'title'               => 'required|array',
            'title.fa'            => 'required|string|max:255',
            'title.en'            => 'required|string|max:255',
            'slug'                => 'nullable|string|max:255|unique:blogs,slug,'.$blog->id,
            'short_description'   => 'nullable|array',
            'content'             => 'nullable|array',
            'image'               => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'status'              => 'nullable|in:draft,published',
            'published_at'        => 'nullable|date',
            'categories'          => 'nullable|array',
            'categories.*'        => 'exists:blog_categories,id',
        ]);

        // اسلاگ خالی => بساز
        if (array_key_exists('slug', $data) && empty($data['slug'])) {
            $base = $data['title']['en'] ?? $data['title']['fa'] ?? Str::random(6);
            $slug = Str::slug($base) ?: 'post-'.Str::random(6);
            $unique = $slug; $i = 1;
            while (Blog::where('slug', $unique)->where('id','!=',$blog->id)->exists()) { $unique = $slug.'-'.$i++; }
            $data['slug'] = $unique;
        }

        // تصویر جدید؟
        if ($request->hasFile('image')) {
            if ($blog->image) Storage::disk('public')->delete($blog->image);
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        // فقط ناشرِ مجاز می‌تواند منتشر کند؛ بقیه همیشه draft
        if ($this->userCanPublish()) {
            if (($data['status'] ?? $blog->status) === 'published') {
                $data['status'] = 'published';
                $data['published_at'] = $data['published_at'] ?? ($blog->published_at ?? now());
            } else {
                $data['status'] = 'draft';
                $data['published_at'] = null;
            }
        } else {
            $data['status'] = 'draft';
            $data['published_at'] = null;
        }
        $blog->update($data);

        if (isset($data['categories'])) {
            $blog->categories()->sync($data['categories']);
        }

        return redirect()->route('blogs.index')->with('success', 'مقاله بروزرسانی شد.');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }
        $blog->categories()->detach();
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'حذف شد.');
    }
}
