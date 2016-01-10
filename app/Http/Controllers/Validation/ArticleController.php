<?php

namespace App\Http\Controllers\Validation;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function slug(Request $request)
    {
        if (! $request->has('slug')) {
            return response()->json(false);
        }

        $result = Article::where('slug', '=', $request->input('slug'));
        if ($this->isEdit) {
            $result = $result->where('id', '!=', $this->entityId);
        }
        $result = $result->pluck('id');

        if (! is_null($result)) {
            return response()->json(false);
        }

        return response()->json(true);
    }
}
