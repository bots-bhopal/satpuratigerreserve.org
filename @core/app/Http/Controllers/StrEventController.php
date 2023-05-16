<?php

namespace App\Http\Controllers;

use App\Actions\SlugChecker;
use App\Strevent;
use App\Language;
use App\Events;
use App\Http\Requests\SlugCheckRequest;
use App\Helpers\SanitizeInput;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class StrEventController extends Controller
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
        $all_events = Strevent::all()->groupBy('lang');
        return view('backend.pages.strevent.index')->with([
            'all_events' => $all_events
        ]);
    }

    public function new_event()
    {
        $all_language = Language::all();
        return view('backend.pages.strevent.new')->with([
            'all_languages' => $all_language,
        ]);
    }

    public function store_new_event(Request $request)
    {
        $this->validate($request, [
            'event_content' => 'required',
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

        Strevent::create([
            'slug' => $slug,
            'content' => SanitizeInput::kses_basic($request->event_content),
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
            'msg' => __('New Event Added...'),
            'type' => 'success'
        ]);
    }
    public function clone_event(Request $request)
    {
        $event_details = Strevent::find($request->item_id);
        Strevent::create([
            'slug' => $event_details->slug . '33',
            'content' => $event_details->content,
            'title' => $event_details->title,
            'status' => 'draft',
            'meta_tags' => $event_details->meta_tags,
            'meta_description' => $event_details->meta_description,
            'excerpt' => $event_details->excerpt,
            'lang' => $event_details->lang,
            'image' => $event_details->image,
            'user_id' => null,
            'author' => $event_details->author,
        ]);

        return redirect()->back()->with([
            'msg' => __('Event cloned success...'),
            'type' => 'success'
        ]);
    }

    public function edit_event($id)
    {
        $event = Strevent::find($id);
        $all_language = Language::all();
        return view('backend.pages.strevent.edit')->with([
            'event' => $event,
            'all_languages' => $all_language,
        ]);
    }
    public function update_event(Request $request, $id)
    {
        $this->validate($request, [
            'event_content' => 'required',
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
        Strevent::where('id', $id)->update([
            'slug' => $slug,
            'content' => $request->event_content,
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
            'msg' => __('Event updated...'),
            'type' => 'success'
        ]);
    }
    public function delete_event(Request $request, $id)
    {
        Strevent::find($id)->delete();

        return redirect()->back()->with([
            'msg' => __('Event Delete Success...'),
            'type' => 'danger'
        ]);
    }

    public function event_page_settings()
    {
        $all_languages = Language::all();
        return view('backend.pages.strevent.page-settings.event')->with(['all_languages' => $all_languages]);
    }

    public function update_event_page_settings(Request $request)
    {

        $this->validate($request, [
            'event_page_recent_post_widget_items' => 'nullable|string|max:191',
            'event_page_item' => 'nullable|string|max:191'
        ]);

        $all_languages = Language::all();
        foreach ($all_languages as $lang) {
            $this->validate($request, [
                'event_page_' . $lang->slug . '_read_more_btn_text' => 'nullable|string',
            ]);
            $read_more_btn_text = 'event_page_' . $lang->slug . '_read_more_btn_text';
            update_static_option($read_more_btn_text, $request->$read_more_btn_text);
        }

        update_static_option('event_page_item', $request->event_page_item);
        update_static_option('event_page_recent_post_widget_items', $request->event_page_recent_post_widget_items);

        return redirect()->back()->with([
            'msg' => __('Settings Update Success...'),
            'type' => 'success'
        ]);
    }

    public function bulk_action(Request $request)
    {
        Strevent::whereIn('id', $request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

    public function slug_check(SlugCheckRequest $request)
    {
        $user_given_slug = $request->slug;
        $query = Events::Blog(['slug' => $user_given_slug]);

        return SlugChecker::Check($request, $query);
    }
}
