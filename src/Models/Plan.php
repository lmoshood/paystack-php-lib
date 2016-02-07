<?php
/**
 * Created by Malik Abiola.
 * Date: 05/02/2016
 * Time: 22:55
 * IDE: PhpStorm
 */

namespace Paystack\Models;

use Paystack\Contracts\PlansInterface;
use Paystack\Resources\PlanResource;

class Plan extends Model implements PlansInterface
{
    private $planResource;

    protected $plan_code;

    protected $name;

    protected $description;

    protected $amount;

    protected $interval;

    protected $send_invoices = true;

    protected $send_sms = true;

    protected $hosted_page = false;

    protected $hosted_page_url;

    protected $hosted_page_summary;

    protected $currency;

    protected $subscriptions;

    public function __construct(PlanResource $planResource)
    {
        $this->planResource = $planResource;
    }

    public function getPlan($planCode)
    {
        $plan = $this->planResource->get($planCode);
        if($plan instanceof \Exception) {
            throw $plan;
        }

        $this->setDeleteable(true);

        return $this->__setAttributes($plan);
    }

    public function make($name, $description, $amount, $currency, array $otherAttributes = [])
    {
        $this->name = $name;
        $this->description = $description;
        $this->amount = $amount;
        $this->currency = $currency;

        $this->__setAttributes($otherAttributes);
        $this->setCreatable(true);

        return $this;
    }

    public function setUpdateData(array $updateData)
    {
        $this->__setAttributes($updateData);
        $this->setUpdateable(true);

        return $this;
    }

    /**
     * @return $this|Plan
     * @throws \Exception
     * @throws \Exception|mixed
     * @throws null
     */
    public function save()
    {
        $resourceResponse = null;

        if ($this->isCreatable() && !$this->isUpdateable()) { //available for creation
            $resourceResponse = $this->planResource->save($this->transform(PlansInterface::TRANSFORM_TO_JSON_ARRAY));
        } else if ($this->isUpdateable() && !$this->isCreatable()) { //available for update
            $resourceResponse = $this->planResource->update(
                $this->plan_code,
                $this->transform(PlansInterface::TRANSFORM_TO_JSON_ARRAY)
            );
        }

        if ($resourceResponse == null) {
            throw new \Exception("You Cant Perform This Operation on an empty plan");
        } else if ($resourceResponse instanceof \Exception) {
            throw $resourceResponse;
        }

        return $this->__setAttributes($resourceResponse);
    }

    public function delete()
    {
        if ($this->isDeleteable()) {
            $resourceResponse = $this->planResource->delete($this->plan_code);
            if ($resourceResponse instanceof \Exception) {
                throw $resourceResponse;
            }

            return !!$resourceResponse['status'];
        }

        throw new \Exception("Plan can't be deleted");
    }

    /**
     * Outward presentation of object
     * @param $transformMode
     * @return mixed
     */
    public function transform($transformMode = '')
    {
        // TODO: Implement transform() method.
    }

    public function __setAttributes($attributes)
    {
        if(is_array($attributes) && !empty($attributes)) {
            foreach($attributes as $attribute => $value) {
                $this->{$attribute} = $value;
            }

            return $this;
        }

        //@todo: put real exception here cos exception' gon be thrown either ways, so put one that makes sense
        //or something else that has more meaning
        throw new \Exception();
    }
}