<?php
namespace App\Livewire;

use App\Models\Product;
use App\Models\Review;
use Livewire\Component;

class Rating extends Component
{
    public Product $product;
    public $stars = [];
    public $averageRating = 0;

    public function rate($stars)
    {
        $totalReviews = $this->product->reviews->count();

        if ($totalReviews === 0) {
            $percentage = 0;
        } else {
            $reviewsForStar = Review::where('stars', $stars)->where('product_id', $this->product->id)->count();
            $percentage = ($reviewsForStar / $totalReviews) * 100;
        }

        return [
            'starRating' => $stars,
            'count' => $reviewsForStar ?? 0,
            'percentage' => round($percentage, 2)
        ];
    }


    public function getAvgRating()
    {
        $totalReviews = $this->product->reviews->count();

        if ($totalReviews == 0) {
            return 0;
        }

        $totalStars = Review::where('product_id', $this->product->id)->sum('stars');

        return round($totalStars / $totalReviews, 2);
    }

    public function mount()
    {
        for ($i = 1; $i <= 5; $i++) {
            $this->stars[$i] = $this->rate($i)['percentage'];
        }

        $this->averageRating = $this->getAvgRating();
    }

    public function render()
    {
        return view('livewire.rating');
    }
}
