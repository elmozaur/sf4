<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

use App\Entity\Task;

use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('task', null, ['help' => "podaj fajny tytul"])
			->add('opis')
            ->add('dueDate', null, [])
			->add('wybieranie', ChoiceType::class,
                [
                    'choices' => ['aaaaa' => '1', 'bbbbb' => '2', 'ccccc' => '3', 'ddddd' => '4', 'eeeeee' => '5'],
                    'expanded' => false,
                    'multiple' => false,
                    'label' => 'wybieram',
                ]
            )
            ->add('save', SubmitType::class)
        ;
    }
	
	public function configureOptions(OptionsResolver $resolver){
		$resolver->setDefaults([
			'data_class' => Task::class,
		]);
	}
	
	
}