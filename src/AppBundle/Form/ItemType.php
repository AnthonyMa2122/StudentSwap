<?php

namespace AppBundle\Form;

use AppBundle\Entity\Item;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ItemType extends AbstractType
{
		public function buildForm(FormBuilderInterface $builder, array $options)
		{

		}

		public function configureOptions(OptionsResolver $resolver)
		{
				$resolver->setDefaults(array(
						'label' => false,
						'data_class' => Item::class,
				));
		}
}
