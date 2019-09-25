<?php

namespace App\Services\Customers;

use App\Exceptions\Users\EmailDoesNotExistException;
use App\Http\Resources\AuthCustomerResource;
use App\Repositories\Customers\CustomerInterface;
use App\Services\Errors\ErrorService;
use App\Services\Errors\ErrorServiceInterface;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;
use Illuminate\Support\Arr;

class  FacebookLoginService implements LoginInterface{

    protected $repository;
    protected $errorService;
    protected $facebookSdk;

    /**
     * FacebookLoginService constructor.
     * @param CustomerInterface $customerInterface
     * @param ErrorServiceInterface $errorService
     * @throws \Facebook\Exceptions\FacebookSDKException
     */
    public function __construct(CustomerInterface $customerInterface,ErrorServiceInterface $errorService)
    {
        $this->repository = $customerInterface;
        $this->errorService = $errorService;


        $this->facebookSdk = new Facebook([
            'app_id' => env('FACEBOOK_APP_ID'),
            'app_secret' => env("FACEBOOK_APP_SECRET"),
            'default_graph_version' => 'v2.10',

        ]);
    }

    protected function getUser(string $access_token){
        try {
            $response = $this->facebookSdk->get('/me?fields=email', $access_token);
            return [
                "status" => true,
                "user" => [
                    "email"=>$response->getGraphUser()->getEmail()
                ]
            ];
        } catch(FacebookResponseException $e) {
            return  [
                "status"=>false,
                "message" => $e->getMessage()
            ];
        } catch(FacebookSDKException $e) {
            return [
                "status" => false,
                "message" => $e->getMessage()
            ];
        }
    }

    public function handleLogin(array $attributes)
    {
        $data = $this->getUser(Arr::get($attributes,"access_token"));
        if(!$data["status"]) return (new ErrorService())->getErrorResource(["message"=>$data["message"],"field"=>"access_token"]);
        $email = $data['user']["email"];

        $customer = $this->repository->getSingleCustomerUsingEmail($email);
        if(!$customer) throw new EmailDoesNotExistException();
        return new AuthCustomerResource($customer);
    }

}
