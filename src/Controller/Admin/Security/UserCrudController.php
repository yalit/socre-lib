<?php

namespace App\Controller\Admin\Security;

use App\Admin\Field\EnumField;
use App\Entity\Security\Enum\UserRole;
use App\Entity\Security\User;
use App\Voter\AbstractCrudVoter;
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

    public function configureCrud(Crud $crud): Crud
    {
        return parent::configureCrud($crud)
            ->setEntityLabelInSingular('entity.user.label.singular')
            ->setEntityLabelInPlural('entity.user.label.plural')
            ;

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
            TextField::new('name', 'entity.user.fields.username.label'),
            EmailField::new('email', 'entity.user.fields.email.label'),
            TextField::new('plainPassword', 'entity.user.fields.plainPassword.label')->hideOnIndex(),
            EnumField::new('role', 'entity.user.fields.role.label')->setEnumClass(UserRole::class)
        ];
    }
}
