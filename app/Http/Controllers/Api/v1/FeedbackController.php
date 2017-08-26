<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1;
use Hiver\Admin\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function feedback(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:20',
            'email' => 'required|max:255',
            'feedback' => 'required|max:255'
        ]);
        $requestData = $request->all();
        $feedback = Feedback::create($requestData);
        return $feedback;
    }
}