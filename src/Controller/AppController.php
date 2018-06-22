<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Yandex\OAuth\OAuthClient;

class AppController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        $clientId = '5f8e31bdd401465bb2c47cdf44097d41';
        $clientSecret = '317a90089bce40ea9bcef49f892f4797';
        $oauthClient = new OAuthClient($clientId, $clientSecret);
        $oauthClient->authRedirect();

        return $this->render('app/index.html.twig', [

        ]);
    }

}
