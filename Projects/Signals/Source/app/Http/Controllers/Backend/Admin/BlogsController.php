<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\User;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Seo;
use App\Models\News;
use App\Models\Comments;

use Illuminate\Database\QueryException;
use Carbon\Carbon;

class BlogsController extends Controller
{
    //

    public function ViewAllBlogs(){
    $id = Auth::user()->id;
    $admin = User::where('id', $id)->first();

    $seo = Seo::where('id', '1')->first();

    // Find all Signals
    $blogs = News::orderBy('created_at', 'desc')->get();

    return view('backend.admin.pages.news.blogs.all_blogs',compact('admin','seo','blogs'));
    } // End Mehtod 


    public function Newblog(){
    $id = Auth::user()->id;
    $admin = User::where('id', $id)->first();

    return view('backend.admin.pages.news.blogs.add_blog', compact('admin'));
    }



    public function AddBlog(Request $request)
{
    try {

        $blog = new News;

        if ($blog) {
            $blog->article_title = $request->article_title;
            $blog->article_short_desc = $request->article_short_desc;
            $blog->article_long_desc = $request->article_long_desc;
            $blog->article_author_id = $request->article_author_id;
            $blog->created_at = Carbon::now();

            // Check if photo uploaded
            if ($request->file('photo')) {
                $file = $request->file('photo');

                // Remove old picture from db
                @unlink(public_path('/frontend/upload/blog/' . $blog->article_img));

                $filename = date('YmdHi') . $file->getClientOriginalName();

                // Move the file to /user_images
                $file->move(public_path('/frontend/upload/blog/'), $filename);

                // Passing the file path to the db
                $blog->article_img = "frontend/upload/blog/" . $filename;
            }

            // Save the data to db
            $blog->save();

            $notification = [
                'message' => 'Blog Added, Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('view.blogs')->with($notification);
        }
    } catch (QueryException $e) {
        // Check for duplicate entry error
        if ($e->errorInfo[1] === 1062) { // 1062 is the MySQL error code for duplicate entry
            $notification = [
                'message' => 'already exists. Please choose a different Signal.',
                'alert-type' => 'error'
            ];
        } else {
            $notification = [
                'message' => "Blog couldn't be added.",
                'alert-type' => 'error'
            ];
        }

        return redirect()->route('view.blogs')->with($notification);
    }

    $notification = [
        'message' => "Blog Can't be Adding",
        'alert-type' => 'error'
    ];

    return redirect('admin/view/blogs')->with($notification);
}

    public function ViewBlog($ID){
    $id = Auth::user()->id;
    $admin = User::where('id', $id)->first();

    // Find Signal
    $blog = News::where('id', $ID)->first();
    $comments = Comments::where('blog_id', $ID)->get();

    return view('backend.admin.pages.news.blogs.view_blog', compact('admin','blog','comments'));
    }


    public function EditBlog(Request $request , $ID){
    $id = Auth::user()->id;
    $admin = User::where('id', $id)->first();


    $blog = News::findOrFail($ID);

    if($blog){

            $blog->article_title = $request->article_title;
            $blog->article_short_desc = $request->article_short_desc;
            $blog->article_long_desc = $request->article_long_desc;
            $blog->updated_at = Carbon::now();

            // Check if photo uploaded
            if ($request->file('photo')) {
                $file = $request->file('photo');

                // Remove old picture from db
                @unlink(public_path('/frontend/upload/blog/' . $blog->article_img));

                $filename = date('YmdHi') . $file->getClientOriginalName();

                // Move the file to /user_images
                $file->move(public_path('/frontend/upload/blog/'), $filename);

                // Passing the file path to the db
                $blog->article_img = "frontend/upload/blog/" . $filename;
            }

        // Save the data to db

        // Save the data to db
        $blog->save();

        $notification = [
            'message' => 'Blog Updated, Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }   
    else{
         $notification = array(
            'message' => 'Blog Not Found',
            'alert-type' => 'error'
        );

        return redirect('admin/view/blogs')->with($notification);
    }

    }


    public function DeleteBlog($ID){

    $deletion = News::findOrFail($ID)->delete();

    if($deletion){
        $notification = array(
            'message' => 'Blog Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect('admin/view/blogs')->with($notification);
    }
    else{
         $notification = array(
            'message' => 'Blog Not Found',
            'alert-type' => 'error'
        );

        return redirect('admin/view/blogs')->with($notification);
    }
    }

    public function DeleteBlogComment($ID){

        $deletion = Comments::findOrFail($ID)->delete();
            
        if($deletion){
        $notification = array(
            'message' => 'Comment Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    else{
         $notification = array(
            'message' => 'Comment Not Found',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    }



}
