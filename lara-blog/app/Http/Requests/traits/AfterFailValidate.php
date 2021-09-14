<?php

namespace App\Http\Requests\traits;

/**
 * Trait AfterFailValidate
 * @package App\Http\Requests\traits
 */
trait AfterFailValidate
{
    /**
     * @param $validator
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            return redirect()->back()->withErrors($validator)->withInput();
        });
    }
}
