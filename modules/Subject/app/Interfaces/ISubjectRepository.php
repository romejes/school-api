<?php

namespace SchoolApi\Subject\Interfaces;

use App\Interfaces\Repositories;

interface ISubjectRepository
    extends Repositories\IGetAndPaginate,
    Repositories\IDelete,
    Repositories\ICreate,
    Repositories\IShowById,
    Repositories\IFindAndUpdate
{
}
