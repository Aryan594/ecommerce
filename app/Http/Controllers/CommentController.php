<?php
namespace App\Http\Controllers\User;
namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function addtocomment(Request $request)
{
    if (Auth::user()) {
    $comment = new Comment();
    $comment->user_id = Auth::user()->id;
    $comment->product_id = $request->input('product_id');
    $comment->content = $request->input('content');
    $comment->save();

    return redirect()->back()->with('success', 'Comment submitted successfully!');
}        else{
    return redirect('/login');
}
}
public function destroy($id)
{
    $comment = Comment::find($id);
    
    if ($comment) {
        // Check if the authenticated user is the owner of the comment
        if (auth()->check() && auth()->user()->id === $comment->user_id) {
            $comment->delete();
        }
    }
    
    return back();
}

}
