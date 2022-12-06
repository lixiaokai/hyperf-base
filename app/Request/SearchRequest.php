<?php

declare(strict_types=1);

namespace App\Request;

class SearchRequest extends FormRequest
{
    /**
     * Todo: 待完善.
     */
    public function searchParams(): array
    {
        return $this->all();
    }
}
