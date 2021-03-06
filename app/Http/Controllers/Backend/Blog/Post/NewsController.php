<?php

namespace App\Http\Controllers\Backend\Blog\Post;

use App\Http\Controllers\Controller;
use App\Models\Blog\Category;
use App\Models\Blog\News;
use App\Models\Blog\Tags;
use App\Models\District;
use App\Models\Division;
use App\Models\Upazila;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $news = News::with('category')->latest()->get();
        // return $news;
        return view('backend.blogs.news.news_list', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();

        $divissions = Division::all();
        // return $divission;
        $districts = District::all();
        // return $district;
        $upzillas = Upazila::all();

        $tags = Tags::all();
        // return $upzilla;
        $news = News::latest()->get();
        // return  $tags;
        return view('backend.blogs.news.create_news', compact('news', 'divissions', 'districts', 'upzillas', 'categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request->all();
        $request->validate([
            'title'                 => 'required',
            'content'               => 'required',
            'meta_title'            => 'required',
            'blog_meta_description' => 'required',
            'thumbnail'             => 'required',
        ], [
            ' title.required'                => 'please enter your title',
            'content.required'               => 'please enter your content',
            'meta_title.required'            => 'please enter your meta_title',
            ' slug.required'                 => 'please enter your slug',
            'blog_meta_description.required' => 'please enter your blog_meta_description',
            ' video_url.required'            => 'please enter your video_url',
            ' tags.required'                 => 'please enter your tags',
            'status.required'                => 'please enter your status',
            ' thumbnail.required'            => 'please enter your thumbnail',
            ' category_id.required'          => 'please enter your category_id',
            ' division_id.required'          => 'please enter your division_id',
            'district_id.required'           => 'please enter your district_id',
            'upzilla_id.required'            => 'please enter your upzilla_id'
        ]);


        if ($request->hasFile('thumbnail')) {

            $name = $request->thumbnail->getClientOriginalName();
            $request->thumbnail->storeAs('images', $name, 'public');

            News::create([
                'title'                 => $request->title,
                'content'               => $request->content,
                'meta_title'            => $request->meta_title,
                'slug'                  => SlugService::createSlug(News::class, 'slug', $request->title, ['unique' => true]),
                'blog_meta_description' => $request->blog_meta_description,
                'video_url'             => $request->video_url,
                'tags'                  => $request->tags,
                'thumbnail'             => $name,
                'category_id'           => $request->category_id,
                'division_id'           => $request->division_id,
                'district_id'           => $request->district_id,
                'upzilla_id'            => $request->upzilla_id,
            ]);
            return redirect()->route('news.index')->with('success', 'successfully data added');
        } else {
            News::create([
                'title'                 => $request->title,
                'content'               => $request->content,
                'meta_title'            => $request->meta_title,
                'slug'                  => SlugService::createSlug(News::class, 'slug', $request->title, ['unique' => true]),
                'blog_meta_description' => $request->blog_meta_description,
                'video_url'             => $request->video_url,
                'tags'                  => $request->tags,
                'status'                => $request->status,
                'category_id'           => $request->category_id,
                'division_id'           => $request->division_id,
                'district_id'           => $request->district_id,
                'upzilla_id'            => $request->upzilla_id,
            ]);
            return redirect()->route('brand.index')->with('success', 'successfully data added');
        }
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();

        $divissions = Division::all();
        // return $divission;
        $districts = District::all();
        // return $district;
        $upzillas = Upazila::all();
        $news = News::firstWhere('id', $id);

        // return $news;

        return view('backend.blogs.news.news_edit', compact('news', 'categories', 'divissions', 'districts', 'upzillas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if ($request->hasFile('thumbnail')) {
            $name = $request->thumbnail->getClientOriginalName();
            $request->thumbnail->storeAs('images', $name, 'public');

            News::findOrFail($id)->update([
                'title'                 => $request->title,
                'content'               => $request->content,
                'meta_title'            => $request->meta_title,
                'slug'                  => SlugService::createSlug(News::class, 'slug', $request->title, ['unique' => true]),
                'blog_meta_description' => $request->blog_meta_description,
                'video_url'             => $request->video_url,
                'tags'                  => $request->tags,
                'status'                => $request->status,
                'thumbnail'             => $name,
                'category_id'           => $request->category_id,
                'division_id'           => $request->division_id,
                'district_id'           => $request->district_id,
                'upzilla_id'            => $request->upzilla_id,
            ]);
            return redirect()->route('news.index')->with('success', 'successfully data added');
        } else {
            News::findOrFail($id)->update([

                'title'                 => $request->title,
                'content'               => $request->content,
                'meta_title'            => $request->meta_title,
                'slug'                  => SlugService::createSlug(News::class, 'slug', $request->title, ['unique' => true]),
                'blog_meta_description' => $request->blog_meta_description,
                'video_url'             => $request->video_url,
                'tags'                  => $request->tags,
                'status'                => $request->status,
                'category_id'           => $request->category_id,
                'division_id'           => $request->division_id,
                'district_id'           => $request->district_id,
                'upzilla_id'            => $request->upzilla_id,

            ]);
            return redirect()->route('news.index')->with('success', 'successfully data added');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        News::findOrFail($id)->delete();
        return redirect()->back()->with('delete', 'Successfully Data delete');
    }
}
