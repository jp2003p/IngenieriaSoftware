<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;

class CommentComponent extends Component
{
    public $user;


    public function mount() {
        $this->user = Auth::user();
    }

    public function render()
    {
        $comments = Comment::with('user')->get();
        return view('livewire.comment-component', compact('comments'));
    }


    #[On('add-comment')]
    public function addComment($comment)
    {
        Comment::create([
            'comment' => $comment,
            'user_id' => $this->user->id
        ]);
    }

    #[On('update-comment')]
    public function updateComment($id, $comment)
    {
        $c = Comment::find($id);
        $c->comment = trim($comment);
        $c->save();
    }

    public function delete($id){
        $comment = Comment::find($id);
        $comment->delete();
    }

}
