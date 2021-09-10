<?php

namespace App\Http\Requests\traits;

trait AfterFailValidate
{
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            return redirect()->back()->withErrors($validator)->withInput();
        });
    }
}
