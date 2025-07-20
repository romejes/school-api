<?php

namespace SchoolApi\Teacher\Interfaces;

use App\Interfaces\Repositories;

interface ITeacherRepository extends
    Repositories\IGetAndPaginate,
    Repositories\IDelete,
    Repositories\IShowById,
    Repositories\ICreate,
    Repositories\IFindAndUpdate
{
}
