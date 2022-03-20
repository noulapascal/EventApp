<?php

namespace App\Controller\Admin;

use App\Entity\CourseType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CourseTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CourseType::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
