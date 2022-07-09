<?php

namespace App\Form;

use App\Entity\Ads;
use App\Entity\Categories;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextaeraType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class AdsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class)
            ->add('state_of_use', TextType::class)
            ->add('price', TextType::class)
            ->add('delivery_price', TextType::class, [
                'required' => false
            ])
            ->add('description', CKEditorType::class)
            ->add('area', TextType::class)
            ->add('department', TextType::class)
            ->add('city', TextType::class)
            ->add('category', EntityType::class, [
                'class' => Categories::class
            ]);
        // ->add('Vadider', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ads::class,
        ]);
    }
}
