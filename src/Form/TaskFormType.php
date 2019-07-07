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
            ->add('task', null, ['required' => false, 'help' => "podaj fajny tytul"])
			->add('opis', null, ['required' => false])
            ->add('dueDate', null, [])
			->add('wybieranie', ChoiceType::class,
                [
                    'choices' => ['validacja tasku' => '1', 'validacja opisu' => '2', 'validacja 1i2' => '3', 'bez validacji' => '4', 'eeeeee' => '5'],
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
			'validation_groups' => [
                Task::class,
                'getValidationGroups',
            ],
		]);
	}
	
}