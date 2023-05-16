<?php

namespace App\Http\Controllers;

use App\Language;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class ConstructionHomePageController extends Controller
{
    public $industry_home_base_view_path = 'backend.pages.home.construction.';
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function header_area()
    {
        $all_languages = Language::all();
        return view($this->industry_home_base_view_path . 'header')->with(['all_languages' => $all_languages]);
    }

    public function update_header_area(Request $request)
    {
        $all_language = Language::all();
        foreach ($all_language as $lang) {
            $this->validate($request, [
                'construction_header_section_' . $lang->slug . '_title' => 'nullable|string',
                'construction_header_section_' . $lang->slug . '_description' => 'nullable|string',
                'construction_header_section_' . $lang->slug . '_button_one_text' => 'nullable|string',
                'construction_header_section_button_one_url' => 'nullable|string',
                'construction_header_section_button_one_icon' => 'nullable|string',
                'construction_header_section_bg_image' => 'nullable|string',
            ]);

            //save repeater values
            $all_fields = [
                'construction_header_section_' . $lang->slug . '_title',
                'construction_header_section_' . $lang->slug . '_description',
                'construction_header_section_' . $lang->slug . '_button_one_text',
                'construction_header_section_button_one_url',
                'construction_header_section_button_one_icon',
                'construction_header_section_bg_image'
            ];
            foreach ($all_fields as $field) {
                update_static_option($field, $request->$field);
            }
        }
        return redirect()->back()->with([
            'msg' => __('Settings Update'),
            'type' => 'success'
        ]);
    }

    public function about_area()
    {
        $all_languages = Language::all();
        return view($this->industry_home_base_view_path . 'about')->with(['all_languages' => $all_languages]);
    }

    public function update_about_area(Request $request)
    {

        $all_language = Language::all();

        foreach ($all_language as $lang) {
            $this->validate($request, [
                'construction_about_section_' . $lang->slug . '_subtitle' => 'nullable|string',
                'construction_about_section_' . $lang->slug . '_title' => 'nullable|string',
                'construction_about_section_' . $lang->slug . '_description' => 'nullable|string',
                'construction_about_section_' . $lang->slug . '_button_one_text' => 'nullable|string',
                'construction_about_section_' . $lang->slug . '_experience_year_title' => 'nullable|string',
                'construction_about_section_button_one_url' => 'nullable|string',
                'construction_about_section_video_url' => 'nullable|string',
                'construction_about_section_experience_year' => 'nullable|string',
                'construction_about_section_button_one_icon' => 'nullable|string',
                'construction_about_section_left_image' => 'nullable|string',
            ]);

            //save repeater values
            $all_fields = [
                'construction_about_section_' . $lang->slug . '_subtitle',
                'construction_about_section_' . $lang->slug . '_title',
                'construction_about_section_' . $lang->slug . '_description',
                'construction_about_section_' . $lang->slug . '_button_one_text',
                'construction_about_section_' . $lang->slug . '_experience_year_title',
                'construction_about_section_button_one_url',
                'construction_about_section_video_url',
                'construction_about_section_experience_year',
                'construction_about_section_button_one_icon',
                'construction_about_section_left_image'
            ];

            foreach ($all_fields as $field) {
                update_static_option($field, $request->$field);
            }
        }

        return redirect()->back()->with([
            'msg' => __('Settings Update'),
            'type' => 'success'
        ]);
    }


    public function what_we_offer_area()
    {
        $all_languages = Language::all();
        return view($this->industry_home_base_view_path . 'what-we-offer-area')->with(['all_languages' => $all_languages]);
    }

    public function update_what_we_offer_area(Request $request)
    {
        $this->validate($request, [
            'home_page_01_service_area_items' => 'nullable'
        ]);

        $all_language = Language::all();

        foreach ($all_language as $lang) {
            $this->validate($request, [
                'construction_what_we_offer_section_' . $lang->slug . '_subtitle' => 'nullable|string',
                'construction_what_we_offer_section_' . $lang->slug . '_title' => 'nullable|string',
                'construction_what_we_offer_section_' . $lang->slug . '_button_text' => 'nullable|string',
            ]);

            //save repeater values
            $all_fields = [
                'construction_what_we_offer_section_' . $lang->slug . '_subtitle',
                'construction_what_we_offer_section_' . $lang->slug . '_title',
                'construction_what_we_offer_section_' . $lang->slug . '_button_text',
            ];

            foreach ($all_fields as $field) {
                update_static_option($field, $request->$field);
            }
        }
        update_static_option('home_page_01_service_area_items', $request->home_page_01_service_area_items);

        return redirect()->back()->with([
            'msg' => __('Settings Update'),
            'type' => 'success'
        ]);
    }

    public function video_area(){
        $all_languages = Language::all();
        return view($this->industry_home_base_view_path.'video-area')->with(['all_languages' => $all_languages]);
    }

    public function update_video_area (Request $request){
        $this->validate($request,[
            'gallery_video_section_background_image'  => 'nullable|string',
            'gallery_video_section_video_url'  => 'nullable|string',
        ]);

        update_static_option('gallery_video_section_background_image',$request->gallery_video_section_background_image);
        update_static_option('gallery_video_section_video_url',$request->gallery_video_section_video_url);

        return redirect()->back()->with([
            'msg' => __('Settings Update'),
            'type' => 'success'
        ]);
    }

    public function quote_area()
    {
        $all_languages = Language::all();
        return view($this->industry_home_base_view_path . 'quote-area')->with(['all_languages' => $all_languages]);
    }

    public function update_quote_area(Request $request)
    {
        $this->validate($request, [
            'construction_quote_section__button_icon' => 'nullable',
            'construction_quote_section_bg_image' => 'nullable',
            'construction_quote_section_right_image' => 'nullable',
        ]);

        $all_language = Language::all();

        foreach ($all_language as $lang) {
            $this->validate($request, [
                'construction_quote_section_' . $lang->slug . '_subtitle' => 'nullable|string',
                'construction_quote_section_' . $lang->slug . '_title' => 'nullable|string',
                'construction_quote_section_' . $lang->slug . '_button_text' => 'nullable|string',
            ]);

            //save repeater values
            $all_fields = [
                'construction_quote_section_' . $lang->slug . '_subtitle',
                'construction_quote_section_' . $lang->slug . '_title',
                'construction_quote_section_' . $lang->slug . '_button_text',
            ];

            foreach ($all_fields as $field) {
                update_static_option($field, $request->$field);
            }
        }

        $all_fields = [
            'construction_quote_section__button_icon',
            'construction_quote_section_bg_image',
            'construction_quote_section_right_image'
        ];
        foreach ($all_fields as $field) {
            update_static_option($field, $request->$field);
        }

        return redirect()->back()->with([
            'msg' => __('Settings Update'),
            'type' => 'success'
        ]);
    }

    public function gallery_area()
    {
        $all_languages = Language::all();
        return view($this->industry_home_base_view_path . 'gallery-area')->with(['all_languages' => $all_languages]);
    }

    public function update_gallery_area(Request $request)
    {
        $this->validate($request, [
            'home_page_01_case_study_items'  => 'nullable'
        ]);

        $all_language = Language::all();

        foreach ($all_language as $lang) {
            $this->validate($request, [
                'industry_project_section_' . $lang->slug . '_subtitle' => 'nullable|string',
                'industry_project_section_' . $lang->slug . '_title' => 'nullable|string',
                'industry_project_section_' . $lang->slug . '_button_text' => 'nullable|string',
            ]);

            //save repeater values
            $all_fields = [
                'industry_project_section_' . $lang->slug . '_subtitle',
                'industry_project_section_' . $lang->slug . '_title',
                'industry_project_section_' . $lang->slug . '_button_text',
            ];

            foreach ($all_fields as $field) {
                update_static_option($field, $request->$field);
            }
        }

        update_static_option('home_page_01_case_study_items', $request->home_page_01_case_study_items);

        return redirect()->back()->with([
            'msg' => __('Settings Update'),
            'type' => 'success'
        ]);
    }

    public function team_member_area()
    {
        $all_languages = Language::all();
        return view($this->industry_home_base_view_path . 'team-member-area')->with(['all_languages' => $all_languages]);
    }

    public function update_team_member_area(Request $request)
    {
        $this->validate($request, [
            'home_page_01_team_member_items' => 'nullable',
        ]);

        $all_language = Language::all();

        foreach ($all_language as $lang) {
            $this->validate($request, [
                'construction_team_member_section_' . $lang->slug . '_subtitle' => 'nullable|string',
                'construction_team_member_section_' . $lang->slug . '_title' => 'nullable|string',
            ]);

            //save repeater values
            $all_fields = [
                'construction_team_member_section_' . $lang->slug . '_subtitle',
                'construction_team_member_section_' . $lang->slug . '_title',
            ];

            foreach ($all_fields as $field) {
                update_static_option($field, $request->$field);
            }
        }

        update_static_option('home_page_01_case_study_items', $request->home_page_01_case_study_items);

        return redirect()->back()->with([
            'msg' => __('Settings Update'),
            'type' => 'success'
        ]);
    }

    public function testimonial_area()
    {
        $all_languages = Language::all();
        return view($this->industry_home_base_view_path . 'testimonial-area')->with(['all_languages' => $all_languages]);
    }

    public function update_testimonial_area(Request $request)
    {

        $all_language = Language::all();

        foreach ($all_language as $lang) {
            $this->validate($request, [
                'construction_testimonial_section_' . $lang->slug . '_subtitle' => 'nullable|string',
                'construction_testimonial_section_' . $lang->slug . '_title' => 'nullable|string',
            ]);

            //save repeater values
            $all_fields = [
                'construction_testimonial_section_' . $lang->slug . '_subtitle',
                'construction_testimonial_section_' . $lang->slug . '_title',
            ];

            foreach ($all_fields as $field) {
                update_static_option($field, $request->$field);
            }
        }

        return redirect()->back()->with([
            'msg' => __('Settings Update'),
            'type' => 'success'
        ]);
    }

    public function news_area()
    {
        $all_languages = Language::all();
        return view($this->industry_home_base_view_path . 'news-area')->with(['all_languages' => $all_languages]);
    }

    public function update_news_area(Request $request)
    {

        $all_language = Language::all();

        foreach ($all_language as $lang) {
            $this->validate($request, [
                'construction_news_area_section_' . $lang->slug . '_subtitle' => 'nullable|string',
                'construction_news_area_section_' . $lang->slug . '_title' => 'nullable|string',
                'construction_news_area_section_' . $lang->slug . '_btn_text' => 'nullable|string',
            ]);

            //save repeater values
            $all_fields = [
                'construction_news_area_section_' . $lang->slug . '_subtitle',
                'construction_news_area_section_' . $lang->slug . '_title',
                'construction_news_area_section_' . $lang->slug . '_btn_text',
            ];

            foreach ($all_fields as $field) {
                update_static_option($field, $request->$field);
            }
        }

        return redirect()->back()->with([
            'msg' => __('Settings Update'),
            'type' => 'success'
        ]);
    }

    public function announcement_area()
    {
        $all_languages = Language::all();
        return view('backend.pages.home.construction.announcement-area')->with(['all_languages' => $all_languages]);
    }

    public function update_announcement_area(Request $request)
    {

        $this->validate($request, [
            'title_' => 'nullable|string|max:191',
            'announcement_board_title_' => 'nullable|string|max:191',
            'announcement_board_button_title_' => 'nullable|string|max:191',
            'announcement_board_message_' => 'nullable|string|max:191',
        ]);

        $all_languages = Language::all();
        foreach ($all_languages as $lang) {
            $this->validate($request, [
                'title_' . $lang->slug . '_title_text' => 'nullable|string',
                'announcement_board_title_' . $lang->slug . '_announcement_board_title_text' => 'nullable|string',
                'announcement_board_button_title_' . $lang->slug . '_announcement_board_button_title_text' => 'nullable|string',
                'announcement_board_message_' . $lang->slug . '_announcement_board_message_text' => 'nullable|string',
            ]);
            $title_ = 'title_' . $lang->slug . '_title_text';
            $announcement_board_title_ = 'announcement_board_title_' . $lang->slug . '_announcement_board_title_text';
            $announcement_board_button_title_ = 'announcement_board_button_title_' . $lang->slug . '_announcement_board_button_title_text';
            $announcement_board_message_ = 'announcement_board_message_' . $lang->slug . '_announcement_board_message_text';
            update_static_option($title_, $request->$title_);
            update_static_option($announcement_board_title_, $request->$announcement_board_title_);
            update_static_option($announcement_board_button_title_, $request->$announcement_board_button_title_);
            update_static_option($announcement_board_message_, $request->$announcement_board_message_);
        }

        return redirect()->back()->with([
            'msg' => __('Settings Update Success...'),
            'type' => 'success'
        ]);
    }

    public function notice_area()
    {
        $all_languages = Language::all();
        return view('backend.pages.home.construction.notice-area')->with(['all_languages' => $all_languages]);
    }

    public function update_notice_area(Request $request)
    {

        $this->validate($request, [
            'notice_title_' => 'nullable|string|max:191',
            'notice_board_title_' => 'nullable|string|max:191',
            'notice_about_section_' => 'nullable|string',
            'notice_board_button_title_' => 'nullable|string|max:191',
            'notice_board_message_' => 'nullable|string|max:191',
            'visitor_month_header_title_' => 'nullable|string|max:191',
            'visitor_month_footer_title_' => 'nullable|string|max:191',
        ]);

        $all_languages = Language::all();
        foreach ($all_languages as $lang) {
            $this->validate($request, [
                'notice_title_' . $lang->slug . '_notice_title_text' => 'nullable|string',
                'notice_board_title_' . $lang->slug . '_notice_board_title_text' => 'nullable|string',
                'notice_about_section_' . $lang->slug . '_description' => 'nullable|string',
                'notice_board_button_title_' . $lang->slug . '_notice_board_button_title_text' => 'nullable|string',
                'notice_board_message_' . $lang->slug . '_notice_board_message_text' => 'nullable|string',
                'visitor_month_header_title_' . $lang->slug . '_visitor_month_header_title_text' => 'nullable|string',
                'visitor_month_footer_title_' . $lang->slug . '_visitor_month_footer_title_text' => 'nullable|string',
            ]);
            $notice_title_ = 'notice_title_' . $lang->slug . '_notice_title_text';
            $notice_board_title_ = 'notice_board_title_' . $lang->slug . '_notice_board_title_text';
            $notice_about_section_ = 'notice_about_section_' . $lang->slug . '_description';
            $notice_board_button_title_ = 'notice_board_button_title_' . $lang->slug . '_notice_board_button_title_text';
            $notice_board_message_ = 'notice_board_message_' . $lang->slug . '_notice_board_message_text';
            $visitor_month_header_title_ = 'visitor_month_header_title_' . $lang->slug . '_visitor_month_header_title_text';
            $visitor_month_footer_title_ = 'visitor_month_footer_title_' . $lang->slug . '_visitor_month_footer_title_text';
            update_static_option($notice_title_, $request->$notice_title_);
            update_static_option($notice_about_section_, $request->$notice_about_section_);
            update_static_option($notice_board_title_, $request->$notice_board_title_);
            update_static_option($notice_board_button_title_, $request->$notice_board_button_title_);
            update_static_option($notice_board_message_, $request->$notice_board_message_);
            update_static_option($visitor_month_header_title_, $request->$visitor_month_header_title_);
            update_static_option($visitor_month_footer_title_, $request->$visitor_month_footer_title_);
        }

        return redirect()->back()->with([
            'msg' => __('Settings Update Success...'),
            'type' => 'success'
        ]);
    }
}
