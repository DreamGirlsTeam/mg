<?php

namespace ScheduleBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use ScheduleBundle\Entity\Patient;
use ScheduleBundle\Entity\Population;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * Patient controller.
 *
 * @Route("/reception/schedule")
 */
class PatientController extends Controller
{
    /**
     * Lists all Patient entities.
     *
     * @Route("/", name="reception_schedule_index")
     * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $number = $request->request->get("number");
            if ($number < 1 || $number > 20) {
                return new JsonResponse("error",500);
            }
            $i = 0;
            $last = false;
            $form = $this->createFormBuilder()
                ->add('name', EntityType::class, array(
                    'label' => 'Тип візиту',
                    'class' => 'GuideBundle:VisitTypes',
                    'choices_as_values' => true,
                    'choice_label' => 'name',
                ))
                ->getForm();
            while ($i != $number) {
                if ($i == $number - 1) {
                    $last = true;
                }
                $forms[] = $this->renderView('patient/workforms.html.twig', array(
                    "form" => $form->createView(),
                    "num" => $i,
                    "last" => $last
                ));
                $i++;
            }

            return new JsonResponse(array("content" => $forms));
        } else {
            $form = $this->createFormBuilder()
                ->add('number', IntegerType::class, array('label' => 'Кількість пацієнтів', 'attr' => array('class'=>'validate[required,max[20], min[1]]')))
                ->add('save', SubmitType::class, array('label' => 'Підтвердити'))
                ->getForm();
            return $this->render('patient/start.html.twig', array(
                'form' => $form->createView()
            ));
        }
    }

    /**
     * Lists all Patient entities.
     *
     * @Route("/submit", name="reception_schedule_submit")
     * @Method("POST")
     */
    public function submitAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $works = $request->request->get('works');
            $patients = array();
            $em = $this->getDoctrine()->getEntityManager();
            //$em->getRepository('ScheduleBundle:Patient');
            $queryBuilder = $em
                ->createQueryBuilder()
                ->delete('ScheduleBundle:Patient', 'a');
            $queryBuilder->getQuery()->execute();
            foreach ($works as $id => $work) {
                $patient = new Patient($id, $work);
                $em->persist($patient);
                $em->flush();
                //$this->patients[] = $patient;
            }
            return new JsonResponse(array("process" => true));
        } else {
            return new JsonResponse("error",500);
        }
    }

    /**
     * Lists all Patient entities.
     *
     * @Route("/result", name="reception_schedule_result")
     * @Method({"GET", "POST"})
     */
    public function resultAction()
    {
        $population = $this->buildPopulation()
        return $this->render('patient/result.html.twig', array());
    }

    private function buildPopulation()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $individs = $em->getRepository('ScheduleBundle:Patient')->findAll();
    }
}
