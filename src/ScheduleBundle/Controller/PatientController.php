<?php

namespace ScheduleBundle\Controller;

use ScheduleBundle\Entity\Individ;
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

    private $workTime;

    private $iterationNumber;

    /**
     * PatientController constructor.
     * @param $iterationNumber
     */
    public function __construct()
    {
        $this->iterationNumber = 4;
    }

    /**
     * @return mixed
     */
    public function getIterationNumber()
    {
        return $this->iterationNumber;
    }

    /**
     * @param mixed $iterationNumber
     */
    public function setIterationNumber($iterationNumber)
    {
        $this->iterationNumber = $iterationNumber;
    }

    /**
     * @return mixed
     */
    public function getWorkTime()
    {
        return $this->workTime;
    }

    /**
     * @param mixed $workTime
     */
    public function setWorkTime($workTime)
    {
        $this->workTime = $workTime;
    }

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
            if ($number < 4 || $number > 18) {
                return new JsonResponse("error", 500);
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
                ->add('number', IntegerType::class, array('label' => 'Кількість пацієнтів', 'attr' => array('class' => 'validate[required,max[18], min[4]]')))
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
            return new JsonResponse("error", 500);
        }
    }

    private function reanimate($children, $selection)
    {

        $em = $this->getDoctrine()->getEntityManager();
        $childs = array();
        foreach ($children as $child) {
            if ($selection) {
                $pats = $child->getPatients()->toArray();
                $newPats = $this->changeGenes($pats);
                $times = $em->getRepository("ScheduleBundle:works")->findAll();
                $ch = $this->createIndivid($newPats, $times, true);
                $childs[] = $ch;
            } else {
                if (!$child->getSuitable()) {
                    $pats = $child->getPatients()->toArray();
                    $newPats = $this->changeGenes($pats);
                    $times = $em->getRepository("ScheduleBundle:works")->findAll();
                    $ch = $this->createIndivid($newPats, $times, true);
                    $childs[] = $ch;
                }
            }

        }
        return $childs;
    }

    private function getMutatedChildren($mutated, $children)
    {
        $childs = array();
        foreach ($children as $child) {
            var_dump($child);
            echo "<br>";
            echo "<br>";
            var_dump($mutated);
            echo "<br>";
            echo "<br>";
            foreach ($mutated as $mutate) {
                if ($child->isMutated()) {
                    $childs[] = $mutate;
                } else {
                    $childs[] = $child;
                }
            }
        }
        return $childs;
    }

    /**
     * Lists all Patient entities.
     *
     * @Route("/result", name="reception_schedule_result")
     * @Method({"GET", "POST"})
     */
    public function resultAction()
    {
        $iterations = array();
        $iterate = array();
        $population = $this->buildPopulation();
        for ($i = 0; $i < $this->getIterationNumber(); $i++) {
            $parents = $this->getNewParents($population);
            $children = $this->getNewChildren($parents);
            if (rand(1, 100) === 5) {
                $mutated = $this->reanimate($children, true);
                $childSelection = $this->reanimate($mutated, true);
                $childReanimate = $this->reanimate($childSelection, false);
            } else {
                $childSelection = $this->reanimate($children, true);
                $childReanimate = $this->reanimate($childSelection, false);
            }
            $iterations[$i][] = array("children" => $children);
            $iterations[$i][] = array(
                "parents" => $parents,
                "selection" => $childSelection,
                "reanimation" => $childReanimate,
                //"newPopulation" => $newPopulation,
                "mutated" => $mutated
            );
        }
        // $view = $this->renderView('patient/iterations.html.twig', $iterations);
        return $this->render('patient/result.html.twig', array(
            "population" => $population->getIndivids(),
            "maxMorLength" => $population->maxMorLength,
            "maxEvLength" => $population->maxEvLength,
            "maxLength" => $population->maxEvLength + $population->maxMorLength,
            "iterations" => $iterations,
            "iterate" => $iterate
        ));
    }

    private function isMutated($individs)
    {
        $mutation = false;
        foreach ($individs as $individ) {
            foreach ($individ->getPatients() as $pat) {
                if ($pat->getMutated()) {
                    $mutation = true;
                    break;
                }
            }
        }
        return $mutation;
    }

    private function getNewParents(Population $population)
    {
        $parents = array();
        $bestScore = 10000;
        foreach ($population->getIndivids() as $individ) {
            if ($individ->getAverQueueTime() < $bestScore) {
                $bestScore = $individ->getAverQueueTime();
                $parents[0] = $individ;
            }
        }
        $parentKey = array_rand($population->getIndivids(), 1);
        $parents[1] = $population->getIndivids()[$parentKey];
        while ($population->getIndivids()[$parentKey]->getPatients() === $parents[0]->getPatients()) {
            $parentKey = array_rand($population->getIndivids(), 1);
            $parents[1] = $population->getIndivids()[$parentKey];
        }
        //if ()$population->getIndivids()[$parentKey]
        return $parents;
    }

    private function getNewChildren($parents)
    {
        $children = array();
        $children[0] = $this->getChild($parents[0]->getPatients(), $parents[1]->getPatients());
        $children[1] = $this->getChild($parents[1]->getPatients(), $parents[0]->getPatients());
        return $children;
    }

    private function getChild($parentFirst, $parentSecond)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $child = new Individ();
        $childPat = array();
        $i = 0;
        $j = count($parentSecond) - 1;
        while ($i != count($parentFirst) && $j != -1) {
            if (!in_array($parentFirst[$i], $childPat)) {
                $childPat[] = $parentFirst[$i];
                $i++;
            } else {
                $i++;
            }
            if (!in_array($parentSecond[$j], $childPat)) {
                $childPat[] = $parentSecond[$j];
                $j--;
            } else {
                $j--;
            }
        }
        foreach ($childPat as $patient) {
            $child->add($patient);
        }
        $times = $em->getRepository("ScheduleBundle:works")->findAll();
        return $this->createIndivid($childPat, $times, true);
    }

    private function changeGenes($individ, $switch = 'selection')
    {
        $firstChange = array_rand($individ, 1);
        $secondChange = array_rand($individ, 1);
        while ($firstChange === $secondChange) {
            $firstChange = array_rand($individ, 1);
            $secondChange = array_rand($individ, 1);
        }
        $temp = $individ[$firstChange];
        $individ[$firstChange] = $individ[$secondChange];
        $individ[$secondChange] = $temp;
        /*
                switch ($switch) {
                    case 'selection' :
                        $individ[$firstChange]->setSelection(true);
                        $individ[$secondChange]->setSelection(true);
                        break;
                    case 'mutation' :
                        $individ[$firstChange]->setMutated(true);
                        $individ[$secondChange]->setMutated(true);
                        break;
                }*/
        return $individ;
    }

    private function getNewPopulation($population, $children)
    {

    }

    private function buildPopulation()
    {
        $continue = true;
        $this->workTime = 240;
        $em = $this->getDoctrine()->getEntityManager();
        $scheduleBase = $em->getRepository('ScheduleBundle:Patient')->findAll();
        $em = $this->getDoctrine()->getEntityManager();
        $times = $em->getRepository("ScheduleBundle:works")->findAll();
        $population = new Population();
        $i = 0;
        while ($continue) {
            shuffle($scheduleBase);
            $individ = $this->createIndivid($scheduleBase, $times);
            if (!in_array($individ, $population->getIndivids()) && $individ->getSuitable()) {
                $population->addIndivid($individ);
            }
            if (count($population->getIndivids()) === $population->getSize() || $i > 100) {
                $continue = false;
            }
            $i++;
        }
        $population->getMaxMorLength();
        $population->getMaxEvLength();
        /*echo "<pre>";
        var_dump($population);
        echo "</pre>";*/
        return $population;
    }

    private function isSuitable(Individ $individ)
    {
        if ($individ->getMorTime() > $this->workTime || $individ->getEvTime() > $this->workTime) {
            // var_dump($individ->getMorTime());
            return false;
        } else {
            return true;
        }
    }

    private function factorial($number)
    {
        if ($number === 1) {
            return 1;
        } else {
            return $number * $this->factorial($number - 1);
        }
    }

    private function createIndivid($schedule, $times, $child = false)
    {
        $individ = new Individ();
        foreach ($times as $time) {
            $durations[$time->getId()] = $time->getDuration();
        }
        foreach ($schedule as $sc) {
            $individ->add($sc);
            $pat[] = array(
                "number" => $sc->getNumber(),
                "duration" => $durations[$sc->getWork()]
            );
        }
        $morning = $this->getQueueTime($pat, $individ, 'morning');
        $individ->setMorTime($morning["time"]);
        $individ->setMorNumOfPat($morning["PatNumber"]);
        $evening = $this->getQueueTime($pat, $individ, 'evening');
        $individ->setEvTime($evening["time"]);
        $individ->setEvNumOfPat($evening["PatNumber"]);
        $individ->setNumOfPat($individ->getMorNumOfPat() + $individ->getEvNumOfPat());
        $individ->setAverQueueTime($this->getSumQueueTime($individ, $pat));
        $individ->setSuitable($this->isSuitable($individ));
        return $individ;
    }

    private function getSumQueueTime(Individ $individ, $patients)
    {

        $time = 0;
        for ($i = 1; $i < $individ->getNumOfPat() + 1; $i++) {
            // var_dump($time);
            //echo "duration for ".$i." is ".$patients[$i - 1]["duration"];
            $time += $patients[$i - 1]["duration"] * ($individ->getNumOfPat() - $i);

        }
        return $time / $individ->getNumOfPat();
    }

    private function getQueueTime($patients, Individ $individ, $time = 'morning')
    {
        $totalTime = 0;
        $numPat = 0;
        switch ($time) {
            case 'morning':
                for ($i = 0; $i < $individ->getLunchPos(); $i++) {
                    if ($patients[$i]) {
                        $numPat++;
                        $totalTime += $patients[$i]["duration"];
                    }
                }
                break;
            case 'evening':
                for ($i = $individ->getLunchPos(); $i < count($patients); $i++) {
                    if ($patients[$i]) {
                        $numPat++;
                        $totalTime += $patients[$i]["duration"];
                    }
                }
                break;
        }
        return array(
            "time" => $totalTime,
            "PatNumber" => $numPat
        );
    }
}
