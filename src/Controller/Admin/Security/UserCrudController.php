<?php

namespace App\Controller\Admin\Security;

use App\Admin\Field\EnumField;
use App\Controller\Voter\AbstractCrudVoter;
use App\Entity\Security\Enum\UserRole;
use App\Entity\Security\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return parent::configureActions($actions)
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->setPermissions([
                Action::NEW => AbstractCrudVoter::CREATE,
                Action::DELETE => AbstractCrudVoter::DELETE,
                Action::EDIT => AbstractCrudVoter::UPDATE,
                Action::DETAIL => AbstractCrudVoter::READ,
                Action::INDEX => AbstractCrudVoter::READ,
            ])
        ;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            EmailField::new('email'),
            TextField::new('plainPassword', 'Password')->hideOnIndex(),
            EnumField::new('role')->setEnumClass(UserRole::class)
        ];
    }
}
