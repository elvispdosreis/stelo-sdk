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
use Reis\SteloSdk\Order\Customer;
use Reis\SteloSdk\Order\Order;
use Reis\SteloSdk\Order\Payment;

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
     * @var CardData
     */
    private $cardData;
    /**
     * @var Card
     */
    private $card;
    /**
     * @var Order
     */
    private $order;
    /**
     * @var Payment
     */
    private $payment;
    /**
     * @var Customer
     */
    private $customer;


    /**
     * Factory constructor.
     */
    public function __construct($version = self::SANDBOX, $clientId = null, $secretId = null)
    {
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
     * @return Stelo
     */
    public function setCard(Card &$card)
    {
        $this->card = $card;
        return $this;
    }

    /**
     * @param Order $order
     * @return Stelo
     */
    public function setOrder(Order &$order)
    {
        $this->order = $order;
        return $this;
    }

    /**
     * @param Payment $payment
     * @return Stelo
     */
    public function setPayment(Payment &$payment)
    {
        $this->payment = $payment;
        return $this;
    }

    /**
     * @param Customer $customer
     * @return Stelo
     */
    public function setCustomer(Customer &$customer)
    {
        $this->customer = $customer;
        return $this;
    }

    public function dispatchToken(Card $card = null)
    {
        try {
            if(!is_null($card)){
                self::setCard($card);
            }

            $res = $this->http->request('POST', '/security/v1/cards/tokens', [
                'json' => $this->card->toArray(),
                'headers' => [
                    'clientID' => $this->clientId
                ]
            ]);

            if ($res->getStatusCode() === 200) {
                $json = $res->getBody()->getContents();
                $data = \GuzzleHttp\json_decode($json);
                $this->cardData = new CardData($data->token);
            }

        } catch (RequestException $e) {
            throw new \Exception($e->getMessage(), 400);
        }
    }

    public function dispatchTransaction(Order $order = null, Payment $payment = null, Customer $customer = null){
        try {
            if(!is_null($order)){
                self::setOrder($order);
            }
            if(!is_null($payment)){
                self::setPayment($payment);
            }
            if(!is_null($customer)){
                self::setCustomer($customer);
            }

            if(is_null($this->cardData)){
                self::dispatchToken();
            }

            $this->payment->setCardData($this->cardData);

            $data = [
                'orderData' => $this->order->toArray(),
                'paymentData' => $this->payment->toArray(),
                'customerData' => $this->customer->toArray()
            ];
            $res = $this->http->request('POST', '/ec/V1/subacquirer/transactions', [
                'json' => $data,
                'headers' => [
                    'clientID' => $this->clientId
                ]
            ]);

            $json = $res->getBody()->getContents();
            return  \GuzzleHttp\json_decode($json);

        } catch (RequestException $e) {
            throw new \Exception($e->getMessage(), 400);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), 400);
        }

    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->cardData;
    }


}