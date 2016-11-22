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
use Reis\SteloSdk\Order\OrderData;
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
        if($version === 'SANDBOX'){
            $version = self::SANDBOX;
        }

        if($version === 'API'){
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


    /**
     * @param Card|null $card
     * @return CardData
     * @throws \Exception
     */
    public function sendToken(Card $card = null)
    {
        try {
            if (!is_null($card)) {
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
                return $this->cardData;
            }

        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                throw new \Exception($e->getResponse(), 400);
            }
            else {
                throw new \Exception($e->getMessage(), 400);
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), 400);
        }
    }

    /**
     * @param Order|null $order
     * @param Payment|null $payment
     * @param Customer|null $customer
     * @return OrderData
     * @throws \Exception
     */
    public function sendTransaction(Order $order = null, Payment $payment = null, Customer $customer = null)
    {
        try {
            if (!is_null($order)) {
                self::setOrder($order);
            }
            if (!is_null($payment)) {
                self::setPayment($payment);
            }
            if (!is_null($customer)) {
                self::setCustomer($customer);
            }

            if (is_null($this->cardData)) {
                self::sendToken();
            }

            $this->payment->setCardData($this->cardData);

            $data = [
                'orderData' => $this->order->toArray(),
                'paymentData' => $this->payment->toArray(),
                'customerData' => $this->customer->toArray()
            ];

            $res = $this->http->request('POST', '/ec/V1/subacquirer/transactions', [
                'json' => $data
            ]);

            $json = $res->getBody()->getContents();
            $order = \GuzzleHttp\json_decode($json);
            $order = $order->orderData;
            return new OrderData($order->orderId, $order->nsu, $order->tid, $order->cardNumber);

        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                throw new \Exception($e->getResponse(), 400);
            }
            else {
                throw new \Exception($e->getMessage(), 400);
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), 400);
        }

    }

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

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->cardData;
    }

}