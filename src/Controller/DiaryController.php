<?php

    namespace App\Controller;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    /**
     * Trening diary controller
     */
    class DairyController extends AbstractFOSRestController
    {
        /**
         * @Route("", name="_index")
         */
        public function index() {

        }
    }