<?php
/**
 * Created by PhpStorm.
 * User: Elvis
 * Date: 17/11/2016
 * Time: 21:56
 */
require __DIR__ . '/../vendor/autoload.php';

use Reis\SteloSdk\Customer\BillingAddress;
use Reis\SteloSdk\Customer\ShippingAddress;
use Reis\SteloSdk\Order\Card;
use Reis\SteloSdk\Order\Customer;
use Reis\SteloSdk\Order\Order;
use Reis\SteloSdk\Stelo;
use Reis\SteloSdk\Order\Payment;
use Reis\SteloSdk\Customer\Phone\Phone;
use Reis\SteloSdk\Customer\Phone\PhoneData;
use Reis\SteloSdk\Order\Cart\Product;
use Reis\SteloSdk\Order\Cart\CartData;

$card = new Card();
$card->setNumber('4066553613548107');
$card->setEmbossing('Fulano');
$card->setExpiryDate('10/17');
$card->setCvv('903');

$transaction = new Stelo(Stelo::SANDBOX, '1e03584872f45a6f2860b9778f56c4d3', 'd05426574d8789b2835cc8cda06b636c');
$transaction->setCard($card);


$order = new Order();
$order->setOrderId(111);

$billingAddress = new BillingAddress();
$billingAddress->setStreet('BILLING Rua')
    ->setNumber('999')
    ->setComplement('XXX')
    ->setNeighborhood('Centro')
    ->setZipCode('07115000')
    ->setCity('Guarulhos')
    ->setState('SP')
    ->setCountry('BR');

$shippingAddress = new ShippingAddress();
$shippingAddress->setStreet('SHIPPING Rua')
    ->setNumber('999')
    ->setComplement('XXX')
    ->setNeighborhood('Centro')
    ->setZipCode('07115000')
    ->setCity('Guarulhos')
    ->setState('SP')
    ->setCountry('BR')
    ->setReceiver('Teste Integração');

$cel1 = new Phone(Phone::TYPE_FIXO);
$cel2 = new Phone(Phone::TYPE_CELL);

$phoneData = new PhoneData();
$phoneData->setItem($cel1)->setItem($cel2);


$customer = new Customer();
$customer->setCustomerName('Teste Integração')
    ->setCustomerEmail('teste@teste.com.br')
    ->setBirthDate('1991-01-20')
    ->setBillingAddress($billingAddress)
    ->setShippingAddress($shippingAddress)
    ->setPhoneData($phoneData);

$product1 = new Product();
$product1->setProductSku(1)
    ->setProductName('Coalesce: Functioning On Impatience T-Shirt')
    ->setProductPrice(15.90)
    ->setProductQuantity(1);

$cartData = new CartData();
$cartData->setItem($product1);

$payment = new Payment();
$payment->setPaymentType(Payment::PAYMENT_METHOD_CARTAO)
    ->setCurrency(Payment::CURRENCY_BRL)
    ->setCardData($card)
    ->setAmount(180.00)
    ->setDiscountAmount(0)
    ->setFreight(45.00)
    ->setInstallment(3)
    ->setCartData($cartData);


$transaction->setOrder($order);
$transaction->setPayment($payment);
$transaction->setCustomer($customer);
$transaction->dispatchTransaction();
