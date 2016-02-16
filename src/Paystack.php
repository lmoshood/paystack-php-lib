<?php
/**
 * Created by Malik Abiola.
 * Date: 04/02/2016
 * Time: 23:21
 * IDE: PhpStorm
 */

namespace Paystack;

use Paystack\Factories\PaystackHttpClientFactory;
use Paystack\Models\Customer;
use Paystack\Models\OneTimeTransaction;
use Paystack\Models\Plan;
use Paystack\Models\ReturningTransaction;
use Paystack\Models\Transaction;
use Paystack\Repositories\CustomerResource;
use Paystack\Repositories\PlanResource;
use Paystack\Repositories\TransactionResource;
use Paystack\Helpers\Transaction as TransactionHelper;

class Paystack
{
    private $paystackHttpClient;
    private $customerModel;
    private $planModel;
    private $customerResource;
    private $transactionResource;
    private $planResource;
    private $transactionHelper;

    /**
     * Paystack constructor.
     */
    public function __construct()
    {
        $this->paystackHttpClient = PaystackHttpClientFactory::make();

        $this->customerResource = new CustomerResource($this->paystackHttpClient);
        $this->customerModel = new Customer($this->customerResource);

        $this->transactionResource = new TransactionResource($this->paystackHttpClient);

        $this->planResource = new PlanResource($this->paystackHttpClient);
        $this->planModel = new Plan($this->planResource);

        $this->transactionHelper = TransactionHelper::make();
    }

    /**
     * Get customer by ID
     * @param $customerId
     * @return mixed
     * @throws \Exception|mixed
     */
    public function getCustomer($customerId)
    {
        return $this->customerModel->getCustomer($customerId)->transform();
    }

    /**
     * Get all customers
     * @param string $page
     * @return \Exception|mixed
     * @throws \Exception|mixed
     */
    public function getCustomers($page = '')
    {
        $customers = $this->getCustomerResource()->getAll($page);

        if ($customers instanceof \Exception) {
            throw $customers;
        }

        return $customers;
    }
    /**
     * Create new customer
     * @param $firstName
     * @param $lastName
     * @param $email
     * @param $phone
     * @return mixed
     * @throws \Exception|mixed
     * @throws null
     */
    public function createCustomer($firstName, $lastName, $email, $phone)
    {
        return $this->customerModel->make($firstName, $lastName, $email, $phone)
            ->save()
            ->transform();
    }

    /**
     * Update customer by customer id/code
     * @param $customerId
     * @param $updateData
     * @return mixed
     * @throws \Exception|mixed
     * @throws null
     */
    public function updateCustomerData($customerId, $updateData)
    {
        return $this->customerModel->getCustomer($customerId)
            ->setUpdateData($updateData)
            ->save()
            ->transform();
    }

    /**
     * Delete customer by Id/Code
     * @param $customerId
     */
    public function deleteCustomer($customerId)
    {
//        return $this->customerModel->getCustomer($customerId)->delete();
    }

    /**
     * Get plan by plan id/code
     * @param $planCode
     * @return mixed
     * @throws \Exception|mixed
     */
    public function getPlan($planCode)
    {
        return $this->planModel->getPlan($planCode)->transform();
    }

    /**
     * Get all plans
     * @param string $page
     * @return \Exception|mixed
     * @throws \Exception|mixed
     */
    public function getPlans($page = '')
    {
        $plans = $this->getPlanResource()->getAll($page);

        if ($plans instanceof \Exception) {
            throw $plans;
        }

        return $plans;
    }

    /**
     * Create new plan
     * @param $name
     * @param $description
     * @param $amount
     * @param $currency
     * @return mixed
     * @throws \Exception|mixed
     * @throws null
     */
    public function createPlan($name, $description, $amount, $currency)
    {
        return $this->planModel->make($name, $description, $amount, $currency)
            ->save()
            ->transform();
    }

    /**
     * Update plan
     * @param $planCode
     * @param $updateData
     * @return mixed
     * @throws \Exception|mixed
     * @throws null
     */
    public function updatePlan($planCode, $updateData)
    {
        return $this->planModel->getPlan($planCode)
            ->setUpdateData($updateData)
            ->save()
            ->transform();
    }

    /**
     * delete plans
     * @param $planCode
     */
    public function deletePlan($planCode)
    {
//        return $this->planModel->getPlan($planCode)->delete();
    }

    /**
     * Init a one time transaction to get payment page url
     * @param $amount
     * @param $email
     * @param string $plan
     * @return \Exception|mixed|Exceptions\PaystackInvalidTransactionException
     */
    public function startOneTimeTransaction($amount, $email, $plan = '')
    {
        return OneTimeTransaction::make(
            $amount,
            $email,
            $plan instanceof Plan ? $plan->get('plan_code') : $plan
        )->initialize();
    }

    /**
     * Charge a returning customer
     * @param $authorization
     * @param $amount
     * @param $email
     * @param string $plan
     * @return \Exception|mixed|Exceptions\PaystackInvalidTransactionException
     */
    public function chargeReturningTransaction($authorization, $amount, $email, $plan = '')
    {
        return ReturningTransaction::make(
            $authorization,
            $amount,
            $email,
            $plan instanceof Plan ? $plan->get('plan_code') : $plan
        )->charge();
    }

    /**
     * Verify transaction
     * @param $transactionRef
     * @return array|bool
     */
    public function verifyTransaction($transactionRef)
    {
        return $this->transactionHelper->verify($transactionRef);
    }

    /**
     * Get transaction details
     * @param $transactionId
     * @return static
     * @throws \Exception|mixed
     */
    public function transactionDetails($transactionId)
    {
        return $this->transactionHelper->details($transactionId);
    }

    /**
     * Get all transactions. per page
     * @param $page
     * @return array
     * @throws \Exception|mixed
     */
    public function allTransactions($page)
    {
        return $this->transactionHelper->allTransactions($page);
    }

    public function transactionsTotals()
    {
        return $this->transactionHelper->transactionsTotals();
    }

    /**
     * @return TransactionResource
     */
    public function getTransactionResource()
    {
        return $this->transactionResource;
    }

    /**
     * @param TransactionResource $transactionResource
     */
    public function setTransactionResource($transactionResource)
    {
        $this->transactionResource = $transactionResource;
    }

    /**
     * @return CustomerResource
     */
    public function getCustomerResource()
    {
        return $this->customerResource;
    }

    /**
     * @param CustomerResource $customerResource
     */
    public function setCustomerResource($customerResource)
    {
        $this->customerResource = $customerResource;
    }

    /**
     * @return \GuzzleHttp\Client
     */
    public function getPaystackHttpClient()
    {
        return $this->paystackHttpClient;
    }

    /**
     * @param \GuzzleHttp\Client $paystackHttpClient
     */
    public function setPaystackHttpClient($paystackHttpClient)
    {
        $this->paystackHttpClient = $paystackHttpClient;
    }

    /**
     * @return PlanResource
     */
    public function getPlanResource()
    {
        return $this->planResource;
    }

    /**
     * @param PlanResource $planResource
     */
    public function setPlanResource($planResource)
    {
        $this->planResource = $planResource;
    }
}
