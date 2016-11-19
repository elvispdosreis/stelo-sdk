<?php
/**
 * Created by PhpStorm.
 * User: Elvis
 * Date: 17/11/2016
 * Time: 14:45
 */

namespace Reis\SteloSdk\Order;


use Reis\SteloSdk\Order\Cart\CartData;
use Reis\SteloSdk\Contract\Arrayable;

class Payment implements Arrayable
{
    const PAYMENT_METHOD_CARTAO = 'credit';
    const PAYMENT_METHOD_BOLETO = 'bankSlip';

    const CURRENCY_BRL = 'BRL';

    /**
     * @var string Tipo de pagamento (credit / bankSlip)
     */
    private $paymentType;
    /**
     * @var string Moeda (BRL)
     */
    private $currency;
    /**
     * @var string Token
     */
    private $cardData;
    /**
     * @var double Valor total da compra incluindo frete
     */
    private $amount;
    /**
     * @var double Valor do desconto
     */
    private $discountAmount;
    /**
     * @var double Valor do frete
     */
    private $freight;
    /**
     * @var int Número de parcelas
     */
    private $installment;
    /**
     * @var CartData Dados do carrinho
     */
    private $cartData;

    /**
     * Payment constructor.
     * @param string $paymentType
     * @param string $currency
     * @param string $cardData
     * @param float $amount
     * @param float $discountAmount
     * @param float $freight
     * @param int $installment
     * @param CartData $cartData
     */
    public function __construct($paymentType = self::PAYMENT_METHOD_CARTAO, $currency = self::CURRENCY_BRL, Card $cardData = null, $amount = 0, $discountAmount = 0, $freight = 0, $installment = 1, CartData $cartData = null)
    {
        $this->paymentType = $paymentType;
        $this->currency = $currency;
        $this->cardData = $cardData;
        $this->amount = $amount;
        $this->discountAmount = $discountAmount;
        $this->freight = $freight;
        $this->installment = $installment;
        $this->cartData = $cartData;
    }

    /**
     * @param string $paymentType
     * @return Payment
     */
    public function setPaymentType($paymentType)
    {
        $this->paymentType = $paymentType;
        return $this;
    }

    /**
     * @param string $currency
     * @return Payment
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @param string $cardData
     * @return Payment
     */
    public function setCardData(Card &$cardData)
    {
        $this->cardData = $cardData;
        return $this;
    }

    /**
     * @param float $amount
     * @return Payment
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @param float $discountAmount
     * @return Payment
     */
    public function setDiscountAmount($discountAmount)
    {
        $this->discountAmount = $discountAmount;
        return $this;
    }

    /**
     * @param float $freight
     * @return Payment
     */
    public function setFreight($freight)
    {
        $this->freight = $freight;
        return $this;
    }

    /**
     * @param int $installment
     * @return Payment
     */
    public function setInstallment($installment)
    {
        $this->installment = $installment;
        return $this;
    }

    /**
     * @param CartData $cartData
     * @return Payment
     */
    public function setCartData(CartData &$cartData)
    {
        $this->cartData = $cartData;
        return $this;
    }

    /**
     * Returns a array representation of the object.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'paymentType' => $this->paymentType,
            'currency' => $this->currency,
            'cardData' => $this->cardData->toArray(),
            'amount' => $this->amount,
            'discountAmount' => $this->discountAmount,
            'freight' => $this->freight,
            'installment' => $this->installment,
            'cartData' => $this->cartData->toArray(),
        ];
    }


}