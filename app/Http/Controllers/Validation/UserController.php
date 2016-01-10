<?php

namespace App\Http\Controllers\Validation;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function email(Request $request)
    {
        if (! $request->has('email')) {
            return response()->json(false);
        }

        $result = User::where('email', '=', $request->input('email'));
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
