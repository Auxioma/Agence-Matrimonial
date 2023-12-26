<?php

namespace App\Controller\Admin;

use App\Entity\Profile;
use Symfony\Component\Validator\Constraints\Date;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Faker\Provider\bg_BG\PhoneNumber;

class ProfileCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Profile::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            // fait un row > col-6
            TextField::new('FirstName', 'prénom')->setColumns(6),
            TextField::new('LastName', 'nom')->setColumns(6),
            TextField::new('Country', 'pays')->setColumns(4),
            TextField::new('City', 'ville')->setColumns(4),
            DateField::new('Birthday', 'date de naissance')->setColumns(4),
            TextField::new('PhoneNumber', 'numéro de téléphone')->setColumns(4),
            TextField::new('Job', 'emploi')->setColumns(4),
            TextField::new('Size', 'taille')->setColumns(4),

        ];
    }
}
