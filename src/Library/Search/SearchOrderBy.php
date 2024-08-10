<?php

namespace App\Library\Search;

use App\Library\Search\Enum\LibrarySearchOrderByValue;
use App\Library\Search\Enum\SearchByOrder;

readonly class SearchOrderBy
{

    public function __construct(
        private LibrarySearchOrderByValue $value,
        private SearchByOrder             $order
    )
    {
    }

    public function getValue(): LibrarySearchOrderByValue
    {
        return $this->value;
    }

    public function getOrder(): SearchByOrder
    {
        return $this->order;
    }
}
