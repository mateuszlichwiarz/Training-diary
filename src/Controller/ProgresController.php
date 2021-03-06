<?php

    namespace App\Controller;

    use App\Entity\Progres;
    use App\Entity\GeneralSettings;
    
    use App\Service\Time;
    use App\Service\ShowWorkouts;
    use App\Service\ConvertUnit;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    use FOS\RestBundle\Controller\FosRestController;
    use FOS\RestBundle\Controller\Annotations as Rest;

    use Symfony\Component\Routing\Annotation\Route;


     /**
     * Training progres controller
     * @Route("/progres", name="")
     */
    class ProgresController extends AbstractController
    {
        /**
         * @Route("/{id}", name="app_progres")
         */
        public function progres(ShowWorkouts $ShowWorkouts, $id)
        {   
            $user =$this->getUser();
            $userId = $user->getId();

            $time = new Time();
            $today = $time->getDay();
            $date = $time->getDate();
            $week = $time->getWeekArray();


            $generalSettings = $user->getGeneralSettings();
            $weightUnit = $generalSettings->getWeightUnit();

            $workouts = $ShowWorkouts->getProgres($user, $today, $date, $userId, $week, $id);

            $previousWeek = $id + 1;
            $forward = $id - 1;

            if($forward == -1)
            {
                $forward = 0;
            }
            
            return $this->render("progres/progres.html.twig", [
                'workouts' => $workouts,
                'previous' => $previousWeek,
                'forward'  => $forward,
                'weightUnit' => $weightUnit,
            ]);
        }
    }