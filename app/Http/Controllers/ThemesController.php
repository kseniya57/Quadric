<?php

namespace App\Http\Controllers;

use App\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThemesController extends Controller
{
    public function getAll()
    {
        $themes = Theme::all();
        return response()->json($themes, 200);
    }

    public function save(Request $request, $is_user = null)
    {
        $check = $request->has('id') ? [ 'id' => $request->id ] : [ 'name' => $request->name ];
        $theme = Theme::updateOrCreate(
            $check,
            [
                'name' => $request->name,
                'colors' => json_encode($request->colors),
                'dark' => $request->dark
            ]
        );
        if ($is_user) {
            $user = Auth::guard('api')->user();
            $user->theme_id = $theme->id;
            $user->save();
        }
        return response()->json($theme, 200);
    }

    public function delete($id)
    {
        if ($id === 1) return response()->json([ 'errors' => [ 'Эту тему нельзя удалить, она стоит по умолчанию.' ]], 422);
        Theme::destroy($id);
        return null;
    }
}
