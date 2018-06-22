<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Yandex\Market\Partner\PartnerClient;
use Yandex\OAuth\OAuthClient;

class AnswersController extends Controller
{
    /**
     * @Route("/success", name="answer_success")
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Yandex\OAuth\Exception\AuthRequestException
     * @throws \Yandex\OAuth\Exception\AuthResponseException
     * @throws \Exception
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function success(Request $request)
    {
        $mytoken = 'AQAAAAAnpsGbAAUSGex6hiZKBEe2v9XFJmwWJF4';
        $clientId = '5f8e31bdd401465bb2c47cdf44097d41';
        $clientSecret = '317a90089bce40ea9bcef49f892f4797';
        $oauthClient = new OAuthClient($clientId, $clientSecret);

        if (!$request->query->has('code')) {
            throw new \Exception("Code isn't exist!");
        }

        $verifyToken = $request->get('code');
        $oauthClient->requestAccessToken($verifyToken);
        $partner = new PartnerClient($mytoken);
        $partner->setClientId($clientId);
        $magazini = $partner->getCampaigns();
        foreach ($magazini as $store) {
            dump($store);
        }
        dump($partner->getLogin());
        $userData = $oauthClient->getUserData($oauthClient->getAccessToken());
        dump($userData, $oauthClient);

        return $this->render('answers/index.html.twig', [
            'info' => 'Success'
        ]);
    }

    /**
     * @Route("/fail", name="answer_fail")
     */
    public function fail()
    {
        return $this->render('answers/index.html.twig', [
            'info' => 'Fail'
        ]);
    }
}
