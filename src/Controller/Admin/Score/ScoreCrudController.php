<?php

namespace App\Controller\Admin\Score;

use App\Entity\Score\Score;
use App\Form\Score\ArtistFormType;
use App\Form\Score\ScoreCategoryType;
use App\Form\Score\ScoreFileType;
use App\Form\Score\ScoreReferenceType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ScoreCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Score::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            TextField::new('description'),
            CollectionField::new('refs')
                ->allowAdd()
                ->allowDelete()
                ->setEntryType(ScoreReferenceType::class)
                ->setFormTypeOption('by_reference', false),
            CollectionField::new('artists')
                ->allowAdd()
                ->allowDelete()
                ->setEntryType(ArtistFormType::class)
                ->setFormTypeOption('by_reference', false),
            CollectionField::new('categories')
                ->allowAdd()
                ->allowDelete()
                ->setEntryType(ScoreCategoryType::class)
                ->setFormTypeOption('by_reference', false),
            CollectionField::new('files')
                ->allowAdd()
                ->allowDelete()
                ->setEntryType(ScoreFileType::class)
                ->setFormTypeOption('by_reference', false)
        ];
    }
}
