<?php

namespace Qafeen\Flock;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Namshi\JOSE\JWS;

class Flock
{
    protected $client;

    protected $request;

    public function __construct(Client $client, Request $request)
    {
        $this->client = $client;

        $this->request = $request;
    }

    public function getPayload()
    {
        return (new JWS(['typ' => 'JWT', 'alg' => 'HS256']))
            ->load($this->request->get('flockEventToken'), false)
            ->getPayload();
    }

    public function logEvent()
    {
        $event = Event::firstOrNew([
            'user_id' => $this->request['userId']
        ]);

        $attributes = [
            'user_id' => $this->request['userId'],
            'user_token' => $this->request['userToken'],
            'token' => $this->request['token'],
            'name' => $this->request['name'],
        ];

        if ($event->id) {
            $event->update($attributes);
        } else {
            $event->create($attributes);
        }

        return $event;
    }
}
