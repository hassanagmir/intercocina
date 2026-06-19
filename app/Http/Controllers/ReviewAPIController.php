<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ReviewAPIController extends Controller
{
  public function index()
  {
    $reviews = Review::where('status', 1)->take(6)->get();
    return response()->json($reviews);
  }


  public function store(Request $request)
  {
    $validated = Validator::make(
      $request->all(),
      [
        'full_name'  => ['required', 'string', 'max:255'],
        'email'      => ['required', 'email', 'max:255'],
        'stars'      => ['required', 'integer', 'min:1', 'max:5'],
        'product_id' => ['required', 'integer', 'exists:products,id'],
        'status'     => ['nullable', 'string', 'in:pending,approved,rejected'],
        'comment'    => ['nullable', 'string', 'max:2000'],
      ],
      [],
      [
        'full_name'  => 'Nom complet',
        'email'      => 'E-mail',
        'stars'      => 'Étoiles',
        'product_id' => 'Produit',
        'status'     => 'Statut',
        'comment'    => 'Commentaire',
      ]
    )->validate();

    $review = Review::create([
      ...$validated,
      'status' => $validated['status'] ?? '1',
    ]);

    return response()->json([
      'message' => 'Avis soumis avec succès.',
      'data'    => $review,
    ], 201);
  }
}
