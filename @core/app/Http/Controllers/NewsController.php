<?php

namespace App\Http\Controllers;

use App\Actions\SlugChecker;
use App\News;
use App\Language;
use App\Events;
use App\Http\Requests\SlugCheckRequest;
use App\Helpers\SanitizeInput;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_news = News::all()->groupBy('lang');
        return view('backend.pages.news.index')->with([
            'all_news' => $all_news
        ]);
    }

    public function new_news()
    {
        $all_language = Language::all();
        return view('backend.pages.news.new')->with([
            'all_languages' => $all_language,
        ]);
    }

    public function store_new_news(Request $request)
    {
        $this->validate($request, [
            'news_content' => 'required',
            'excerpt' => 'required',
            'title' => 'required',
            'lang' => 'required',
            'status' => 'required',
            // 'author' => 'required',
            'slug' => 'nullable',
            'meta_tags' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'image' => 'nullable|string|max:191',
        ]);
        $slug = !empty($request->slug) ? $request->slug : Str::slug($request->title, $request->lang);

        News::create([
            'slug' => $slug,
            'content' => SanitizeInput::kses_basic($request->news_content),
            'title' => $request->title,
            'status' => $request->status,
            'meta_tags' => $request->meta_tags,
            'meta_description' => $request->meta_description,
            'excerpt' => $request->excerpt,
            'lang' => $request->lang,
            'image' => $request->image,
            'user_id' => Auth::user()->id,
            'author' => $request->author,
        ]);
        return redirect()->back()->with([
            'msg' => __('New News Added...'),
            'type' => 'success'
        ]);
    }
    public function clone_news(Request $request)
    {
        $news_details = News::find($request->item_id);
        News::create([
            'slug' => $news_details->slug . '33',
            'content' => $news_details->content,
            'title' => $news_details->title,
            'status' => 'draft',
            'meta_tags' => $news_details->meta_tags,
            'meta_description' => $news_details->meta_description,
            'excerpt' => $news_details->excerpt,
            'lang' => $news_details->lang,
            'image' => $news_details->image,
            'user_id' => null,
            'author' => $news_details->author,
        ]);

        return redirect()->back()->with([
            'msg' => __('News cloned success...'),
            'type' => 'success'
        ]);
    }

    public function edit_news($id)
    {
        $news = News::find($id);
        $all_language = Language::all();
        return view('backend.pages.news.edit')->with([
            'news' => $news,
            'all_languages' => $all_language,
        ]);
    }
    public function update_news(Request $request, $id)
    {
        $this->validate($request, [
            'news_content' => 'required',
            'excerpt' => 'required',
            'title' => 'required',
            'lang' => 'required',
            'status' => 'required',
            // 'author' => 'required',
            'slug' => 'nullable',
            'meta_tags' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'image' => 'nullable|string|max:191',
        ]);
        $slug = !empty($request->slug) ? $request->slug : Str::slug($request->title, $request->lang);
        News::where('id', $id)->update([
            'slug' => $slug,
            'content' => $request->news_content,
            'title' => $request->title,
            'status' => $request->status,
            'meta_tags' => $request->meta_tags,
            'meta_description' => $request->meta_description,
            'excerpt' => $request->excerpt,
            'lang' => $request->lang,
            'image' => $request->image,
            'user_id' => Auth::user()->id,
            'author' => $request->author,
        ]);

        return redirect()->back()->with([
            'msg' => __('News updated...'),
            'type' => 'success'
        ]);
    }
    public function delete_news(Request $request, $id)
    {
        News::find($id)->delete();

        return redirect()->back()->with([
            'msg' => __('News Delete Success...'),
            'type' => 'danger'
        ]);
    }

    public function news_page_settings()
    {
        $all_languages = Language::all();
        return view('backend.pages.news.page-settings.news')->with(['all_languages' => $all_languages]);
    }

    public function update_news_page_settings(Request $request)
    {

        $this->validate($request, [
            'news_page_recent_post_widget_items' => 'nullable|string|max:191',
            'news_page_item' => 'nullable|string|max:191'
        ]);

        $all_languages = Language::all();
        foreach ($all_languages as $lang) {
            $this->validate($request, [
                'news_page_' . $lang->slug . '_read_more_btn_text' => 'nullable|string',
            ]);
            $read_more_btn_text = 'news_page_' . $lang->slug . '_read_more_btn_text';
            update_static_option($read_more_btn_text, $request->$read_more_btn_text);
        }

        update_static_option('news_page_item', $request->news_page_item);
        update_static_option('news_page_recent_post_widget_items', $request->news_page_recent_post_widget_items);

        return redirect()->back()->with([
            'msg' => __('Settings Update Success...'),
            'type' => 'success'
        ]);
    }

    public function bulk_action(Request $request)
    {
        News::whereIn('id', $request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

    public function slug_check(SlugCheckRequest $request)
    {
        $user_given_slug = $request->slug;
        $query = Events::Blog(['slug' => $user_given_slug]);

        return SlugChecker::Check($request, $query);
    }
}
