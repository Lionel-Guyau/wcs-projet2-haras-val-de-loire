<?php

/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

use App\Model\Connection;
use PDO;

use App\Model\ActivityManager;

class ActivityController extends AbstractController
{
    /**
     * Display activity page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */

    public function index()
    {
        return $this->twig->render('/Activity/activity.html.twig');
    }

    public function register()
    {
        $activity = new ActivityManager();
        $activityType = $activity->getAllActivities();

        return $this->twig->render('/Activity/register.html.twig', ['activityType' => $activityType]);
    }


    public function showActivity()
    {
        $activityManager = new ActivityManager();
        $lessons = $activityManager->selectLessons();
        $courses = $activityManager->selectCourses();

        return $this->twig->render('/Activity/activity.html.twig', [
            'lessons' => $lessons,
            'courses' => $courses,
        ]);
        return $this->twig->render('/Activity/register.html.twig');
    }
}
