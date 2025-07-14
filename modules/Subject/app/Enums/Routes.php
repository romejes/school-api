<?php

namespace SchoolApi\Subject\Enums;

enum Routes: string
{
    case LIST_SUBJECTS = "api.subjects.list";
    case SHOW_SUBJECT = "api.subjects.show";
    case CREATE_SUBJECT = "api.subjects.create";
    case EDIT_SUBJECT = "api.subjects.edit";
    case DELETE_SUBJECT = "api.subjects.delete";
    case CHANGE_ACTIVE_SUBJECT = "api.subjects.change-active";

}
