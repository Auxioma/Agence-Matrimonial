<?php

namespace App\Controller\Admin;

use App\Entity\Familly;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FamillyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Familly::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            ChoiceField::new('lang', 'Langue')->setFormTypeOptions([
                'choices' => [
                    'Français' => 'Fr',
                    'English' => 'En',
                ]
            ]),
            TextField::new('name', 'Status familliale'),
        ];
    }
}
