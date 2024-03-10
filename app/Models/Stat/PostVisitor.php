<?php

namespace App\Models\Stat;

use App\Services\VisitorService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostVisitor extends Model
{
    use HasFactory, \App\Traits\AppDatetime;

    protected $table = 'post_visitor';

    protected $guarded = ['id'];


    public static function visitorChecker($id)
    {
        $visitorId = VisitorService::check()->first()->id;

        $postVisitorChecker = static::where('visitor_id', $visitorId)
            ->where('post_id', $id)
            ->whereDate('created_at', today())
            ->first();

        if ($postVisitorChecker) {
            $postVisitorChecker->update(['hits' => $postVisitorChecker->hits+1]);
        } else {
            PostVisitor::create([
                'visitor_id' => $visitorId,
                'post_id' => $id,
            ]);
        }
    }
}
