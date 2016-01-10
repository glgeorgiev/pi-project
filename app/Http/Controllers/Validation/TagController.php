<?php

namespace App\Http\Controllers\Validation;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function slug(Request $request)
    {
        if (! $request->has('slug')) {
            return response()->json(false);
        }

        $result = Tag::where('slug', '=', $request->input('slug'));
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
