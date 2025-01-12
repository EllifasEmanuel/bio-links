<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Link extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function moveUp(): void
    {
        $this->move(-1);
    }

    public function moveDown(): void
    {
        $this->move(+1);
    }

    private function move(int $to): void
    {
        $order = $this->sort;
        $newOrder = $this->sort + $to;

        $swapWith = $this->user->links()
            ->where('sort', $newOrder)
            ->first();

        $this->fill(['sort' => $newOrder])->save();
        $swapWith->fill(['sort' => $order])->save();
    }
}
