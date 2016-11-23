<?php
/**
 * Created by PhpStorm.
 * User: Elvis
 * Date: 17/11/2016
 * Time: 16:51
 */

namespace Reis\SteloSdk;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Reis\SteloSdk\Order\Card;
use Reis\SteloSdk\Order\CardData;
use Reis\SteloSdk\Order\Order;
use Reis\SteloSdk\Order\OrderDataResult;

class Stelo
{

    const SANDBOX = 'https://apic1.hml.stelo.com.br';
    const API = 'https://api.stelo.com.br';

    /**
     * @var string Client ID
     */
    private $clientId;
    /**
     * @var string Secret ID
     */
    private $secretId;
    /**
     * @var Client
     */
    private $http;


    /**
     * Factory constructor.
     */
    public function __construct($version = self::SANDBOX, $clientId = null, $secretId = null)
    {
        if ($version === 'SANDBOX') {
            $version = self::SANDBOX;
        }

        if ($version === 'API') {
            $version = self::API;
        }

        $this->clientId = $clientId;
        $this->secretId = $secretId;
        $this->http = new Client([
            'base_uri' => $version,
            'auth' => [$this->clientId, $this->secretId],
            'headers' => [
                'Accept' => 'application/json',
            ]
        ]);
    }


    /**
     * @param Card $card
     * @return CardData
     * @throws \Exception
     */
    public function getToken(Card $card)
    {
        try {

            $res = $this->http->request('POST', '/security/v1/cards/tokens', [
                'json' => $card->toArray(),
                'headers' => [
                    'clientID' => $this->clientId
                ]
            ]);

            if ($res->getStatusCode() === 200) {
                $json = $res->getBody()->getContents();
                $data = \GuzzleHttp\json_decode($json);
                return new CardData($data->token);
            }

        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $res = \GuzzleHttp\json_decode($e->getResponse()->getBody());
                throw new \Exception($res->errorDescription, $res->errorCode);
            } else {
                throw new \Exception($e->getMessage(), 400);
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), 400);
        }
    }


    /**
     * @param Order $order
     * @return OrderDataResult
     * @throws \Exception
     */
    public function sendTransaction(Order $order)
    {
        try {

            $res = $this->http->request('POST', '/ec/V1/subacquirer/transactions', [
                'json' => $order->toArray()
            ]);

            $json = $res->getBody()->getContents();
            $order = \GuzzleHttp\json_decode($json);
            $order = $order->orderData;
            return new OrderDataResult($order->orderId, $order->nsu, $order->tid, $order->cardNumber);

        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $res = \GuzzleHttp\json_decode($e->getResponse()->getBody());
                $msg = '';
                foreach ($res->detail->message as $detail){
                    $msg = $detail;
                }
                throw new \Exception($msg, $res->errorCode);
            } else {
                throw new \Exception($e->getMessage(), 400);
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), 400);
        }

    }


    /**
     * @param $steloID
     * @return mixed
     * @throws \Exception
     */
    public function findTransaction($steloID)
    {
        try {
            $res = $this->http->request("GET", "/ec/V1/orders/transactions/{$steloID}");
            $json = $res->getBody()->getContents();
            return \GuzzleHttp\json_decode($json);
        } catch (RequestException $e) {
            throw new \Exception($e->getMessage(), 400);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), 400);
        }
    }


    /**
     * @param $steloID
     * @return mixed
     * @throws \Exception
     */
    public function deleteTransaction($steloID)
    {
        try {
            $res = $this->http->request("DELETE", "/ec/V1/orders/transactions/{$steloID}");
            $json = $res->getBody()->getContents();
            return \GuzzleHttp\json_decode($json);
        } catch (RequestException $e) {
            throw new \Exception($e->getMessage(), 400);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), 400);
        }
    }

}