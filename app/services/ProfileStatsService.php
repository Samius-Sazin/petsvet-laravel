<?php

namespace App\Services;

use App\Models\User;

class ProfileStatsService
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getCounts(): array
    {
        $roleKey = match ($this->user->role) {
            0 => 'admin',
            1 => 'user',
            2 => 'veterinary',
            default => 'user',
        };

        $counts = [];

        // switch ($roleKey) {
        //     case 'admin':
        //         $counts['posts'] = \App\Models\Post::count();
        //         $counts['qna'] = \App\Models\Qna::count();
        //         $counts['products'] = \App\Models\Order::count();
        //         $counts['articles'] = \App\Models\Article::count();
        //         $counts['all_users'] = \App\Models\User::count();
        //         $counts['all_vets'] = \App\Models\User::where('role', 2)->count();
        //         $counts['all_admins'] = \App\Models\User::where('role', 0)->count();
        //         break;

        //     case 'user':
        //         $counts['posts'] = $this->user->posts()->count();
        //         $counts['qna'] = $this->user->qnas()->count();
        //         $counts['products'] = $this->user->orders()->count();
        //         $counts['reacted_articles'] = $this->user->reactedArticles()->count();
        //         $counts['reacted_posts'] = $this->user->reactedPosts()->count();
        //         $counts['reacted_qna'] = $this->user->reactedQnas()->count();
        //         break;

        //     case 'veterinary':
        //         $counts['posts'] = $this->user->posts()->count();
        //         $counts['qna'] = $this->user->qnas()->count();
        //         $counts['answered_qna'] = $this->user->answeredQnas()->count();
        //         $counts['products'] = $this->user->orders()->count();
        //         $counts['reacted_posts'] = $this->user->reactedPosts()->count();
        //         $counts['reacted_qna'] = $this->user->reactedQnas()->count();
        //         break;
        // }
        switch ($roleKey) {
            case 'admin':
                $counts['posts'] = 10;
                $counts['qna'] = 15;
                $counts['products'] = 5;
                $counts['articles'] = 8;
                $counts['all_admins'] = User::where('role', 0)->count();
                $counts['all_users'] = User::where('role', 1)->count();
                $counts['all_vets'] = User::where('role', 2)->count();
                break;

            case 'user':
                $counts['posts'] = 3;
                $counts['qna'] = 4;
                $counts['products'] = 2;
                $counts['reacted_articles'] = 5;
                $counts['reacted_posts'] = 6;
                $counts['reacted_qna'] = 2;
                break;

            case 'veterinary':
                $counts['posts'] = 4;
                $counts['qna'] = 3;
                $counts['answered_qna'] = 7;
                $counts['products'] = 1;
                $counts['reacted_posts'] = 2;
                $counts['reacted_qna'] = 1;
                break;

            default:
                $counts = [];
                break;
        }
        return $counts;
    }
}
