<?php

namespace App\Controller\Admin;

use App\Entity\CourseType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CourseTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CourseType::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            //  IdField::new('id'),
            TextField::new('name'),
            TextField::new('description'),
            //  TextEditorField::new('description'),
        ];
    }
}
