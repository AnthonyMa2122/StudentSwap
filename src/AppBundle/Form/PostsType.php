<?php
namespace AppBundle\Form;

use AppBundle\Entity\Item;
use AppBundle\Entity\Posts;
use AppBundle\Form\ItemType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class PostsType extends AbstractType
{
		public function buildForm(FormBuilderInterface $builder, array $options)
		{
				$builder->add('item', CollectionType::class, array(
						'label' => false,
						'entry_type' => ItemType::class
				));
		}

		public function configureOptions(OptionsResolver $resolver)
		{
				$resolver->setDefaults(array(
						'data_class' => Posts::class,
				));
		}
}
