<?php

namespace App\Filament\Resources\ReviewResource\Widgets;

use App\Models\Product;
use App\Models\Review;
use Filament\Forms\Components\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OverviewWidget extends BaseWidget
{

    public function cards(): array
    {
        return [
            Card::make('Products', Product::count()),
            Card::make('Reviews', Review::count()),
            Card::make('Pending Reviews', Review::where('approved', false)->count()),
        ];
    }

    protected function getStats(): array
    {
        return [
            //
        ];
    }
}
