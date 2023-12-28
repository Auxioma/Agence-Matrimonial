<?php

namespace App\Controller\Admin;

use App\Entity\SuccessStories;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Symfony\Component\DomCrawler\Field\FileFormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SuccessStoriesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SuccessStories::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
                ->setEntityLabelInSingular('Témoignages de réussite')
                ->setEntityLabelInPlural('Témoignages de réussite')
                ->setDefaultSort(['id' => 'DESC'])
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('Title', 'Title'),
            TextEditorField::new('Description', 'description')
                ->hideOnIndex(),

            SlugField::new('Slug', 'Slug URL')
                ->setTargetFieldName('Title')
                ->hideOnIndex(),

            ImageField::new('Pictures', 'Image')
                ->setBasePath('/assets/images/story/')
                ->setUploadDir('/public/assets/images/story/')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            DateField::new('CreatedAt', 'Date de création')->onlyOnIndex(),
            DateField::new('UpdatedAt', 'Date de mise à jour')->onlyOnIndex(),
        ];
    }
}
