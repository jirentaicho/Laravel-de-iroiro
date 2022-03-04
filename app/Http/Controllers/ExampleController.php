<?php

namespace App\Http\Controllers;

use App\MaruValidationSet\SampleModel\SampleModel;
use App\MaruValidationSet\Validation\SampleValidation;
use Illuminate\Http\Request;
use Illuminate\Support\ViewErrorBag;
use Illuminate\Support\Facades\Validator;

class ExampleController extends Controller
{

    public function storeSample(Request $request)
    {
        $model = new SampleModel($request->name, $request->point);
        // バリデーションの実行
        $validation = new SampleValidation($model);
        $result = $validation->vaild();
        
        if(!$result->getResult())
        {
            return back()->withInput()->withErrors($result->getMessages());
        }
        return view('exampleview');
    }

    public function example(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);

        $model = new SampleModel("misaka", 100);
        // バリデーションの実行
        $validation = new SampleValidation($model);
        $result = $validation->vaild();

        if(!$result->getResult())
        {
            
        }
        return view('exampleview');
    }

}
